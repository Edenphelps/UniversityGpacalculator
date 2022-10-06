<?php require_once('../../connections/connection.php'); ?>
<?php include('phphead.php') ?>

<?php
mysqli_select_db($Connection,$database_Connection);

$query_request3 = sprintf("SELECT * FROM `tblcourse` where college= %s and `year` = %s",GetSQLValueString($_SESSION['college'], "text"),GetSQLValueString($_REQUEST['level'], "text"));
$request3 = mysqli_query($Connection,$query_request3) or die(mysqli_error($Connection));
$row_request = mysqli_fetch_assoc($request3);

$query_request4 = sprintf("SELECT b.course,a.courseunit,a.grade,a.`year`,a.semester,a.studentid FROM tblgpaentry a INNER JOIN tblcourse b ON a.course = b.id where a.`year`= %s and a.`semester` = %s and a.studentid=%s",GetSQLValueString($_REQUEST['level'], "text"),GetSQLValueString($_REQUEST['semester'], "text"),GetSQLValueString($_SESSION['stdid'], "text"),);
$request4 = mysqli_query($Connection,$query_request4) or die(mysqli_error($Connection));
$row_request2 = mysqli_fetch_assoc($request4);


$query_request5 = sprintf("SELECT Sum(a.courseunit * c.point)/ Sum(a.courseunit) as gpa FROM tblgpaentry a INNER JOIN tblcourse b ON a.course = b.id INNER JOIN tblgpoint c ON a.grade = c.grade where a.`year`= %s and a.`semester` = %s and a.studentid=%s",GetSQLValueString($_REQUEST['level'], "text"),GetSQLValueString($_REQUEST['semester'], "text"),GetSQLValueString($_SESSION['stdid'], "text"),);
$request5 = mysqli_query($Connection,$query_request5) or die(mysqli_error($Connection));
$row_request3 = mysqli_fetch_assoc($request5);


$query_request6 = sprintf("Select Sum(gpa)/ count(*) as cgpa from (SELECT Sum(a.courseunit * c.point)/ Sum(a.courseunit) as gpa FROM tblgpaentry a INNER JOIN tblcourse b ON a.course = b.id INNER JOIN tblgpoint c ON a.grade = c.grade where a.studentid= %s group by a.semester,a.`year`) as x",GetSQLValueString($_SESSION['stdid'], "text"),);
$request6 = mysqli_query($Connection,$query_request6) or die(mysqli_error($Connection));
$row_request4 = mysqli_fetch_assoc($request6);



if ((isset($_POST["MM_insertresult"])) && ($_POST["MM_insertresult"] == "regm")) {

   $insertSQL = sprintf("INSERT INTO tblgpaentry (studentid,course,courseunit,grade,`year`,semester) VALUES (%s,%s,%s, %s, %s,%s)",
    GetSQLValueString($_SESSION['stdid'], "text"),
    GetSQLValueString($_POST['course'], "text"),
    GetSQLValueString($_POST['unit'], "text"),
    GetSQLValueString($_POST['grade'], "text"),
    GetSQLValueString($_POST['level'], "text"),
    GetSQLValueString($_POST['semester'], "text"));
$semester= $_REQUEST['semester'];
$level= $_REQUEST['level'];

$Result1 = mysqli_query($Connection,$insertSQL) or die(mysqli_error());
header("Location: c_result?semester=$semester&level=$level" );


}

?>







<!DOCTYPE html>
<html>


    <?php include('../file_include/head.php') ?>

<script type="text/javascript">
        $(document).ready(function(){

            $("#course").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'cunit.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#name").empty();
                        for( var i = 0; i<len; i++){
                            var name = response[i]['name'];

                            document.getElementById("unit").value = name;

                        }
                    }
                });
            });

        });
    </script>



