<h3>Patients  List</h3>
<table border='1' width='30%' style='border-collapse: collapse;'>
    <tr>

        <th>Name</th>
        <th>Surname</th>
        <th>Birth date</th>
        <th>CNP</th>
        <th>County</th>
        <th>City</th>
        <th>Adress</th>
        <th>Examination</th>

    </tr>
    <?php
    $sno = 1;
    foreach ($result as $data) {
        echo '<tr>
                       
                        <td>' . $data['first_name'] . '</td>
                        <td>' . $data['last_name'] . '</td>
                        <td>' . $data['birth_date'] . '</td>
                        <td>' . $data['CNP'] . '</td>
                        <td>' . $data['id_county'] . '</td>
                        <td>' . $data['id_city'] . '</td>
                        <td>' . $data['address'] . '</td>
                        <td>    <a href="' . site_url() . '/Examination_Controller/examinatePatient?edit=' . $data['id_patient'] . '">Examinate</a></td>
                    </tr>';
        $sno++;
    }
    

