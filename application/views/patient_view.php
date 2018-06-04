<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Patient view</title>
  
    <style type="text/css">
    a {
     padding-left: 5px;
     padding-right: 5px;
     margin-left: 5px;
     margin-right: 5px;
    }
    </style>
  </head>
  <body>
    
   <!-- Search form (start) -->
   <form method='post' action="<?= base_url() ?>index.php/PatientController/loadRecord" >
      <select name="search">
                    <option value="name">Name</option>
                    <option value="surname">Surname</option>
                    <option value="cnp">CNP</option>
                    <option value="id">Pacient's ID</option>
                </select>
     <input type='text' name='search' value='<?= $search ?>'><input type='submit' name='submit' value='Advanced search'>
   </form>
   <br/>

   <!-- Posts List -->
   <table border='1' width='60%' style='border-collapse: collapse;'>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Surname</th>
      <th>Birth Date</th>
        <th>CNP</th>
    </tr>
    <?php 
    
    foreach($result as $data){
  $id =$data['id_patient'];
      $firstname =$data['first_name'];
        $lastname =$data['last_name'];
         $birthdate =$data['birth_date'];
        $cnp =$data['CNP'];
      echo "<tr>";
      echo "<td>".$id."</td>";
      echo "<td>".$firstname."</td>";
    echo "<td>".$lastname."</td>";
      echo "<td>".$birthdate."</td>";
        echo "<td>".$cnp."</td>";
      echo "</tr>";
    


    }
  
    if(count($result) == 0){
      echo "<tr>";
      echo "<td colspan='3'>No record found.</td>";
      echo "</tr>";
    }
    ?>
    <a href="<?php echo site_url('add_patient'); ?>">Add Patient</a> | 
   </table>

   <!-- Paginate -->
   <div style='margin-top: 10px;'>
   <?= $pagination; ?>
   </div>

 </body>
</html>