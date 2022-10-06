<?php require_once('../../connections/connection.php'); ?>
<?php include('phphead.php') ?>




<!DOCTYPE html>
<html>


    <?php include('../file_include/head.php') ?>
<body class="skin-black" onload="t()">



    <div class="wrapper">

       <?php include('../file_include/main_header.php') ?>

 

 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            GPA Calculator </h1>
          <ol class="breadcrumb">
          <li><a href="_home"> Home</a></li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <?php /* include('../file_include/dashboards_t.php') */ ?>


    <div class="row">
            <div class="col-md-5 col-sm-6 col-xs-12">
 <h4></span><span class="fa fa-user"> </span> Welcome <?php echo $_SESSION['fname'] ?> 
          </h4>


          </div>
<br>
          <div class="clearfix"></div>       

   <div class="row">
            <div class="col-md-12">

          <div class="col-md-4">
              <a href="#" onclick="ls()">
              <div class="box">
                <div class="box-header with-border AgentDashBoard">
                  <h3 align="center"></h3> </div>
                <div align="center" class="box-body">
                <h4><u>Calculate New Score</u></h4>
                 <p>You can calculate your current GPA and CGPA</p>
                </div>
              </div></a>
            </div>



             <div class="col-md-4">
              <a href="#" onclick="ls2()">
              <div class="box">
                <div class="box-header with-border AgentDashBoard">
                  <h3 align="center"></h3> </div>
                <div align="center" class="box-body">
                <h4><u>Forecast Score</u></h4>
                 <p>You can forecast your score</p>
                </div>
              </div></a>
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
        $('#myModal').modal('show');
    };

    
</script>
<!-------------------------------------------Modal-------------------------------------->

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Create New Result</h4>
                </div>
                <form action="c_result" method="post" name="RegisterForm" id="RegisterForm">
                <div class="modal-body">
        

          <div class="form-group has-feedback">

          <select name="level" id="level" required class="form-control">
              
              <option selected disabled>--Select Level--</option>
              <option value="1">100 Level</option>
              <option value="2">200 Level</option>
              <option value="3">300 Level</option>
              <option value="4">400 Level</option>
              <option value="5">500 Level</option>
            </select>

</div>

              <div class="form-group has-feedback">

              <select name="semester" id="semester" required class="form-control">
                  
                  <option selected disabled>--Select Semester--</option>
                  <option value="1">1st Semester</option>
                  <option value="2">2nd Semester</option>
                </select>

              </div>
              
                
                </div>
          
              <div class="modal-footer">
              <button name="CA" id="CA" type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
              </div>
              <input type="hidden" name="MM_insert" value="regm">
        </form> 
          </div>
        </div>
      </div> 

<!-------------------------------------Modal End----------------------------------------------------------->


