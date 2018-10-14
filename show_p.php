<?php
session_start();
include_once('include/header.php'); 
include_once('include/c.php');


if (isset($_SESSION['user'])!=true)
{
    header("Location:ind.php");
}

?>

<meta http-equiv="Refresh" content="2">
<div class="container">
 <div class="panel panel-info">
        <div class="panel-heading"><b>المقالات </b></div>
        <div class="panel-body">

            <table class="table table-hover">

                <thead>

                <tr>

                    <th>#</th>
                    <th>اسم المريض </th>
                    <th>عمر المريض </th>
                    <th>جنس المريض</th>
                   

                </tr>

                </thead>
                <tbody>



<?php

$num=1;
$posts=mysqli_query($conn,"SELECT * FROM `patien`  WHERE `status`='published' AND DATE(x) = CURDATE()");

 while ($post=mysqli_fetch_assoc($posts)){
	 
	     echo '<tr>
                    <td>'.$num.'</td>
                    <td>'.$post['p_name'].'</td>
                    <td>'.$post['p_age'].'</td> 
                    <td>'.$post['p_address'].'</td> 
                    
                </tr>';
				$num++;
	 
 } ?>
 
 <?php 
 include_once('include/footer.php');
 
 ?>
 
 
 
 
 
 

            
			
              
                 


                </tbody>
                </table>


           


        </div>
        </div>
    </div>
