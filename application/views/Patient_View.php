<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="en">
   <head> 
         <!-- <Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
          
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" 
          crossorigin="anonymous">
    <script type = 'text/javascript' src = "<?php echo base_url(); 
   ?>js/sample.js"></script>
     
   </head> 
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       </br>
       
        <form action="<?= site_url('Patient_Controller/loadRecord'); ?>" method="POST"  id="dropdown">
             <p>Search patient</p>
            <select name="dropdown" id =" dropdown" onchange="myFunction(this)">
                <option value="name"  <?php echo (isset($_POST['dropdown']) && ($_POST['dropdown']) == 'name') ? 'selected="selected"' : ''; ?> >Name </option>
                <option value="surname" <?php echo (isset($_POST['dropdown']) && ($_POST['dropdown']) == 'surname') ? 'selected="selected"' : ''; ?>>Surname</option>
                <option value="cnp"<?php echo (isset($_POST['dropdown']) && ($_POST['dropdown']) == 'cnp') ? 'selected="selected"' : ''; ?>>CNP</option> 
            </select>

            <script>
                function myFunction(selectObject) {
                    var dropdown = selectObject.value;
                    document.getElementById('dropdown').value = dropdown;
                    document.getElementById('dropdown');
                }
                function ClearFields() {
                    document.getElementById("search").value = "";
                }

            </script>
            <input type='text'  name='search' id="search" value="<?php if ($search) { print $search; } ?>">
           
            <input type='submit'class="btn btn-primary"id="submit" name='submit'>
                
        </form>
       
        <form action="<?= site_url('Patient_Controller/loadRecord') ?>">
              <input type='submit'class="btn btn-primary"onclick="ClearFields() "id="submit-buttons" name='submit' value="Clear">
        </form>
        <br/>

        <!-- Patients list List -->
       <div class="container" style="margin-top:30px">
            
                        <table class="table table-striped">
            <tr>

                <th>Name</th>
                <th>Surname</th>
                <th>Birth Date</th>
                <th>CNP</th>
                <th>Edit patient</th>
            </tr>
            <?php
            $sno = $row+1;
            foreach ($result as $data) {

                echo '<tr>
                       
                        <td>' . $data['first_name'] . '</td>
                        <td>' . $data['last_name'] . '</td>
                        <td>' . $data['birth_date'] . '</td>
                        <td>' . $data['CNP'] . '</td>
                       <td>    <a href="' . site_url() . '/Patient_Controller/editPatient?edit=' . $data['id_patient'] . '">Edit</a></td>
                           
                    </tr>';
                $sno++;
            }
            if (count($result) == 0) {
                echo "<tr>";
                echo "<td colspan='5'>No record found.</td>";
                echo "</tr>";
            }
            ?>
            <?php echo "</tr>"; ?>
            <!-- Paginate -->
        <!-- Paginate -->
        <div  class="page-item">
            <?= $pagination; ?>
        </div>
              </table>
        <br>
             <a href="<?php echo site_url('Patient_Controller/create'); ?>" class="btn btn-primary">Add patient</a>


        

    </body>
</html>