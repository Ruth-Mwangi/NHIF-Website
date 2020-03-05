var y;
$(document).ready(function(){

    $("select#county").hover(function(){
        //Do Nothing On Mouse In
    },function(){
        var x = $(this).find("option:selected").val();
        //alert(x);
        $.post("counties.php",{fetchhosp:x},function(data){
            //alert(data);
            $(".container").html(data);
        });
        
    })
//
    $("select#category").hover(function(){
        //Do Nothing On Mouse In
    },function(){
        y = $(this).find("option:selected").val();
        //alert(x);
        $.post("category.php",{fetchcategory:y},function(data){
            //alert(data);
            $(".container").html(data);
        });
        
    })

    $.post("counties.php", {county:"county"},function(data){
        //alert(data);
        $("#county").html(data);
    });
    $.post("category.php", {category:"category"},function(data){
        //alert(data);
        $("#category").html(data);
    });


    $("#reviewForm").submit(function(e){
        
        e.preventDefault();
        $.ajax({

            url:"review.php",
            method:'post',
            data:$("#reviewForm").serialize(),
           success:function(data){
               alert(data);
           },error: function() {
            alert('There was some error performing the AJAX call!');
          }
        });

        $("#reviewForm").trigger("reset");
       

    });

    //signup
    

});