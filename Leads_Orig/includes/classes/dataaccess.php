<?php
    require 'includes/classes/sql_dal.php';
    class dataaccess {
        
        private $result;

        function get_view($query) {
            //Create database object
            $dal = new sql_dal();
            
            //Execute Query
            $result = $dal->GetDataSet($query);

            //Close Database
            $dal->CloseDB();
            
            //Return Data to calling program
            return $result;
        }
        
        function get_prospect_data($query) {
            //Create database object
            $dal = new sql_dal();

            //Execute Query
            $result = $dal->GetDataRow($query);

            //Close Database
            $dal->CloseDB();
            
            //Return Data to calling program
            return $result;
        }
        
        function get_notes($query) {
            //Create database object
            $dal = new sql_dal();
            
            //Execute Query
            $result = $dal->GetDataArray($query);

            //Close Database
            $dal->CloseDB();
            
            //Return Data to calling program
            return $result;
        }
        
        function add_note($query){
            $dal = new sql_dal();
            
            //Execute Query
            $result = $dal->ExecuteSQL($query);

            //Close Database
            $dal->CloseDB();
        }
        
        function insert_prospect($query){
            $dal = new sql_dal();
            
            //Execute Query
            $result = $dal->ExecuteSQL($query);

            //Close Database
            $dal->CloseDB();
        }
        
        function update_prospect($query){
            $dal = new sql_dal();
            
            //Execute Query
            $result = $dal->ExecuteSQL($query);

            //Close Database
            $dal->CloseDB();
        }
        
    }
?>