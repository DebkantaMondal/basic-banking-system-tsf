<?php
   
    function OpenCon(){
        $servername = 'localhost';
        $username = 'root';//'id18892872_testdeb123';
        $password =  '';//'G2r!2772jAy6KB0P';
        $dbname = 'tsf_bank_db';//'id18892872_tsf_bank_db';
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        return $conn;
    }

    function CloseCon($conn){
        $conn->close();
    }
 
?>