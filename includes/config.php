<?php

define('SMARTY_DIR', $_SERVER['DOCUMENT_ROOT'] . '/includes/Smarty-3.1.12/libs/');
define('TEMPLATES_DIR', $_SERVER['DOCUMENT_ROOT'] . '/templates/');
define('COMPILE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/templates_c/');
define('CACHE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/cache/');
define('CONFIG_DIR', $_SERVER['DOCUMENT_ROOT'] . '/templates/');
define('ICONS_DIR', '/includes/icons/WindowsIcons-master/WindowsPhone');

	
$MYSQL = array (
	"host"=>"194.50.85.100",
	"user"=>"reports",
	"password"=>"aosdk9i108z",
	"db"=>"reports"
);

$MYSQL_AST = array (
	"host"=>"194.50.85.100",
	"user"=>"asterisk",
	"password"=>"kld89Zlxk",
	"db"=>"asterisk"
);

$MYSQL_BILL = array (
	"host"=>"194.50.85.3",
	"user"=>"asterisk",
	"password"=>"7ANLPkWssNu2h4",
	"db"=>"billing"
);

$ICONS = array(
	"queue" => ICONS_DIR . "/[icon_type]/appbar.group.png",
	"history" => ICONS_DIR . "/[icon_type]/appbar.people.profile.png",
	#"shifts" => ICONS_DIR . "/[icon_type]/appbar.page.text.png",
	"shifts" => ICONS_DIR . "/[icon_type]/appbar.office.excel.png",
	"calendar" => ICONS_DIR . "/[icon_type]/appbar.calendar.png",
	"excel" => ICONS_DIR . "/[icon_type]/appbar.office.excel.png",
	"lateness" => ICONS_DIR . "/[icon_type]/appbar.timer.alert.png",
	"logging" => ICONS_DIR . "/[icon_type]/appbar.newspaper.png",
	"account" => ICONS_DIR . "/[icon_type]/appbar.clipboard.variant.text.png",
	"cdr" => ICONS_DIR . "/[icon_type]/appbar.book.hardcover.open.png"
);
	
$CITIES = array(
	"kiev" => "киев",
	"ifrankovsk" => "ивано-франковск",
	"ternopol" => "тернополь",
	"kamenec" => "каменец-подольский",
	"qtnet" => "QTnet",
	"sdonetsk" => "северо-донецк",
	"bc" => "белая церковь"
);
	
$FEATURES = array(
	"cdr" => "журнал звонков",
	"shifts" => "графики смен"
);
	
$QUEUES = array(
	"tech" => "тех-поддержка",
	"experts" => "специалисты",
	"proposals" => "подключения",
	"test" => "тестовая очередь",
	"tvtech" => "тв-поддержка",
	"tvexpert" => "тв-специалисты"
);

?>
