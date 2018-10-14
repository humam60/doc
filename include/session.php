<?php
/**
 * Created by PhpStorm.
 * User: humam
 * Date: 04/01/2017
 * Time: 02:16 م
 */

session_start();
include_once("c.php");

if  (isset($_SESSION['user']) ){


    $sql=mysqli_query($conn,"SELECT * FROM `user` WHERE `username`='$_SESSION[user]'");
    if(mysqli_num_rows($sql)!=1){
        header("Location:l.php");

    }else{

    }
}else{


    header("Location:ind.php");

}




?>

