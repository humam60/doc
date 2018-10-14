<?php
include_once ('include/header.php');
include_once('include/c.php');
$p_che="";
$p_risk="";
$p_exam="";
$pecg="";
$pecho="";
$pcxr="";
$ptmt="";
$pinvest="";
$pcor="";
$pct="";
$pp="";
$pmed="";
$pother="";


if (isset($_GET['id'] )){
    $date=date('Y-M-d');
 $id = $_GET['id'];
    $sql=mysqli_query($conn,"SELECT * FROM `patien` WHERE `id` = '$_GET[id]' ");
    $medic=mysqli_query($conn,"SELECT * FROM `medic`");
    $post=mysqli_fetch_assoc($sql);
    $x=$post['p_name'];
}

/*if (isset($_GET['med_id'] )){
 $id = $_GET['med_id'];
    $sql=mysqli_query($conn,"SELECT * FROM `med` WHERE `id` = '$_GET[id]' ");
    $medic=mysqli_query($conn,"SELECT * FROM `medic`");
    $post=mysqli_fetch_assoc($sql);
    $x=$post['p_name'];
}*/

if(isset($_GET['id']) && isset($_GET['date'])){
    $date=$_GET['date'];

    $pation= mysqli_query($conn, "SELECT * FROM p_data WHERE id='$id' and date='$_GET[date]' ") or die(mysqli_error());
    $pop= mysqli_fetch_assoc($pation);
    $p_che=$pop['che'];
    $p_risk=$pop['risk'];
    $p_exam=$pop['exam'];
    $pecg=$pop['ecg'];
    $pecho=$pop['echo'];
    $pcxr=$pop['cxr'];
    $ptmt=$pop['tmt'];
    $pinvest=$pop['invest'];
    $pcor=$pop['coronary'];
    $pct=$pop['ct'];
    $pp=$pop['plan'];
    $pmed=$pop['medica'];

    $pother=$pop['other'];

}

if (isset($_GET['delete'])){
    $sql=mysqli_query($conn,"DELETE FROM `p_data` WHERE `id`= '$_GET[delete]'");
    $id=$_GET['delete'];
    header("Location:patin.php?id=$id");
}

if (isset($_POST['submit'])){
    $date=date('Y-M-d');
echo '<div class="alert alert-success" role="alert" > تم تحديث بيانات المريض  </div>';
    $p_che=$_POST['p_che'];
    $p_risk=$_POST['p_risk'];
    $p_exam=$_POST['p_exam'];
    $pecg=$_POST['pecg'];
    $pecho=$_POST['pecho'];
    $pcxr=$_POST['pcxr'];
    $ptmt=$_POST['ptmt'];
    $pinvest=$_POST['pinvest'];
    $pcor=$_POST['pcor'];
    $pct=$_POST['pct'];
    $pp=$_POST['pp'];
    $pmed=$_POST['pmed'];

    $pother=$_POST['pother'];




    mysqli_query($conn,"INSERT INTO `p_data`(`id`, `che`, `risk`, `exam`, `ecg`, `echo`, `cxr`, `tmt`, `invest`,
     `coronary`, `ct`, `plan`, `medica`, `other`, `date`, `i`) VALUES ('$id','$p_che',
'$p_risk','$p_exam','$pecg','$pecho','$pcxr','$ptmt','$pinvest','$pcor','$pct','$pp','$pmed','$pother','$date','1' ) ")or die(mysqli_error($conn));;


    $p_che="";
    $p_risk="";
    $p_exam="";
    $pecg="";
    $pecho="";
    $pcxr="";
    $ptmt="";
    $pinvest="";
    $pcor="";
    $pct="";
    $pp="";
    $pmed="";
    $pother="";
}
?>

<link href="css/patin.css" rel="stylesheet">





