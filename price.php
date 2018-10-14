<?php
session_start();
include_once('include/header.php');
if (isset($_SESSION['user'])!=true)
{
    header("Location:ind.php");

}
$x="";
$edit_id=0;
$re="";
$re1="";
$re2="";
$edit_value=0;
$num=0;

?>


<?php
if (isset($_POST['submit'])) {

    $name = strip_tags($_POST['name']);
    $price=strip_tags($_POST['price']);
    $insert = "INSERT INTO `price`(`name` , `price`) VALUES ('$name','$price')";
    mysqli_query($conn, $insert);

}


if (isset($_POST['update'])){


    $med = strip_tags($_POST['med']);
    $update = "UPDATE `price` SET `name`='$_POST[name]',`price`='$_POST[price]' WHERE `id`='$_POST[ed]'";
    mysqli_query($conn, $update)or die(mysqli_error());
    header("Location: price.php");


}





if (isset($_GET['del'])){

    $dele=mysqli_query($conn,"DELETE FROM `price` WHERE `id`= '$_GET[del]'");
    $x='<div class="alert alert-success" role="alert" >   تم حذف العلاج   </div>';
}


if (isset($_GET['edit'])){
    $edit =mysqli_query($conn,"SELECT * FROM `price` WHERE id='$_GET[edit]'");
    $re=mysqli_fetch_assoc($edit);
    $edit_id=$_GET['edit'];
    $re1=$re['name'];
    $re2=$re['price'];


}


?>


<link href="css/med.css" rel="stylesheet">

<div class="col-sm-4 col-md-offset-0">
    <div class="panel panel-default">
        <div class="panel-heading">الاسعار </div>

        <div class="panel-body">

            <form action="#" method="post" enctype="multipart/form-data">

                <input type="text" id="ed" name="ed"  value="<?php echo $edit_id; ?>" hidden>
                <div class="form-group col-sm-12" dir="rtl">
                    <label for="name" class="col-sm-12 control-label">  تصنيف </label>

                    <input type="text" class="form-control col-sm-12" id="name" name="name"
                           value="<?php echo $re1; ?>" placeholder=" اضف تصنيف جديد ">
                </div>
                <div class="form-group col-sm-12" dir="rtl">

                    <label for="xx" class="col-sm-12 control-label">  السعر </label>

                    <input type="text" class="form-control col-sm-12" id="price" name="price"
                           value="<?php echo $re2; ?>" placeholder=" السعر ">

                </div>
                <div class="form-group ">
                    <?php
                    if (isset($_GET['edit'])){
                        echo'<button type="submit" name="update" id="update" class="btn btn-primary center-block "
                            style="margin-top: 10px">تعديل </button>';}else
                    {
                        echo'<button type="submit" name="submit" id="submit" class="btn btn-primary center-block "
                            style="margin-top: 10px">اضافه </button>';
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>

<!--here is the table
-->


    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">نتيجه البحث  </div>
            <div class="panel-body" style="text-align: end;">

                <table class="table table-hover">

                    <thead>

                    <tr>

                        <th>#</th>
                        <th>النوع </th>
                        <th>السعر  </th>
                        <th>حذف  </th>



                    </tr>

                    </thead>
                    <tbody>
                    <?php
                $q = mysqli_query($conn, "SELECT * FROM price ");
                $num=1;
                 while($row = mysqli_fetch_array($q)){
                    $id = $row['price'];
                    $title = $row['name'];


                        echo'
                        <tr>
                        <td>'.$num++.'</td>
                        <td><a href="price.php?edit='.$row['id'].'">'.$title.'</a></td>
                      
                        <td>'.$id.'</td>
                        <td><a href="price.php?del='.$row['id'].'">  حذف  </a></td>
                        </tr>
';



            }

            ?>





</div>




<?php
include_once ('include/footer.php');
?>
