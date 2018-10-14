<?php

include_once ("c.php");


if (isset($_POST['data']) && isset($_POST['date'])) {
    $data = $_POST['data'];
    $date = $_POST['date'];
    $id = $_POST['id'];
//$insert= mysqli_query($conn, "INSERT INTO `medic_patient` (`p_id`, `name`, `date`) VALUES ('1','2','d')")die(mysqli_error($conn));

    $insert = "INSERT INTO `medic_patient`(`p_id`, `name`,`date`) VALUES ('$id','$data','12')";
    mysqli_query($conn, $insert) or die(mysqli_error($conn));
}


if (isset($_GET['id']) && isset($_GET['pid'])){

    $id=$_GET['id'];
    echo "sss";
    $delete="DELETE FROM `medic_patient` WHERE `id`='$id' ";
    $dod=mysqli_query($conn, $delete) or die(mysqli_error($conn));



}

if (isset($_GET['id'])){
    $id=$_GET['id'];

    $select="SELECT * FROM `medic_patient` WHERE `p_id`='$id'";
  $result= mysqli_query($conn, $select) or die(mysqli_error($conn));


  //echo $post['name'];

    while ( $post=mysqli_fetch_assoc($result)){
        echo '<li id="'.$post['id'].'"><a  name="' . $post['id'] . '" style="text-decoration:none;" >' . $post['name'] . '</a> <a id="remove_a" <i class="glyphicon glyphicon-remove-circle" > </a></li>';
    }

}

?>
