<!doctype html>
<html lang="en">

  
  <head>
  	<title>MCU</title>
    <meta charset="utf-8">
   

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	

        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../../dist/js/jquery-3.5.1.js"></script>
      <script type="text/javascript">

  $(document) .ready(function(){
    $('#feedback') .load('usercheck.php') .show();

    $('#email') .keyup(function(){
      $('#feedback').html ('<img src="loading.gif">');

      $.post('usercheck.php', {username: RegisterForm.email.value},function(result) {
        $('#feedback') .html(result).show();
      });
    });
  });
   
    </script>
  </head>


  <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal({
    backdrop: 'static',
    keyboard: false
});
    });

    function pch(){
      

    }

</script>


	<body>


      <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Student Registration</h4>
                </div>

                <div class="modal-body">
         <form action="nmb" method="post" name="RegisterForm" id="RegisterForm">
          <div class="form-group has-feedback">
            <input required type="text" class="form-control" placeholder="Full name" name="fname"/>
        
          </div>


          <div id="feedback"></div>
          <div class="form-group has-feedback">
            <input required type="email" class="form-control" placeholder="Email" name="email" id="email" />

          </div>
         
         
          <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password"  name="pwd"/>
           
          </div>

        
          <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Retype password" onblur="pch()"  name="rpwd"/>
           
          </div>

         
          <div class="form-group has-feedback">
          <select name="college" id="college" required class="form-control">
              
            <option selected disabled>--Select College--</option>
            <option value="A">COLNAS</option>
            <option value="B">COLHUM</option>
            <option value="C">COSMAS</option>
          </select>
           
          </div>
         
          <div class="form-group has-feedback">
          <input type="number" class="form-control" placeholder="Years of Program"  name="yop"/>
           
          </div>

   <br>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input required type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div>                          
            </div><!-- /.col -->
            <div class="col-xs-4"> 
              <button name="CA" id="CA" type="submit" class="btn btn-primary btn-block btn-flat" onclick="return confirm('Are you sure?')">Register <span class="glyphicon glyphicon-edit"></span></button>
            </div><!-- /.col -->
          </div>

          <input type="hidden" name="MM_insert" value="regm">
        </form>        
                
                </div>
          
              <div class="modal-footer">
              <a href="../../index" class="btn btn-default btn-flat">Back</a>
              </div>
          </div>
        </div>
      </div> 

  </body>

  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>
	</body>
</html>

