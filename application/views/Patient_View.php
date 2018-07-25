<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Patient view</title>

        <style >
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
        <form method='post' action="<?= base_url() ?>index.php/Patient_Controller/loadRecord" >
            <select name="search">
                <option value="name">Name</option>
                <option value="surname">Surname</option>
                <option value="cnp">CNP</option>
               
            </select>
            <input type='text' name='search' value='<?= $search ?>'><input type='submit' name='submit' value='Search'>
        </form>
        <br/>

        <!-- Patients list List -->
        <table border='1' width='60%' style='border-collapse: collapse;'>
            <tr>

                <th>Name</th>
                <th>Surname</th>
                <th>Birth Date</th>
                <th>CNP</th>
                <th>Edit patient</th>
            </tr>
            <?php
            $sno = 1;
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
            ?>



<?php echo "</tr>"; ?>



            <a href="<?php echo site_url('Patient_Controller/create'); ?>">Add Patient</a> 
        </table>

        <!-- Paginate -->
        <div style='margin-top: 10px;'>
<?= $pagination; ?>
        </div>

    </body>
</html>