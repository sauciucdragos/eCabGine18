<<<<<<< HEAD

<!doctype html>
<html>
    <body>
        <?php if (isset($view) && $view == 2) {
            ?>
            <form method='post' action=''>



                <table>        
                    <tr>
                        <td><label for="first_name">First name</label></td>
                        <td><input type='text' name='first_name'  value='<?php echo $response[0]['first_name']; ?>' ></td>
                    </tr>
                    <tr>
                        <td><label for="last_name">Last name</label></td>
                        <td><input type='text' name='last_name'  value='<?php echo $response[0]['last_name']; ?>'></td>
                    </tr> <tr>
                        <td><label for="birth_date">Birth date</label></td>
                        <td><input type='date' name='birth_date'  value='<?php echo $response[0]['birth_date']; ?>'></td>
                    </tr> <tr>
                        <td><label for="county">County</label></td>
                        <td><input type='text' name='id_county'  value='<?php echo $response[0]['id_county']; ?>'></td>
                    </tr> <tr>
                        <td><label for="city">City</label></td>
                        <td><input type='text' name='id_city'  value='<?php echo $response[0]['id_city']; ?>'></td>
                    </tr>
                    <tr>
                        <td><label for="adress">Address</label></td>
                        <td><input type='text' name='address'  value='<?php echo $response[0]['address']; ?>'></td>
                    </tr><tr>
                        <td><label for="job">Job</label></td>
                        <td><input type='text' name='job'  value='<?php echo $response[0]['job']; ?>'></td>
                    </tr><tr>
                        <td><label for="company">Company</label></td>
                        <td><input type='text' name='company'  value='<?php echo $response[0]['company']; ?>'></td>
                    </tr>
                </tr><tr>
                <td><label for="phone_number">Phone number</label></td>
                <td><input type='text' name='phone_number'  value='<?php echo $response[0]['phone_number']; ?>'></td>
            </tr><tr>
                <td><label for="email">Email</label></td>
                <td><input type='text' name='email'  value='<?php echo $response[0]['email']; ?>'></td>
            </tr></tr><tr>
                <td><label for="CNP">CNP</label></td>
                <td><input type='text' name='CNP'  value='<?php echo $response[0]['CNP']; ?>'></td>
            </tr><tr>
                <td><label for="marital_status">Marital status</label></td>
                <td><input type='text' name='marital_status'  value='<?php echo $response[0]['marital_status']; ?>'></td>
            </tr>         
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Edit patient" /></td>
            </tr>

            <td><a href="<?php echo site_url('Patient_Controller/loadRecord'); ?>">Cancel</a> </td>
        </table>


    </form>   <?php
}
?>
</body>
</html>
=======
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
>>>>>>> origin/task2
