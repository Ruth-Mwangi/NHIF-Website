<?php
include ("connect.php");

if(isset($_POST['category'])){
     $sql= "SELECT * FROM category";
$result = $conn->query($sql);
foreach($result as $row){
    $output = '
         <option value="'.$row['category'].'">'.$row['category'].'</option>
    ';
    echo $output;
 }

}


 if (isset($_POST['fetchcategory'])){
      $category=$_POST['fetchcategory'];

      if ($category == 'outpatient'){
           $sql="SELECT * FROM outpatient";
           $result = $conn->query($sql);
           echo '<div class="row"> <div class="col-md-2"><h4>NHIF_Codes</h4></div>  <div class="col-md-4"><h4>Hospital</h4></div>  <div class="col-md-2"><h4>Branch</h4></div>  <div class="col-md-2"><h4>County</h4></div>  <div class="col-md-2"><h4>Category</h4></div> </div>';

           if(($result->num_rows)>0){
               foreach($result as $row){
         
                  $output='
                     <div class="row"> <div class="col-md-2"><p>'.$row['NHIF_Codes'].'</p></div>  <div class="col-md-4"><p>'.$row['hospital'].'</p></div>  <div class="col-md-2"><p>'.$row['branch'].'</p></div>  <div class="col-md-2"><p>'.$row['county'].'</p></div>  <div class="col-md-2"><p>'.$row['category'].'</p></div> </div>
                     
         
                  ';
                  echo $output;
                  
               }  
           }else {
              echo "Zero Hospitals in the record";
           }


      }
      else{
          $sql="SELECT * FROM inpatient";
          $result = $conn->query($sql);
          echo '<div class="row"> <div class="col-md-3"><h4>Hospital</h4></div>  <div class="col-md-3"><h4> No. Beds</h4></div>  <div class="col-md-3"><h4>Branch</h4></div>  <div class="col-md-3"><h4>Category</h4></div> </div>';

          if(($result->num_rows)>0){
              foreach($result as $row){
        
                 $output='
                    <div class="row"> <div class="col-md-3"><p>'.$row['hospital'].'</p></div>  <div class="col-md-3"><p>'.$row['beds'].'</p></div>  <div class="col-md-3"><p>'.$row['branch'].'</p></div>  <div class="col-md-3"><p>'.$row['category'].'</p></div> </div>
                    
        
                 ';
                 echo $output;
                 
              }  
          }else {
             echo "Zero Hospitals in the record";
          }

      }
 }

?>