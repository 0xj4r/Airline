<?php
$db_host = getenv('OPENSHIFT_MYSQL_DB_HOST');
$db_user = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$db_pass = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$db_name = getenv('OPENSHIFT_APP_NAME');
$db_port = getenv('OPENSHIFT_MYSQL_DB_PORT');
 
$dbCon = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($dbCon->connect_errno) {
    die('Connect Error (' . $dbCon->connect_errno . ') '
            . $dbCon->connect_error);
}
 
$dbCon->set_charset("utf8");

?>

<!--?php
$db_host = $_ENV['OPENSHIFT_MYSQL_DB_HOST'];
$db_user = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
$db_pass = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
$db_name = $_ENV['OPENSHIFT_APP_NAME'];
$db_port = $_ENV['OPENSHIFT_MYSQL_DB_PORT'];
 
$dbCon = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
 
if ($dbCon->connect_errno) {
    die('Connect Error (' . $dbCon->connect_errno . ') '
            . $dbCon->connect_error);
}
 
$dbCon->set_charset("utf8");
 
?-->



<!-- // $dbCon = mysqli_connect("127.5.37.130", "adminvfZQxgm", "c2pTmjJdgXzt", "snagaflight", "3306") or die("cannot connect");
// //Parameters: server, username (default is root in XAMPP), password (XAMPP doesn't set), database name
// // Database credentials in ../MySQLcredentials.txt 
//  -->
