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
      echo '<div class="row"> <div class="col-md-1"><h5>Codes</h5></div>  <div class="col-md-4"><h5>Hospital</h5></div>  <div class="col-md-2"><h5>Branch</h5></div>  <div class="col-md-1"><h5>County</h5></div>  <div class="col-md-2"><h5>Category</h5></div> <div class="col-md-2"><h5>Users</h5></div> </div>';
      if(($result->num_rows)>0){
          foreach($result as $row){
    
             $output='
                <div class="row"> <div class="col-md-1"><p>'.$row['NHIF_Codes'].'</p></div>  <div class="col-md-4"><p>'.$row['hospital'].'</p></div>  <div class="col-md-2"><p>'.$row['branch'].'</p></div>  <div class="col-md-1"><p>'.$row['county'].'</p></div>  <div class="col-md-2"><p>'.$row['category'].'</p></div> <div class="col-md-2"><p>'.$row['users'].'</p></div></div>
                
    
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
      echo '<div class="row"> <div class="col-md-2"><h5>Codes</h5></div>  <div class="col-md-4"><h5>Hospital</h5></div>  <div class="col-md-2"><h5>Branch</h5></div>  <div class="col-md-2"><h5>County</h5></div>  <div class="col-md-1"><h5>Category</h5></div> <div class="col-md-1"><h5>Users</h5></div> </div>';
      if(($result->num_rows)>0){
            foreach($result as $row){

               $output='
                  <div class="row"> <div class="col-md-2"><p>'.$row['NHIF_Codes'].'</p></div>  <div class="col-md-4"><p>'.$row['hospital'].'</p></div>  <div class="col-md-2"><p>'.$row['branch'].'</p></div>  <div class="col-md-2"><p>'.$row['county'].'</p></div>  <div class="col-md-1"><p>'.$row['category'].'</p></div> <div class="col-md-1"><p>'.$row['users'].'</p></div> </div>
                  

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