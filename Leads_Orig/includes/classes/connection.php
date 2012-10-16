<?php
    class connection {
        var $dbhost = 'localhost';
        var $dbuser = 'root';
        var $dbpass = '';
        var $dbname = 'leads';


        function get_dbhost() {
                return $this->dbhost;
        }               
        function get_dbuser() {
                return $this->dbuser;
        }               
        function get_dbpass() {
                return $this->dbpass;
        }               
        function get_dbname() {
                return $this->dbname;
        }               

    }
?>