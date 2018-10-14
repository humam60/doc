
<?php
include_once ('include/header.php');
include_once('include/c.php');
$output='';

?>


<html>




<!-- ينتهي هنا الخرط !-->




<div class="container-fluid">




    <?php
    $date=date('Y-M-d');

    if (isset($_GET['add'])){

        mysqli_query($conn,"UPDATE `patien` SET `date`='$date',
        `status`='published',`p_ill`='false' WHERE `id`='$_GET[add]'") or die(mysqli_error());
        header("Location:archive.php");
    }


    if(isset($_GET['q']) && $_GET['q'] !== ''){
  $searchq = $_GET['q'];

        $q = mysqli_query($conn, "SELECT * FROM patien WHERE p_name LIKE '%$searchq%' OR p_num LIKE '$searchq' ORDER BY date DESC") or die(mysqli_error());
        $c = mysqli_num_rows($q);
        if($c == 0){
            echo $output = 'No search results for <b>"' . $searchq . '"</b>';
        } else {

            echo ' 
 <div class="col-md-6">
   <div class="panel panel-info">
        <div class="panel-heading">نتيجه البحث  </div>
        <div class="panel-body">

            <table class="table table-hover">

                <thead>

                <tr>

                    <th>#</th>
                    <th>اسم المريض </th>
                    <th>جنس المريض  </th>
                    <th>تاريخ اخر مراجعه للمريض </th>
                    <th>اضافه الى قائمه الانتظار </th>
                  

                </tr>

                </thead>
                <tbody>'; ?>
                <?php
$num=1;
    while($row = mysqli_fetch_array($q)){
                    $id = $row['id'];
                    $title = $row['p_name'];
                    $date = $row['date'];

                        echo'
                        <tr>
                        <td>'.$num++.'</td>
                        <td><a href="patin.php?id='.$row['id'].'">'.$title.'</a></td>
                        <td>'.$row['p_address'].'</td>
                        <td>'.$date.'</td>
                        <td><a href="search.php?add='.$row['id'].'">  اضف  </a></td>
                        </tr>
';



            }





        }

    }


     ?>


</div>

</html>


<?php

include_once ('include/footer.php');

?>