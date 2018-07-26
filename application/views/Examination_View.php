<html>

    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <p>Search patient</p>
        <form action="<?= site_url('Examination_Controller/index'); ?>" method="POST"  id="dropdown">
            <select name="dropdown" id =" dropdown" onchange="myFunction(this)">
                <option value="name">Name</option>
                <option value="surname">Surname</option>
                <option value="cnp">CNP</option>   </select>
            <script>
                function myFunction(selectObject) {
                    var dropdown = selectObject.value;
                    document.getElementById('dropdown').value = dropdown;
                    document.getElementById(dropdown');
                }
            </script>
            <input type='text'  name='search' value=''><input type='submit' name='submit' value='Search'>
        </form>
        <br/>



