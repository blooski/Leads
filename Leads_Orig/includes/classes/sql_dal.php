<?php
    require 'includes/classes/connection.php';
    
    class sql_dal {
        
        private $dbhost;
        private $dbuser;
        private $dbpass;
        private $dbname;
        
        //Get Connection info
        function __construct(){
            
            //class with server connection data
            $conn = new connection;
            
            $this->dbhost = $conn->get_dbhost();
            $this->dbuser = $conn->get_dbuser();
            $this->dbpass = $conn->get_dbpass();
            $this->dbname = $conn->get_dbname();
        }
        
        //Execute a Query to retrieve data
        function GetDataSet($SQLString) {
            
            $retconn=mysql_connect($this->dbhost, $this->dbuser, $this->dbpass) 
                or die ('Error connecting to mysql');
                
            mysql_select_db($this->dbname);
         
            return mysql_query($SQLString);
            
        }
        
        //Execute a Query to Retrieve One Row of Data
        function GetDataRow($SQLString) {
            
            $retconn=mysql_connect($this->dbhost, $this->dbuser, $this->dbpass) 
                or die ('Error connecting to mysql');
                
            mysql_select_db($this->dbname);
         
            //Do Basic Query
            $result = mysql_query($SQLString);
            if (!$result) {
                echo 'Could not run query: ' . mysql_error();
                exit;
            }

            //Return Row            
            return mysql_fetch_row($result);
            
        }
        
        //Execute a Query to Retrieve an Array of Data
        function GetDataArray($SQLString) {
            
            $retconn=mysql_connect($this->dbhost, $this->dbuser, $this->dbpass) 
                or die ('Error connecting to mysql');
                
            mysql_select_db($this->dbname);
         
            //Do Basic Query
            $result = mysql_query($SQLString);
            if (!$result) {
                echo 'Could not run query: ' . mysql_error();
                exit;
            }
            //Load Array
            while ($row = mysql_fetch_array($result,  MYSQL_ASSOC)) {
                $arr[] = $row;
            }
            
            //Return Array            
            return $arr;
            
        }
        
        //Execute a Query with no return data
        function ExecuteSQL($SQLString) {
            
            $retconn=mysql_connect($this->dbhost, $this->dbuser, $this->dbpass) 
                or die ('Error connecting to mysql');
                
            mysql_select_db($this->dbname);
         
            mysql_query($SQLString)
                or die(mysql_error());
            
        }
        
        //Close database
        function CloseDB() {
            
            mysql_close();
            
        }
           
    }
?>