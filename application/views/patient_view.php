<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
}
            * {box-sizing: border-box;}

            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }

            .topnav {
                overflow: hidden;
                background-color: #e9e9e9;
            }



            .topnav input[type=text] {
                float: right;
                padding: 6px;
                margin-top: 8px;
                margin-right: 16px;
                border: none;
                font-size: 17px;
            }
            .topnav select {
                float: right;
                padding: 6px;
                margin-top: 8px;
                margin-right: 16px;
                border: none;
                font-size: 17px;
            }

            @media screen and (max-width: 600px) {
                .topnav select, .topnav input[type=text] {
                    float: none;
                    display: block;
                    text-align: left;
                    width: 100%;
                    margin: 0;
                    padding: 14px;
                }
                .topnav input[type=text] {
                    border: 1px solid #ccc;  
                }
            }
        </style>
    </head>
    <body>

        <div class="topnav">




            <form action="/action_page.php">
                <select name="search">
                    <option value="name">Name</option>
                    <option value="surname">Surname</option>
                    <option value="cnp">CNP</option>
                    <option value="id">Pacient's ID</option>
                </select>


            </form>
            <input type="text" placeholder="Search..">
        </div>

        <div style="padding-left:16px">
            <h3>Pacients</h3>
<table style="width:80%">
  <tr>
    <th>Name</th>
    <th>Surname</th> 
    <th>Birth date</th>
      <th>County</th>
    <th>City</th> 
    <th>Adress</th>
     <th>Occupation</th>
    <th>Job</th> 
    <th>Phone</th>
    <th>Email</th> 
    <th>CNP</th>
      <th>Marital status</th>
  </tr>

</table>

        </div>
        <br>
<button type="button">Edit</button>
<button type="button">Add</button>
<button type="button">Save</button>
<button type="button">Consult</button>
<button type="button">Cancel</button>
    </body>
</html>