<?php
include("connect.php");

if(isset($_POST['county'])){
   $sql = "SELECT * FROM counties";
   $result = $conn->query($sql);
   
   foreach($result as $row){
      $output = '
           <option value="'.$row['county'].'">'.$row['county'].'</option>
      ';
      echo $output;
   }
}

if(isset($_POST['fetchhosp'])){
   $hosp =$_POST['fetchhosp'];
   

   if($hosp == 'All'){
      $sql = "SELECT * FROM outpatient";
      $result = $conn->query($sql);
      echo '<div class="row"> <div class="col-md-2"><h4>NHIF_Codes</h4></div>  <div class="col-md-4"><h4>Hospital</h4></div>  <div class="col-md-2"><h4>Branch</h4></div>  <div class="col-md-2"><h4>County</h4></div>  <div class="col-md-2"><h4>Category</h4></div> </div>';
      if(($result->num_rows)>0){
          foreach($result as $row){
    
             $output='
                <div class="row"> <div class="col-md-2"><p>'.$row['NHIF_Codes'].'</p></div>  <div class="col-md-4"><p>"'.$row['hospital'].'</p></div>  <div class="col-md-2"><p>'.$row['branch'].'</p></div>  <div class="col-md-2"><p>'.$row['county'].'</p></div>  <div class="col-md-2"><p>'.$row['category'].'</p></div> </div>
                
    
             ';
             echo $output;
             //echo " ";
             //<p>'.$row['hospital'].'</p>
          }  
      }else {
         echo "Zero Hospitals in the record";
      }

   }
   else{
      $sql = "SELECT * FROM outpatient WHERE county='$hosp'";
      $result = $conn->query($sql);
      echo '<div class="row"> <div class="col-md-2"><p>NHIF_Codes</p></div>  <div class="col-md-4"><p>Hospital</p></div>  <div class="col-md-2"><p>Branch</p></div>  <div class="col-md-2"><p>County</p></div>  <div class="col-md-2"><p>Category</p></div> </div>';
      if(($result->num_rows)>0){
            foreach($result as $row){

               $output='
                  <div class="row"> <div class="col-md-2"><p>'.$row['NHIF_Codes'].'</p></div>  <div class="col-md-4"><p>"'.$row['hospital'].'</p></div>  <div class="col-md-2"><p>'.$row['branch'].'</p></div>  <div class="col-md-2"><p>'.$row['county'].'</p></div>  <div class="col-md-2"><p>'.$row['category'].'</p></div> </div>
                  

               ';
               echo $output;
               //echo " ";
               //<p>'.$row['hospital'].'</p>
            }  
      }else {
         echo "Zero Hospitals in the record";
      }

   }
   
}

?>