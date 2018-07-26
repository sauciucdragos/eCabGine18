<h1>Medical Examination</h1>
<form method='post' action=''>
    <table >
        <tr>
            <td>Name</td>
            <td><input type='text' name='first_name' readonly value='<?php echo $demo[0]['first_name']; ?>' ></td>
        </tr>
        <tr>
            <td>Surname</td>
            <td><input type='text' name='last_name'readonly  value='<?php echo $demo[0]['last_name']; ?>'></td>
        </tr> 
        <tr>

            <td>County</td>
            <td><select name="sel_county" id="sel_county">

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
            <td><input type='text' name='address' value='<?php echo $demo[0]['address']; ?>' ></td>
        </tr>
        <td>Last Period</td>
        <td><input type='text' name='period' value='<?php echo $medical[0]['last_period']; ?>' ></td>
        </tr>
        <td>Deliverance</td>
        <td><input type='text' name='period' value='<?php echo $medical[0]['deliverance']; ?>' ></td>
        </tr>
        <td>Abortions</td>
        <td><input type='text' name='period' value='<?php echo $medical[0]['abortions']; ?>' ></td>
        </tr>
        <td>Medical History</td>
        <td><input type='textarea rows="4"' name='period' value='<?php echo $medical[0]['individual_medical_history']; ?>' ></td>
        </tr>
        <td>Reasons for examination</td>
        <td><input type='text' name='reason'  ></td>
        </tr>
        <td>Observations</td>
        <td><input type='text' name='observation'  ></td>
        </tr>
        <td>Diagnosis</td>
        <td><input type='text' name='diagnosis'  ></td>
        </tr>
        <td>Medical advice</td>
        <td><input type='text' name='medical'  ></td>
        </tr>
        </tr>
        <td>Prescription</td>
        <td><input type='text' name='prescription'  ></td>
        </tr>
        <tr>
            <td>Investigations</td>
        </tr>
        <tr><td>Medical Exam</td>
            <td><input type="checkbox" name="businessType[]" value="1"></td>
        <tr>
             <tr><td>Medical Exam</td>
            <td><input type="checkbox" name="businessType[]" value="1"></td>
        <tr>

            <td><input type='submit' name='submit' value='Save Examination'></td> 
            <td><input type='submit' name='submit' value='Print Medical Record'></td> 
        </tr>
        <tr>

         <td><a href ="<?php echo site_url('Examination_Controller/index'); ?>">Return</a> </td>
        </tr>
