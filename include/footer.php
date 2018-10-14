<script src="js/jquery.min.js" type="text/javascript"></script>

<script src="js/bootstrap.min.js"></script>
    <script src="js/form.js"></script>
   <script src="js/site_js.min.js"></script>

    <script>
        $(document).ready(function(){
            setInterval(function(){
                $("#screen").load('do.php')
            }, 4000);
        });
    </script>





<script>

$(document).ready(function () {

    setTimeout(function(){
      var x=0;
      $(document).on('click',".search-result",function(e){
        var value=  $(e.target).text();
        var id=<?php echo $id; ?>;
        var date=<?php echo $date; ?>;
        $.ajax({
        type:"post",
        url : "include/save.php",
        data : {"data":value,"id":id},
        success : function(msg){
        //alert( "Data Saved: " + msg );

            $.get("include/save.php?id="+id+"&date="+date, function(data, status){
                /*alert("Data: " + data + "\nStatus: " + status);*/
                $("ul#list").empty();
                $("ul#list").append(data);
                $("#search_input").val('');
            });
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    // alert("some error");
  }
     });
     // var value=  $(e.target).text();
        /*$("ul#list").append('<li><a id="w'+x+'" style="text-decoration:none;" >'+value+'</a> <a <i class="glyphicon glyphicon-remove-circle" > </a></li>');
         $("#search_input").val('');*/
          document.getElementById("livesearch").innerHTML="";
          document.getElementById("livesearch").style.border="0px";
          x++;

      });
      $(document).on('click',"a#remove_a",function (e) {

            var pid=$(this).closest('li').attr('id');

            alert("hid"+pid);
          $(this).closest('li').remove();
          $.get("include/save.php?id="+pid+"&pid="+pid, function(data, status){



          });

      })
   },1000);
});
</script>

  <script>


  function postMed(str1){
document.getElementById("livesearch").innerHTML="";

  }


  function showResult(str) {
if (str.length==0) {
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
}
if (window.XMLHttpRequest) {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
} else {  // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function() {
  if (this.readyState==4 && this.status==200) {
    document.getElementById("livesearch").innerHTML=this.responseText;
    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        document.getElementById("livesearch").style.width="250px";


  }
}
xmlhttp.open("GET","livesearch.php?id="+str,true);
xmlhttp.send();





}




</script>


  </body>
</html>
