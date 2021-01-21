<?php
  error_reporting(E_ALL);
 require_once('config/database_connection.php'); ?>
<?php

$SID   = $_REQUEST['SID'];
  
//export.php  
$output = '';
if(isset($_POST["export"]))
{
 $query ="SELECT * FROM   tbl_profilingca  WHERE  SID = '$SID'";

$result= $dbConn->query($query);

 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" border="1" >  
          <tr>  
               <th style="background-color: #49657b; color:white;">TYPE</th>  
               <th style="background-color: #49657b; color:white;">CONVERGENCE AREA NAME</th>  
               <th style="background-color: #49657b; color:white;">REGION</th>  
               <th style="background-color: #49657b; color:white;">PROVINCE</th>
               <th style="background-color: #49657b; color:white;">MUNICIPALITY</th>  
               <th style="background-color: #49657b; color:white;">WATERSHED</th>  
               <th style="background-color: #49657b; color:white;">DATE FROM</th>  
               <th style="background-color: #49657b; color:white;">DATE TO</th>  
               <th style="background-color: #49657b; color:white;">STATUS</th>  
               <th style="background-color: #49657b; color:white;">COMMODITIES</th>  
               <th style="background-color: #49657b; color:white;">REMARKS</th>
               <th style="background-color: #49657b; color:white;"></th>
               <th style="background-color: #49657b; color:white;">VISION</th>
               <th style="background-color: #49657b; color:white;">MISSION</th>
               <th style="background-color: #49657b; color:white;">GOAL</th>
               <th style="background-color: #49657b; color:white;">OBJECTIVE</th>
               <th style="background-color: #49657b; color:white;">BRIEF DESCRIPTION</th>
               <th style="background-color: #49657b; color:white;"></th>
               <th style="background-color: #49657b; color:white;">OFFICE / AGENCY</th>
               <th style="background-color: #49657b; color:white;">INTERVENTION</th>
               <th style="background-color: #49657b; color:white;">PARTICULARS</th>
               <th style="background-color: #49657b; color:white;">COMMITTED QUANTITY</th>
               <th style="background-color: #49657b; color:white;">UNIT</th>
               <th style="background-color: #49657b; color:white;">COMMITTED BUDGET</th>

          </tr>
  ';

  $i = 0;
  while($row = mysqli_fetch_array($result))
  {  


            $output .= '
               <td>'.$row["INFO_CON_TYPE"].'</td>  
               <td>'.$row["INFO_NAME"].' </td>   
               <td>'.$rowLocation["name"].'</td> 
               <td>'.$rowProv["Province"].'</td> 
               <td>'.rtrim($municipalities_col,' ,').'</td> 
               <td>'.rtrim($ws_col,' ,').'</td> 
               <td>'.$row["INFO_TF_FROM"].'</td> 
               <td>'.$row["INFO_TF_TO"].'</td> 
               <td>'.$row["INFO_STATUS"].'</td> 
               <td>'.rtrim($comm_col,' ,').'</td> 
               <td>'.$row["INFO_REMARKS"].'</td>  
               <td></td>
               <td>'.$row["INFO_VISION"].'</td> 
               <td>'.$row["INFO_MISSION"].'</td> 
               <td>'.$row["INFO_GOAL"].'</td> 
               <td>'.$row["INFO_OBJECTIVE"].'</td> 
               <td>'.$row["INFO_BRIEF_DESC"].'</td>
               <td></td>';
              
   echo  '</tr>';    
   
   $i++;

  }
  $output .= '</table>';
  $expdate = date("Y/m/d");
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=CONVERGENCE AREA PROFILING'.$expdate.'.xls');
  echo $output;
 }
}
?>
