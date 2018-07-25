
<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
         <!-- <Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" 
          crossorigin="anonymous">
      <title>Add user page</title> 
   </head> 
   <body> 
         <div class="container" style="margin-top:30px">  
         <nav class="navbar navbar-light bg-light navbar-expand-lg fixed-top">
             <a href="#" class="navbar-brand">Add user page</a>
         </nav>
          
             
<?php echo form_open('Admin_controller/add_user'); ?>
  <div class="form-group">
      <div class="form-group">
          <br><br>
    <label for="exampleInputUser name">User name</label>
    <input type="text" name="user" class="form-control" placeholder="Enter User name">
  </div>
    <label for="First name">First name</label>
    <input  type="text" name="first_name" class="form-control" placeholder="Enter First name" value="<?php echo "php code"?>">    
  </div>
  <div class="form-group">
    <label for="exampleInputLast name">Last name</label>
    <input type="text" name="last_name" class="form-control" placeholder="Enter Last name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1"> Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
  </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Add user" />

              </nav><br><br>
              <div class="container" style="margin-top:30px">

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" 
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" 
    crossorigin="anonymous"></script>
    
         
   </body>
</html>

