<?php
// NO TRAILING SLASHES
define('SITENAME', 'azog_dev/azog');
define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);
define('SITEROOT', DOCROOT . '/' . SITENAME);

define('CORE_DIR', SITEROOT . '/core' );
define('CORE', CORE_DIR . '/core.php' );
define('RECOGNIZERS_DIR', SITEROOT . '/recognizers' );
define('DELIVERERS_DIR', SITEROOT . '/deliverers' );
define('MOBILIZERS_DIR', SITEROOT . '/mobilizers' );
define('LENSES_DIR', SITEROOT . '/lenses' );

// these need to not be here
// dynamically load
$GLOBALS['Request_Types'] = array();
$GLOBALS['Request_Types']['GET'] = 'retrieve';

// these need to not be here
// dynamically load
$GLOBALS['Response_Types'] = array();
$GLOBALS['Response_Types']['HTML'] = 'html';
$GLOBALS['Response_Types']['TEXT'] = 'text';
$GLOBALS['Response_Types']['JSON'] = 'json';
$GLOBALS['Response_Types']['XML'] = 'xml';

?>