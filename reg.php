<?php
include('c.php');
    $date=date('Y-M-d');
	
$x='';

	
	if (isset($_POST['submit'])) {
echo '<div class="alert alert-danger" role="alert"> الخانه فارغه  </div>';
        $name = strip_tags($_POST['p_name']);
        $age = ($_POST['p_age']);
        $city = ($_POST['p_city']);
        $gender = ($_POST['p_gender']);
        $p_num = ($_POST['p_num']);


        $insert = "INSERT INTO `patien`(`p_name`, `p_age`,`p_address`,`p_city`,`status`,`date`,`p_num`) VALUES ('$name','$age','$gender','$city','published','$date','$p_num')";
        mysqli_query($conn, $insert);
		header("Location: mange.php");
		echo "hi";
    }

  

?>



//old index.php

<?php
/*
include_once('include/header.php');
?>



<article class="col-md-9 col-lg-9 art_bg" style="background: rgba(238, 238, 238, 0.32);margin-right: 107px;">

    <div  class="page-header"><h1>   تسجيل بيانات المرضى </h1></div>

    <div class="container-fluid" >




        <form action="reg.php" method="POST"  class="col-sm-8" id="reg" enctype="multipart/form-data" >


            <div class="form-group" style="padding-top: 25px;">
                <label for="exampleInputEmail1 " class="col-sm-2 control-label">اسم المريض</label>
                <div class="col-sm-10">
                    <input  type="text" class="form-control" id="p_name" name="p_name" placeholder="اسم المريض" required>
                </div>
            </div>





            <div class="form-group" style="padding-top: 25px;">
                <label for="xxx" class="col-sm-2 control-label" >عمر المريض</label>
                <div class="col-sm-10">
                    <input type="number" min="18" max="99" class="form-control" id="p_age" name="p_age" placeholder="عمر المريض" >
                </div>
            </div>




            <div class="form-group" style="padding-top: 25px;">
                <label for="xx" class="col-sm-2 control-label">مكان السكن </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control " id="p_city" name="p_city" placeholder="مكان السكن  " required>
                </div>
            </div>


            <div class="form-group" style="padding-top: 25px;">
                <label for="xx" class="col-sm-2 control-label"> رقم الهاتف </label>
                <div class="col-sm-10">
                    <input type="text"   maxlength="11" pattern="\d{1,15}" class="form-control " id="p_num" name="p_num" placeholder=" رقم الهاتف  ">
                </div>
            </div>

            <div class="form-group" style="padding-top: 25px;">
                <label for="grender"  id=grender class="col-sm-2 control-label" > تحديد الجنس</label>
                <div class="col-sm-10">
                    <select name="p_gender" class="form-control col-md-3">
                        <option value=""> اختر الجنس </option>
                        <option value="male">ذكر </option>
                        <option value="female">انثى </option>
                    </select>
                </div>
            </div>









            <button type="submit" name="submit"  id="submit" class="btn btn-default" style="margin-bottom: 25px">اضافه مريض</button>





        </form>



    </div>
    </div>
</article>





<!-- Include all compiled plugins (below), or include individual files as needed -->
<?php include_once('include/footer.php'); ?>







