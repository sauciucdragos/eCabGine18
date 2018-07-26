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
                            $.each(response, function (index, data) {
                                $('#sel_city').append('<option value="' + data['id_city'] + '">' + data['city'] + '</option>');
                            });

                        }

                    });
                });



            });
        </script>

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
                    <!-- City -->

                <tr>
                    <td>County</td>
                    <td>
                        <select name="sel_county" id="sel_county">
                            <option>-- Select county --</option>
                            <?php
                            foreach ($counties as $city) {
                                echo "<option value='" . $city['id_county'] . "'>" . $city['county'] . "</option>";
                            }
                            ?>
                        </select>

                    </td>
                </tr>

                <!-- Department -->
                <tr>
                    <td>City</td>
                    <td>
                        <select id='sel_city' name="sel_city">
                            <option>-- Select city --</option>
                        </select>
                    </td>
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
<body>