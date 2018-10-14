<?php
$host='localhost';
$username='root';
$password='123';
$DB_name='doc';

  $conn=mysqli_connect($host,$username,$password,$DB_name);
  mysqli_set_charset($conn,"utf8");

  if (!$conn){

  echo mysqli_error("error").mysqli_errno();

  }


    function db_close(){
         global $conn;
    mysqli_close($conn);
    }

?>