<div class="row">

  <div class="col-md-2" style="padding-right: 20px">


    <?php

        if(isset($_GET['id']) ){
            $searchq = $_GET['id'];


            $q = mysqli_query($conn, "SELECT * FROM p_data WHERE id LIKE '$searchq' ") or die(mysqli_error());
            $c = mysqli_num_rows($q);
            if($c == 0){
                echo $output = '<b>"لاتوجد زيارات سابقه "</b>';
            } else {
                echo '<table class="table">
            <thead>
            <tr>
            <th scope="col"><a href="patin.php?id='.$_GET['id'].'"> اضف مراجعه جديده</a> </th>
            </tr>
                <th scope="col">اخر مراجعه</th>


            </tr>
            </thead>
            <tbody>';
                ?>
    <?php


                $num=1;
                while($row = mysqli_fetch_array($q)) {
                    $date = $row['date'];

                    echo ' <tr>
                <th scope="row"><a href="patin.php?id='.$row['id'].'&date='.urldecode($date).'">'.$date.'</a></th>
                <td><a href="patin.php?delete='.$row['id'].'" type="button" class="btn btn-warning btn-xs">X</a></td>
            </tr>
          ';
                }
            }
        }
        ?>
    </tbody>
    </table>



  </div>




  <div class="col-md-10" style="padding-left: 50px">
    <div class="panel panel-info ">
      <div class="panel-heading">معلومات المريض </div>
      <div class="panel-body">

        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="well well-sm" id="co">
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <?php if($post['p_address']=='male' ){ echo ' <img src="img/man.png" alt="" class="img-rounded img-responsive" />'; }else
                                    echo '<img src="img/female.png" alt="" class="img-rounded img-responsive" />'; ?>
              </div>
              <div class="col-sm-6 col-md-8">
                <h4>
                  <?php echo $x; ?>
                </h4>
                <small> <i class="glyphicon glyphicon-map-marker"></i>
                  <cite title="San Francisco, USA">
                    <?php echo $post['p_city'];  ?> </cite></small>
                <p>
                  <i class="glyphicon glyphicon-heart-empty" style="margin-left: 3px"></i>
                  <?php echo $post['p_age']; echo "  سنه"; ?>
                  <br />
                  <i class="glyphicon glyphicon-phone"> </i>
                  <?php echo $post['p_num'];  ?>
                  <br />
                </p>
              </div>
            </div>
          </div>
        </div>



        <div class="row" dir="ltr">
          <div class="col-md-10">

            <form action="" method="post">
              <div class="form-group row">

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="p_che" name="p_che" value="<?php echo $p_che; ?>" required>
                </div>
                <label for="p_che" class="col-sm-4 control-label">Chief Complaint & Duration : </label>


              </div>

              <div class="form-group row">

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="p_risk" name="p_risk" value="<?php echo $p_risk; ?>" required>
                </div>
                <label for="p_risk " class="col-sm-4 control-label">Risk factors : </label>


              </div>


              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="p_exam" name="p_exam" value="<?php echo $p_exam; ?>" required>
                </div>
                <label for="p_exam " class="col-sm-4 control-label">Examination notes :</label>

              </div>


              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="pecg" name="pecg" value="<?php echo $pecg; ?>" required>
                </div>
                <label for="pecg" class="col-sm-4 control-label">ECG notes :</label>

              </div>



              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="pecho" name="pecho" value="<?php echo $pecho; ?>" required>
                </div>
                <label for="pecho " class="col-sm-4 control-label">ECHO notes :</label>

              </div>


              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="pcxr" name="pcxr" value="<?php echo $pcxr; ?>" required>
                </div>
                <label for="pcxr" class="col-sm-4 control-label">CXR notes :</label>

              </div>

              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="ptmt" name="ptmt" value="<?php echo $ptmt; ?>" required>
                </div>
                <label for="ptmt" class="col-sm-4 control-label">TMT notes :</label>
              </div>


              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="pinvest" name="pinvest" value="<?php echo $pinvest; ?>" required>
                </div>
                <label for="pinvest" class="col-sm-4 control-label">Investigations notes :</label>

              </div>

              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="pcor" name="pcor" value="<?php echo $pcor; ?>" required>
                </div>
                <label for="pcor" class="col-sm-4 control-label">Coronary Amgio & date :</label>

              </div>

              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="pct" name="pct" value="<?php echo $pct; ?>" required>
                </div>
                <label for="pct" class="col-sm-4 control-label">CT or MRI related :</label>

              </div>



              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="pp" name="pp" value="<?php echo $pp; ?>" required>
                </div>
                <label for="pp" class="col-sm-4 control-label">Plan of managment :</label>

              </div>






                  <form>
  <input  id="search_input" type="text" size="30" onkeyup="showResult(this.value)">
  <div id="livesearch"></div>
  </form>


  <ul id="list" style="width:400px;height:100px;overflow: scroll; border: 1px solid #ccc;">
<!--<li>This is the li....</li>-->

</ul>















              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="pother" name="pother" value="<?php echo $pother; ?>" required>
                </div>
                <label for="pother" class="col-sm-4 control-label">Other notes :</label>

              </div>







              <button type="submit" name="submit" id="submit" class="btn btn-default pull-left" style="margin-bottom: 25px; margin-top: 25px; margin: 15px;">حفظ </button>
            </form>

          </div>







        </div>
      </div>
    </div>

  </div>

</div>










<?php
    include_once ('include/footer.php');
    ?>
