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
      <title>Add recommanded laboratory tests </title> 
   </head> 
   <body> 
         <div class="container" style="margin-top:30px">  
         <nav class="navbar navbar-light bg-light navbar-expand-lg fixed-top">
             <a href="#" class="navbar-brand">Add recommanded tests </a>
             <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="navbar-item">
                   <a href="http://www.google.com" class="btn btn-primary">Medical check-up</a> 
                </li>
                 <li class="navbar-item">
                   <a href="#" class="btn btn-default">Laboratory tests</a> 
                </li>
                <li class="navbar-item">
                   <a href="<?php echo site_url('Admin_controller/user_list');?>" class="btn btn-default">Users list</a> 
                <li class="navbar-item">
                   <a href="#" class="btn btn-default">Practice administration</a> 
                </li>
            </ul>
     </nav><br><br>
         </nav>
           
<?php echo form_open('LaboratoryTests_controller/add_test'); ?>
  <div class="alert-danger"><?php echo validation_errors(); ?></div>
  <br><br>
  
  <div class="form-group"> 
    <label for="exampleInputUser name">Add laboratory tests</label>
    <input type="text" name="laboratory_test" class="form-control" placeholder="Enter laboratory test">
  </div>
  <div class="form-group">
    <label for="Price">Price</label>
    <input  type="text" name="price" class="form-control" placeholder="Enter price of laboratory test in RON">    
  </div>
          
         
    <input type="submit" class="btn btn-primary" name="submit" value="Add laboratory test" />

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