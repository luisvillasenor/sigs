

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Latest compiled and minified JavaScript -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins)
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
Latest compiled and minified JavaScript  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/jquery-1.11.3.min.js" type="text/javascript"></script>  
-->
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/jquery-1.11.2.min.js" type="text/javascript"></script>  

<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/affix.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/alert.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/button.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/collapse.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/dropdown.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/modal.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/tooltip.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/popover.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/scrollspy.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/tab.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/transition.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/holder.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>bootstrap-3.3.4-dist/js/ie10-viewport-bug-workaround.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>jquery-ui-1.11.4/external/jquery/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jquery-ui-1.11.4/jquery-ui.js" type="text/javascript"></script>




<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>


<script>

 $(function(){
  $( "#from" ).datepicker({
    dateFormat: "yy-mm-dd",
    defaultDate: "+0w",
    changeMonth: true,
    numberOfMonths:2,
    onClose: function( selectedDate ){
      $( "#to" ).datepicker( "option", "minDate", selectedDate );
    }
  });
  $( "#to" ).datepicker({
    dateFormat: "yy-mm-dd",
    defaultDate: "+0w",
    changeMonth: true,
    numberOfMonths:2,
    onClose: function( selectedDate ){
      $( "#from" ).datepicker( "option", "maxDate", selectedDate );
    }
  });

 });


 </script>

<script type="text/javascript">
  
  var myRequest = getXMLHTTPRequest();

  function getXMLHTTPRequest(){

    var request = false;

    if (window.XMLHttpRequest) {
      request = new XMLHttpRequest();
    }
      else {

        if (window.ActiveXObject) {

          try{

            request = new ActiveXObject("Msml2.XMLHTTP");
          }
          catch(err1){
            try{
              request = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(err2){
              request = false;
            }
          }
        }
      }
      return request;
  }

  function obtenerDistritoFederal(){
    var dlocal = document.nuevoeditciudadano.dlocal.value;
    var url = "<?php echo base_url('secciones/showlocal');?>/"+dlocal;
    myRequest.open("GET", url, true);
    myRequest.onreadystatechange = DistritoFederal;
    myRequest.send(null);
  }

  function DistritoFederal(){
    if (myRequest.readyState == 4) {

      if (myRequest.status == 200) {
        document.nuevoeditciudadano.distrito.value = myRequest.responseText;
      }
        else{
          document.nuevoeditciudadano.distrito.value = myRequest.status;
        }

    }
      else{
        document.nuevoeditciudadano.distrito.value = "ERROR";
      }
  }

  function obtenerDistritoLocal(){
    var seccion_id = document.nuevoeditciudadano.id_seccion.value;
    var url = "<?php echo base_url('secciones/show');?>/"+seccion_id;
    myRequest.open("GET", url, true);
    myRequest.onreadystatechange = DistritoLocal;
    myRequest.send(null);
  }

  function DistritoLocal(){

    if (myRequest.readyState == 4) {
      if (myRequest.status == 200) {
        document.nuevoeditciudadano.distritolocal.value = myRequest.responseText;
      }
        else{
          document.nuevoeditciudadano.distritolocal.value = myRequest.status;
        }
    }
      else{
        document.nuevoeditciudadano.distritolocal.value = "ERROR";
      }
  }

</script>

</body>
</html>