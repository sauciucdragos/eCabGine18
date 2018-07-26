<!doctype html>
<html>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script type='text/javascript'>
            // baseURL variable
            var baseURL = "<?php echo base_url(); ?>";

            $(document).ready(function () {

                // City change
                $('#sel_county').change(function () {
                    var id_county = $(this).val();

                    // AJAX request
                    $.ajax({
                        url: '<?= base_url() ?>index.php/Patient_Controller/getCity',
                        method: 'post',
                        data: {id_county: id_county},
                        dataType: 'json',
                        success: function (response) {

                            // Remove options 

                            $('#sel_city').find('option').not(':first').remove();

                            // Add options
                            $.each(response, function (index, data_city) {
                                $('#sel_city').append('<option value="' + data_city['id_city'] + '">' + data_city['city'] + '</option>');
                            });

                        }

                    });
                });



            });
        </script>
        
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
                        <td><select name="sel_county" id="sel_county">
                                <option>-- Select county --</option>
                                <?php
                                foreach ($counties as $county) {
                                    $selected = '';
                                    if ((int) $response[0]['id_county'] === (int) $county['id_county']) {
                                        $selected = 'SELECTED';
                                    }
                                    echo "<option $selected value='" . $county['id_county'] . "'>" . $county['county'] . "</option>";
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>City</td>

                        <td><select name="sel_city" id="sel_city">
                                <option>-- Select city --</option>
                                <?php
                                foreach ($cities as $city) {
                                    $selected = '';
                                    if ((int) $response[0]['id_city'] === (int) $city['id_city']) {
                                        $selected = 'SELECTED';
                                    }
                                    echo "<option $selected value='" . $city['id_city'] . "'>" . $city['city'] . "</option>";
                                }
                                ?>
                            </select></td>
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
        
        ?>

    </body> 
</html>
