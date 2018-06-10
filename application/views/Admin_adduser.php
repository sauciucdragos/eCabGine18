
<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>Admin page1</title> 
   </head> 
   <body> 
         

<?php echo form_open('/add_user'); ?>
<form>

    <label for="title">Nume</label>
    <input type="input" name="title" /><br />

    <label for="text">Prenume</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />
</form>

<!--
//      <?php 
//            echo "<h1> test </h1>";
//            echo form_open('Admin_controller/add_user');
//            echo form_label('Id No.','id'); 
//            echo form_input(array('id'=>'id_user','user'=>'id_user')); 
//            echo "<br/>"; 
//			
//            echo form_label('User'); 
//            echo form_input(array('id'=>'user','user'=>'user')); 
//            echo "<br/>"; 
//			
//            echo form_submit(array('id'=>'submit','value'=>'Add')); 
//            echo form_close(); 
//         ?> -->
         
   </body>
</html>

