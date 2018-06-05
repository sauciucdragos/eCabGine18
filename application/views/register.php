<?php

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <title>Register page</title>
     <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
     
    <div class="col-lg-5 col-lg-offset-2">
        <h1>Register Page:</h1>
	<?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
	<?php } ?>
	<?php if (isset($validation_errors)) { ?>
		<div class="alert alert-danger"><?php echo $validation_errors; ?>  </div>   
	<?php } ?>
    <form action="" method="POST">
        
        <div class="form-group">
            <label for="user" >User:</label>
            <input class="form-control" name="user" id="user" type="text">
        </div>
        
        <div class="form-group">
            <label for="first_name" >First name:</label>
            <input class="form-control" name="first_name" id="first_name" type="text">
        </div>
        
        <div class="form-group">
            <label for="last_name" >Last name:</label>
            <input class="form-control" name="last_name" id="last_name" type="text">
        </div>
        
        
        <div class="form-group">
            <label for="password" >Password:</label>
            <input class="form-control" name="password" id="password" type="password">
        </div>
        
        <div class="form-group">
            <label for="password" >Confirm password:</label>
            <input class="form-control" name="confirm_password" id="confirm_password" type="password">
        </div>
        
        <div>
            <button class="btn btn-primary" name="register">Save</button>
        </div>
        
        
         
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    
  </body>
</html>

