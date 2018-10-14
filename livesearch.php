<?php

include_once ("include/c.php");
$username = $_GET['id'];


$username = trim(htmlspecialchars($username));


if(isset($_GET['id'])){
$searchq = $_GET['id'];

    $q = mysqli_query($conn, "SELECT * FROM medic WHERE med_name LIKE '%$searchq%' ORDER BY id DESC") or die(mysqli_error());
    $c = mysqli_num_rows($q);

    if($c == 0){
        echo $output = 'No search results for <b>"' . $searchq . '"</b>';
    }



    $show="";
    $i=0;
	while ($row=mysqli_fetch_array($q)) {

	$show =$show.'<div class="search-result"><a style="text-decoration:none;"
  href="">'.$row['med_name'].'</a> </div>';
  echo $show;
	}


}
