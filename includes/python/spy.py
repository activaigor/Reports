#!/usr/bin/python

import xmlrpclib
import sys

if len(sys.argv) == 3:
	ami = xmlrpclib.ServerProxy('http://localhost:8123')
	ami.chanSpy("Agent/" + sys.argv[1] , "SIP/" + sys.argv[2])
else:
	sys.exit()