<body class="skin-blue" onload="t()">



    <div class="wrapper">

       <?php include('../file_include/main_header.php') ?>

 

 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            GPA Result Calculator </h1>
          <ol class="breadcrumb">
            <li><a href="_home">Home</a></li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <?php /* include('../file_include/dashboards_t.php') */ ?>


    <div class="row">
            <div class="col-md-5 col-sm-6 col-xs-12">
 <h4>Welcome <?php echo $_SESSION['fname'] ?> 
          </h4>


          </div>

          <div class="clearfix"></div>       

   <div class="row">
    <div class="col-md-12">
          <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border AgentDashBoard">
                  <h3 align="center">Enter result for <u>Semester <?php echo $_REQUEST["semester"] ?> - <?php echo $_REQUEST["level"] ?>00 Level</u></h3> </div>
                <div  class="col-md-6 box-body" style="float:none;margin:auto">
               
                 <form action="c_result" method="post" name="addresult" id="addresult">
            <table class="table">
            <tr>
              <th style="text-align:center">Course Code</th>
              <th style="text-align:center">Credit Unit</th>
              <th style="text-align:center">Grade</th>
            </tr>

           
  
            <tr>
              <td><select name="course" id="course" required class="form-control">
              
              <option selected disabled>--Select Course--</option>

              <?php if(mysqli_num_rows($request3) > 0){  ?>
                 <?php 
                      do { ?>


                  <option value="<?php echo $row_request['id']; ?>"><?php echo $row_request['course']; ?></option>
                <?php } while ($row_request = mysqli_fetch_assoc($request3)); 
                  ?>
                     <?php } ?>

            </select></td>
            <td> <input required type="text" readonly class="form-control" id="unit"  name="unit"/></td>

               <td><select name="grade" id="grade" required class="form-control">
              
              <option selected disabled>--Select Grade--</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>F</option>

            </select></td>

              </tr>


              <tr>
                <td colspan="3" align="center"><button class="btn">Add Next Subject</button></td>

                </tr>


            </table>

               <input type="hidden" name="MM_insertresult" value="regm">
               <input type="hidden" name="semester" value="<?php echo $_REQUEST["semester"] ?>">
               <input type="hidden" name="level" value="<?php echo $_REQUEST["level"] ?>">
        </form> 

            <?php if(mysqli_num_rows($request4) > 0){  ?>
              <table class="table">
            <tr>
              <th style="text-align:center">Course Code</th>
              <th style="text-align:center">Credit Unit</th>
              <th style="text-align:center">Grade</th>
              <th>&nbsp;</th>
           
            </tr>
                   <?php 
                      do { ?>
            <tr>
              <!-- <td><input type="text" disabled class="form-control" value="<?php echo $row_request2['course']; ?>"/></td>
               <td><input type="text" disabled class="form-control" value="<?php echo $row_request2['courseunit']; ?>"/></td>
                <td><input type="text" disabled class="form-control" value="<?php echo $row_request2['grade']; ?>"/></td> -->

                <td style="text-align:center"><?php echo $row_request2['course']; ?></td>
                <td style="text-align:center"><?php echo $row_request2['courseunit']; ?></td>
                <td style="text-align:center"><?php echo $row_request2['grade']; ?></td>
                <td style="text-align:center"><a href="#"><u>Delete</u></a></td>


             
              </tr>
                     <?php 
                        } while ($row_request2 = mysqli_fetch_assoc($request4)); 
                  ?>

            </table>
            <hr>
                <div align="center">
                <button class="btn btn-success" onclick="ls()">Calculate GPA</button>
                </div>
                 <?php } ?>

                </div>

                <div class="clearfix"></div>
              </div>
            </div>
       </div>
     </div>

<div class="clearfx"></div>
</div>
</div>



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


<?php include('../file_include/footer.php') ?>
       </div><!-- ./wrapper -->


        </body>
  </html>


 <script type="text/javascript">
    function ls(){
        $('#myModalgpa').modal('show');
    };

    
</script>

<!-------------------------------------------Modal-------------------------------------->

<div class="modal fade" tabindex="-1" role="dialog" id="myModalgpa">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Semester <?php echo $_REQUEST["semester"] ?> - <?php echo $_REQUEST["level"] ?>00 Level</u></h5>
                </div>

                <div class="modal-body">
                     <h4>Your GPA is - <?php echo  bcdiv($row_request3['gpa'], 1, 2) ; ?></h4>
                     <h4>Your Current CGPA is - <?php echo  bcdiv($row_request4['cgpa'], 1, 2) ; ?></h4>
                    </div>
          </div>
        </div>
      </div> 

<!-------------------------------------Modal End----------------------------------------------------------->
