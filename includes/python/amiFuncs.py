#!/usr/bin/python

import telnetlib
import re
import random
import datetime
from mysqlfetch import MysqlFetch
import logging

class amiFuncs:
		
	def __init__(self,username,secret):
		self.manager_param={
			"username":username,
			"secret":secret
		}
		self.buffer = None

	def login(self,host,port):
		self.connect_param={
			"host":host,
			"port":port
		}
		self.socket = telnetlib.Telnet(self.connect_param["host"],self.connect_param["port"])
		self.socket.write("Action: Login\nUsername: %s\nSecret: %s\n\n" % (self.manager_param["username"], self.manager_param["secret"]))
		

	def queueShow(self,queue):
		self.socket.write("Action: Queues\n\n")
		self.queue=queue
		self.to_read=self.socket.read_until("\r\n\r\n")
		while True:
			self.result = re.findall(str(self.queue)+"\ \has.+\s*\r\n\r\n",self.to_read, re.S | re.I)
			if len(self.result) > 0:
				return self.result[0]
			self.to_read=self.socket.read_until("\r\n\r\n")

	def prepareNum(self,num):
		self.num=num
		if (self.num[0] == '+' and len(self.num) == 13):
			self.num.replace('+','00',1)
		if (len(self.num) == 9):
			self.num = '0' + self.num
		if (self.num[0:4] == '0038' and len(self.num) == 14):
			self.num = self.num.replace('0038','',1)
		if (self.num[0:3] == '380' and len(self.num) == 12):
			self.num = self.num.replace('38','',1)
		if (self.num[0:3] == '044' and len(self.num) == 10):
			self.num = self.num.replace('044','',1)
		return self.num

	def prepareChanExtern(self,numbExtern):
		self.numbExtern=numbExtern
		self.currMonth=datetime.date.today()
		self.externChan=[]
		if len(self.numbExtern)==10:
			if len(re.findall("^0[69]3",self.call_param['numbOut']))==1:
				self.externChan.append("SIP/life-pri/")
			if self.call_param['numbOut'][:4]=="0342":
				self.externChan.append("SIP/vegatele/")
			if len(re.findall("^09[95]",self.call_param['numbOut']))==1 or self.call_param['numbOut'][:3]=="066" or self.call_param['numbOut'][:3]=="050":
				selectQuery="select outtrunk as id, sum(duration) as sum from cdr where start >= '"+str(self.currMonth)+"' and outtrunk IN ("+str(self.mtcID)+") group by outtrunk order by sum"
				for self.trunk in MysqlFetch(host="194.50.85.3",user="asterisk",passwd="7ANLPkWssNu2h4",db="billing").query(selectQuery):
					try:
						self.externChan.append(self.mtcChan[str(self.trunk['id'])])
					except KeyError:
						unuse=0
			elif len(re.findall("^09[6-8]",self.numbExtern))==1 or self.numbExtern[:3]=="067" or self.numbExtern[:3]=="068":
				selectQuery="select outtrunk as id, sum(duration) as sum from cdr where	start >= '"+str(self.currMonth)+"' and outtrunk IN ("+str(self.kyivID)+") group by outtrunk order by sum"
				for self.trunk in MysqlFetch(host="194.50.85.3",user="asterisk",passwd="7ANLPkWssNu2h4",db="billing").query(selectQuery):
					try:
						self.externChan.append(self.kyivChan[str(self.trunk['id'])])
					except KeyError:
						unuse=0

		if len(self.numbExtern)==7:
			self.externChan.append("SIP/vegatele/")
		if len(self.numbExtern)==5 or len(self.numbExtern)==6:
			self.externChan.append("SIP/sdonetsk/")
		if len(self.numbExtern)==4:
			if self.numbExtern[0]=="2":
				self.externChan.append("SIP/")
			else:
				self.externChan.append("SIP/lanet-cc/")
		return self.externChan

	def makeCall(self,numbIn,numbOut,setVar=""):
		self.to_read=""
		self.callSuccess=0
		self.call_param={
			"numbIn":numbIn,
			"numbOut":self.prepareNum(numbOut)
		}
		self.setVar=setVar
		if (self.call_param["numbOut"][:4]=="0342"):
			self.callerID="+380342506500"
		else:
			self.callerID="+380445000303"
		self.actionID=random.getrandbits(30)
		self.preparedChans=self.prepareChanExtern(self.call_param["numbOut"])
		for self.chanGo in self.preparedChans:
			self.chanGo=self.chanGo+self.call_param['numbOut']
			print self.chanGo
			if (self.setVar==""):
				self.socket.write("Action: Originate\r\nChannel: "+str(self.chanGo)+"\r\nContext: preprocessing\r\nExten: %s\r\nPriority: 1\r\nCallerid: %s\r\nActionID: %s\r\nAsync: true\r\n\r\n" % (self.call_param['numbIn'],self.callerID,str(self.actionID)))
			else:
				self.socket.write("Action: Originate\r\nChannel: "+str(self.chanGo)+"\r\nContext: preprocessing\r\nExten: %s\r\nPriority: 1\r\nCallerid: %s\r\nVariable: %s\r\nActionID: %s\r\nAsync: true\r\n\r\n" % (self.call_param['numbIn'],self.callerID,str(self.setVar),str(self.actionID)))
			while True:
				if self.buffer == None:
					self.buffer=self.to_read
				else:
					self.buffer=self.buffer+self.to_read
				self.to_read=self.socket.read_until("\r\n\r\n")
				if self.callSuccess == 0:
					self.result = re.findall("Response: .+\s*\r\n\r\n",self.to_read, re.S | re.I)
					if len(self.result) > 0:
						self.resultString=self.result[0].split("\r\n")
						if (self.resultString[0].split(" ")[1] == "Error" and str(self.resultString[1]) == "ActionID: "+str(self.actionID)):
							return 0
						elif (self.resultString[0].split(" ")[1] == "Success" and str(self.resultString[1]) == "ActionID: "+str(self.actionID)):
							self.callSuccess=1
				elif self.callSuccess == 1:
					self.result = re.findall("Event: OriginateResponse.+\s*\r\n\r\n",self.to_read, re.S | re.I)
					if len(self.result) > 0:
						self.resultString=self.result[0].split("\r\n")
						if (self.resultString[2] == "ActionID: "+str(self.actionID)):
							if int(self.resultString[7].split(" ")[1]) == 0:
								return 0
							if int(self.resultString[7].split(" ")[1]) == 1:
								return 1
							# SUCCESS CALL
							if int(self.resultString[7].split(" ")[1]) == 4:
								return 4
							# WE HAVE NO ANSWER
							if int(self.resultString[7].split(" ")[1]) == 3:
								return 3
							# USER IS BUSY OR HAS HANGED UP THE CALL
							if int(self.resultString[7].split(" ")[1]) == 5:
								return 5
							# IF BUSY(CONGESTION) CALLING THROUGH THE NEXT CHANNEL
							if int(self.resultString[7].split(" ")[1]) == 8:
								break
		# ALL CHANNELS ARE BUSY
		return 8
	
	def makeCallChannel(self,numbIn,numbOut,channel,setVar=""):
		self.to_read=""
		self.callSuccess=0
		self.call_param={
			"numbIn":numbIn,
			"numbOut":numbOut
		}
		self.channel=channel
		self.setVar=setVar
		if (self.call_param["numbOut"][:4]=="0342"):
			self.callerID="+380342506500"
		else:
			self.callerID="+380445000303"
		self.actionID=random.getrandbits(30)
		print self.channel
		if (self.setVar==""):
			self.socket.write("Action: Originate\r\nChannel: "+str(self.channel)+"/"+str(self.call_param["numbOut"])+"\r\nContext: preprocessing\r\nExten: %s\r\nPriority: 1\r\nCallerid: %s\r\nActionID: %s\r\nAsync: true\r\n\r\n" % (self.call_param['numbIn'],self.callerID,str(self.actionID)))
		else:
			self.socket.write("Action: Originate\r\nChannel: "+str(self.channel)+"/"+str(self.call_param["numbOut"])+"\r\nContext: preprocessing\r\nExten: %s\r\nPriority: 1\r\nCallerid: %s\r\nVariable: %s\r\nActionID: %s\r\nAsync: true\r\n\r\n" % (self.call_param['numbIn'],self.callerID,str(self.setVar),str(self.actionID)))
		while True:
			if self.buffer == None:
				self.buffer=self.to_read
			else:
				self.buffer=self.buffer+self.to_read
			self.to_read=self.socket.read_until("\r\n\r\n")
			if self.callSuccess == 0:
				self.result = re.findall("Response: .+\s*\r\n\r\n",self.to_read, re.S | re.I)
				if len(self.result) > 0:
					self.resultString=self.result[0].split("\r\n")
					if (self.resultString[0].split(" ")[1] == "Error" and str(self.resultString[1]) == "ActionID: "+str(self.actionID)):
						return 0
					elif (self.resultString[0].split(" ")[1] == "Success" and str(self.resultString[1]) == "ActionID: "+str(self.actionID)):
						self.callSuccess=1
			elif self.callSuccess == 1:
				self.result = re.findall("Event: OriginateResponse.+\s*\r\n\r\n",self.to_read, re.S | re.I)
				if len(self.result) > 0:
					self.resultString=self.result[0].split("\r\n")
					if (self.resultString[2] == "ActionID: "+str(self.actionID)):
						if int(self.resultString[7].split(" ")[1]) == 0:
							return 0
						if int(self.resultString[7].split(" ")[1]) == 1:
							return 1
						# SUCCESS CALL
						if int(self.resultString[7].split(" ")[1]) == 4:
							return 4
						# WE HAVE NO ANSWER
						if int(self.resultString[7].split(" ")[1]) == 3:
							return 3
						# USER IS BUSY OR HAS HANGED UP THE CALL
						if int(self.resultString[7].split(" ")[1]) == 5:
							return 5
						# IF BUSY(CONGESTION) CALLING THROUGH THE NEXT CHANNEL
						if int(self.resultString[7].split(" ")[1]) == 8:
							break
				
				
	def logout(self):
		self.socket.close()

	def eventSearch(self,event):
		self.events=event.split("|")
		self.events_num=len(self.events)
		while True:
			if self.buffer == None:
				self.to_read=self.socket.read_until("\r\n\r\n")
				for self.event in self.events:
					self.result = re.findall("Event: "+str(self.event)+".+",self.to_read, re.S | re.I)
					if len(self.result) > 0:
						return self.result[0],self.event
			else:
				# Looking for a BUFFER
				for self.event in self.events:
					for self.buffer_message in self.buffer.split("\r\n\r\n"):
						try:
							# FIND SMTHN IN BUFFER
							self.result=re.findall("Event:\s"+str(self.event)+".+",self.buffer_message, re.S | re.I)[0]
							self.buffer=self.buffer.replace(self.result,"")
							return self.result,self.event
						except IndexError:
							self.result = None
				self.buffer = None
				
	def prepareChannel(self,outChan,prefixes,chanID):
		self.chanID=chanID.split("-")
		self.outChan=outChan
		self.prefixes=prefixes
		if self.outChan == "mtc":
			self.mtcID=chanID.replace("-",",")
			self.mtcChan={}
			self.counter=1
			self.i=0
			for self.prefix in self.prefixes.split("-"):
				if (int(self.chanID[self.i]) != 0):
					if self.prefix=="":
						self.mtcChan[self.chanID[self.i]] = "SIP/mtc"+str(self.counter)+"/"
					else:
						self.mtcChan[self.chanID[self.i]] = "SIP/mtc"+str(self.counter)+"/*"+str(self.prefix)
				self.counter+=1
				self.i+=1
			return 1
		elif self.outChan == "kyivstar":
			self.kyivID=chanID.replace("-",",")
			self.kyivChan={}
			self.counter=1
			self.i=0
			for self.prefix in self.prefixes.split("-"):
				if (int(self.chanID[self.i]) != 0):
					if self.prefix=="":
						self.kyivChan[self.chanID[self.i]] = "SIP/kyivstar"+str(self.counter)+"/"
					else:
						self.kyivChan[self.chanID[self.i]] = "SIP/kyivstar"+str(self.counter)+"/*"+str(self.prefix)
				self.counter+=1
				self.i+=1
			return 1
		else:
			return 0


	def getVar(self,variable,channel):
		self.variable=variable
		self.channel=channel
		self.to_read=""
		self.socket.write("Action: GetVar\nChannel: %s\nVariable: %s\n\n" % (self.channel, self.variable))
		while True:
			if self.buffer == None:
				self.buffer=self.to_read
			else:
				self.buffer=self.buffer+self.to_read
			self.to_read=self.socket.read_until("\r\n\r\n")
			self.result = re.findall("Response: .+\s*\r\n\r\n",self.to_read, re.S | re.I)
			if len(self.result) > 0:
				self.resultString=self.result[0].split("\r\n")
				if (self.resultString[0].split(" ")[1] == "Success" and self.resultString[1].split(" ")[1] == self.variable):
					return self.resultString[2].split(" ")[1]	
				elif (self.resultString[0].split(" ")[1] == "Error"):
					return 0

	def chanHangup(self,channel):
		self.channel=channel
		self.to_read=""
		self.actionID=random.getrandbits(30)
		self.socket.write("Action: Hangup\r\nActionID: %s\r\nChannel: %s\r\n\r\n" % (self.actionID,self.channel))
		while True:
			if self.buffer == None:
				self.buffer=self.to_read
			else:
				self.buffer=self.buffer+self.to_read
			self.to_read=self.socket.read_until("\r\n\r\n")
			self.result = re.findall("Response: .+\s*\r\n\r\n",self.to_read, re.S | re.I)
			if len(self.result) > 0:
				self.resultString=self.result[0].split("\r\n")
				if (self.resultString[0].split(" ")[1] == "Error" and str(self.resultString[1]) == "ActionID: "+str(self.actionID)):
					return 0
				elif (self.resultString[0].split(" ")[1] == "Success" and str(self.resultString[1]) == "ActionID: "+str(self.actionID)):
					return 1
	
	def chanSpy(self,chanVictim,chanSpy):
		self.chanVictim=chanVictim
		self.chanSpy=chanSpy
		self.to_read=""
		self.actionID=random.getrandbits(30)
		self.socket.write("Action: Originate\r\nChannel: %s\r\nApplication: ChanSpy\r\nData: %s\r\nActionID: %s\r\n\r\n" % (self.chanSpy , self.chanVictim , self.actionID))
		while True:
			if self.buffer == None:
				self.buffer=self.to_read
			else:
				self.buffer=self.buffer+self.to_read
			self.to_read=self.socket.read_until("\r\n\r\n")
			self.result = re.findall("Response: .+\s*\r\n\r\n",self.to_read, re.S | re.I)
			if len(self.result) > 0:
				self.resultString=self.result[0].split("\r\n")
				if (self.resultString[0].split(" ")[1] == "Error" and str(self.resultString[1]) == "ActionID: "+str(self.actionID)):
					return 0
				elif (self.resultString[0].split(" ")[1] == "Success" and str(self.resultString[1]) == "ActionID: "+str(self.actionID)):
					return 1
	
	def agentPause(self,agent,queue,status):
		self.agent=agent
		self.queue=queue
		self.status=status
		self.to_read=""
		self.actionID=random.getrandbits(30)
		self.socket.write("Action: QueuePause\r\nInterface: %s\r\nPaused: %s\r\nQueue: %s\r\nActionID: %s\r\n\r\n" % (self.agent,self.status,self.queue,self.actionID))
		while True:
			if self.buffer == None:
				self.buffer=self.to_read
			else:
				self.buffer=self.buffer+self.to_read
			self.to_read=self.socket.read_until("\r\n\r\n")
			self.result = re.findall("Response: .+\s*\r\n\r\n",self.to_read, re.S | re.I)
			if len(self.result) > 0:
				print self.result
				self.resultString=self.result[0].split("\r\n")
				if (self.resultString[0].split(" ")[1] == "Error" and str(self.resultString[1]) == "ActionID: "+str(self.actionID)):
					return 0
				elif (self.resultString[0].split(" ")[1] == "Success" and str(self.resultString[1]) == "ActionID: "+str(self.actionID)):
					return 1
