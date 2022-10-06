
<?php
mysqli_close($Connection);

?>

<footer class="main-footer">
       
        <p>&copy; <script>document.write(new Date().getFullYear());</script> MCU Student GPA Calculator | Developed by
                        <a href="#">Demilade Liopo</a>
                </p>
      </footer>

      <script>
$(document).ready(function() {
    $('#dataTables-example').DataTable( {
      
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel' ]
    }
     );
} );
</script>



<script type="text/javascript" src="../../dist/js/jquery.dataTables.min.js"></script>



     <script src="../../dist/js/app.min.js" type="text/javascript"></script>


<script src="../../dist/js/modernizr.js"></script>

<script type="text/javascript" src="../../dist/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../../dist/js/buttons.flash.min.js"></script>


<script type="text/javascript" src="../../dist/js/jszip.min.js"></script>

<script type="text/javascript" src="../../dist/js/pdfmake.min.js"></script>
<script type="text/javascript" src="../../dist/js/vfs_fonts.js"></script>

<script type="text/javascript" src="../../dist/js/buttons.print.min.js"></script>

<script type="text/javascript" src="../../dist/js/buttons.html5.min.js"></script>
<script src="../../dist/js/bootstrap-datepicker.min.js"></script>

<script src="../../dist/js/bootstrap.min.js"></script>

<script src="../../bootstrap/js/bootstrap-select.min.js"></script>


