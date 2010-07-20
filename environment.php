<?php
$db_url = 'mysql://root:savage23@localhost/azog_dev_1';
$db_prefix = '';

/**
 * Initialize a database connection.
 */
function db_connect($url) {
  $url = parse_url($url);

  // Check if MySQL support is present in PHP
  if (!function_exists('mysql_connect')) {
	echo 'Unable to use the MySQL database because the MySQL extension for PHP is not installed. Check your <code>php.ini</code> to see how you can enable it.';
  }
  // Decode url-encoded information in the db connection string
  $url['user'] = urldecode($url['user']);
  // Test if database url has a password.
  $url['pass'] = isset($url['pass']) ? urldecode($url['pass']) : '';
  $url['host'] = urldecode($url['host']);
  $url['path'] = urldecode($url['path']);
  $connection = mysql_pconnect($url['host'], $url['user'], $url['pass']);

  // Force UTF-8.
  mysql_query('SET NAMES "utf8"', $connection);
  return $connection;
}
?>