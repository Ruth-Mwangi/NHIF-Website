$(document).ready(function(){

    $("#reviewForm").submit(function(e){
        
        e.preventDefault();
        $.ajax({

            url:"connect.php",
            method:'post',
            data:$("#reviewForm").serialize(),
           success:function(data){
               alert(data);
           },error: function() {
            alert('There was some error performing the AJAX call!');
          }
        });
       

    });

    //signup
    

});