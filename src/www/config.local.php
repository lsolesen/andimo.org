<?php
$GLOBALS['site_id'] = 42;
$GLOBALS['private_key'] = 'JMskFBsyvYykDSjYFPXcTkQ3aZkipv75PCwsxKwpMLzH9qCstu';
$GLOBALS['template_path'] = realpath(dirname(__FILE__) . '/../Andimo/templates');
$GLOBALS["cache_dir"] = realpath(dirname(__FILE__));

$debug_log_path = false;
$debug_enabled = false;

set_include_path('/home/lsolesen/workspace/ilib/IntrafacePublic/IntrafacePublic_CMS/src/' . PATH_SEPARATOR . dirname(__FILE__) . '/../' . PATH_SEPARATOR . get_include_path());