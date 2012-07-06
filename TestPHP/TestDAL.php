<?php
class DAL
{
 var $server;	// Server Name
 var $usernm;	// Connection String
 var $passwd; 	// Password
 var $dbname;	// Database Name
 var $conn;		// Connection variable
 var $result;	// Query Result
  
 function __construct($server,$usernm,$passwd,$dbname)
 {
  $this->server = $server;
  $this->usernm = $usernm;
  $this->passwd = $passwd;
  $this->dbname = $dbname;
 }
 
 function conn_to_db()
 {
  $this->conn = mysql_connect($this->server, $this->usernm, $this->passwd)
		or die('Error connecting to mysql');
  mysql_select_db($this->dbname);
 }
 
 function get_single_row($sql)
 {
  if (!$this->conn) $this->conn_to_db();
  $result = mysql_query($sql);
  if ($result === false) {
   echo (mysql_error());
  }
  else {
   $row = mysql_fetch_row($result);
   return $row;
  }
 }
 
 function query($sql)
 {
  if (!$this->conn) $this->conn_to_db();
  $result = mysql_query($sql);
  if ($result === false) echo (mysql_error());
  $this->result = $result;
 }
 
 function get_next_row()
 {
  $row = mysql_fetch_array($this->result);
  return $row;
 }
 
 function close()
 {
 	mysql_close($this->conn);
 }
}
$Prospects_DAL = new DAL("localhost","root","","Leads");
$sql = "SELECT * FROM prospects WHERE Contact = 'Ashton Sanders'";
$row = $Prospects_DAL->get_single_row($sql);
echo $row[0];
$sql = "SELECT * FROM prospects";
$Prospects_DAL->query($sql);
while ($row = $Prospects_DAL->get_next_row() )
{
	echo $row['Contact'];
	$cnt += 1;
	if ($cnt>10) break;
}
//$sql = "INSERT INTO prospects (Contact) Values('Dummy')";
//$Prospects_DAL->query($sql);
$Prospects_DAL->close();
?>
 