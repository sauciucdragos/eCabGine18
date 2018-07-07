<!doctype html>
<html>
    <body>
          <?php
      

        // Edit user
        if(isset($view) )  {
        ?>
        <h1>Edit Patient</h1>
        <form method='post' action=''>
            <table >
                <tr>
                    <td>Name</td>
                    <td><input type='text' name='first_name'  value='<?php echo $response[0]['first_name']; ?>' ></td>
                </tr>
                <tr>
                    <td>Surname</td>
                    <td><input type='text' name='last_name'  value='<?php echo $response[0]['last_name']; ?>'></td>
                </tr>           
                <tr>
                    <td>Birth date</td>
                    <td><input type='date' name='birth_date' value='<?php echo $response[0]['birth_date']; ?>' ></td>
                </tr>
                 <tr>
                    <td>County</td>
                    <td><input type='text' name='id_county'  value='<?php echo $response[0]['id_county']; ?>' ></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type='text' name='id_city'  value='<?php echo $response[0]['id_city']; ?>'></td>
                </tr>           
                <tr>
                    <td>Address</td>
                    <td><input type='text' name='address' value='<?php echo $response[0]['address']; ?>' ></td>
                </tr>
                 <tr>
                    <td>Job</td>
                    <td><input type='text' name='job'  value='<?php echo $response[0]['job']; ?>' ></td>
                </tr>
                <tr>
                    <td>Company</td>
                    <td><input type='text' name='company'  value='<?php echo $response[0]['company']; ?>'></td>
                </tr>           
                <tr>
                    <td>Phone number</td>
                    <td><input type='text' name='phone_number' value='<?php echo $response[0]['phone_number']; ?>' ></td>
                </tr>
                <tr>
                  
                    <td>Email</td>
                    <td><input type='text' name='email' value='<?php echo $response[0]['email']; ?>' ></td>
                </tr>
                <tr>
                    <td>CNP</td>
                    <td><input type='text' name='CNP'  value='<?php echo $response[0]['CNP']; ?>'></td>
                </tr>           
                <tr>
                    <td>Marital status</td>
                    <td><input type='text' name='marital_status' value='<?php echo $response[0]['marital_status']; ?>' ></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type='submit' name='submit' value='Submit'></td> 
                </tr>
                <tr><td><a href="<?php echo site_url('Patient_Controller/loadRecord'); ?>">Cancel</a></td> </tr>
            </table>
        </form>
  <?php
        }
    ?>

    </body> 
</html>
