<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <title>Login page</title>
     <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
     
    <div class="col-lg-5 col-lg-offset-2">
        <h1>Profile Page:</h1>
	<?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
	<?php 
        } ?>
        
        Hi <?php echo $_SESSION['user']; ?>
        
        <br><br>
        
        <a href="<?php echo base_url(); ?>index.php/auth/logout">Logout</a>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    
  </body>
</html>


