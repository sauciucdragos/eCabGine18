

<?php echo validation_errors(); ?>
<h1>Add  new patient</h1><hr/>
 <form method='post' action="<?= base_url() ?>index.php/Patient_Controller/create" > 

<?php if (isset($message)) { ?>
    <CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
    <?php } ?>
   
<table>        
    <tr>
        <td><label for="first_name">First name</label></td>
        <td><input type="input" name="first_name" size="50" /></td>
    </tr>
    <tr>
        <td><label for="last_name">Last name</label></td>
        <td><input type="input" name="last_name" size="50" /></td>
    </tr> <tr>
        <td><label for="birth_date">Birth date</label></td>
        <td><input type="date" name="birth_date" size="50" /></td>
    </tr> <tr>
        <td><label for="county">County</label></td>
        <td><input type="input" name="id_county" size="50" /></td>
    </tr> <tr>
        <td><label for="city">City</label></td>
        <td><input type="input" name="id_city" size="50" /></td>
    </tr>
    <tr>
        <td><label for="adress">Adress</label></td>
        <td><input type="input" name="adress" size="50" /></td>
    </tr><tr>
        <td><label for="job">Job</label></td>
        <td><input type="input" name="job" size="50" /></td>
    </tr><tr>
        <td><label for="company">Company</label></td>
        <td><input type="input" name="company" size="50" /></td>
    </tr>
</tr><tr>
    <td><label for="phone_number">Phone number</label></td>
    <td><input type="input" name="phone_number" size="50" /></td>
</tr><tr>
    <td><label for="email">Email</label></td>
    <td><input type="input" name="email" size="50" /></td>
</tr></tr><tr>
    <td><label for="CNP">CNP</label></td>
    <td><input type="input" name="CNP" size="50" /></td>
</tr><tr>
    <td><label for="marital_status">Marital status</label></td>
    <td><input type="input" name="marital_status" size="50" /></td>
</tr>         
<tr>
    <td></td>
    <td><input type="submit" name="submit" value="Add patient" /></td>
</tr>

  <td><a href="<?php echo site_url('Patient_Controller/loadRecord'); ?>">Cancel</a> </td>
</table>


</form>