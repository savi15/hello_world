<?php
include 'header.html';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
           <script src="validations.js"></script>
        <title>form-Validation</title>
        <style>
            .sign{text-align: center;padding:100px;color:black; background-color:#ccffcc; display:none; border:1px solid black;}
            img{position:relative;}
            .login{padding-top:50px;
                background-color:#ccccff; 
                
                border:1px solid black;
                height:240px;
            }
            #image img{
                border:1px solid red;
                height: 100px;
                width: 100px;
            }
        </style>
    </head>
   
    <body>
         <div style="float:left; " >
        <img src="chat.png">
    </div>
     
        <div class="sign">
        <form  action="http://127.0.0.1/projects/?route=account/signup" method="post" >
   <table>
                <tr>
                    <td>First_name</td>
                    <td><input type="text" name="fname" id="fname"></td>
                </tr>
                <tr>
                    <td>Last_name</td>
                    <td><input type="text" name="lname" id="lname"></td>
                </tr>
                <tr>
                    <td>email-id</td>
                    <td><input type="email" name="emailid" id="mail"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="pswd" id="pswd">
                        <img src="index.png" alt="show_paswrd" height="20" width="20" onclick="show()">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="cnfrm_pswd" id="c_pswd">
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" name="gender" value="male" id="male">male
                        <input type="radio" name="gender" value="female" id="female">female
                    </td>
                </tr>
                <tr>
                    <td>hobbies</td>
                    <td>
                        <input type="checkbox" name="hobby" value="sleeping" id="sleeping">sleeping
                        <input type="checkbox" name="hobby" value="reading" id="reading">reading
                        <input type="checkbox" name="hobby" value="eating" id="eating">eating
                        <input type="checkbox" name="hobby" value="playing" id="playing">playing
                    </td>
                </tr>
                <tr>
                    <td>Branch</td>
                    <td>
                        <select name="branch">
                            <option name="branch" value="CSE">CSE</option>
                            <option name="branch" value="ECE" >ECE</option>
                            <option name="branch" value="EE">EE</option>
                            <option name="branch" value="ME">ME</option>
                            <option name="branch" value="IT">IT</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>D.O.B</td>
                    <td>
                        <input type="text" id="dob" name="dob" >
                    </td>
                </tr>

                <tr>
                    <td><button id="submit" name="submit" onclick="return check()">submit</button><td>
                   <td> <input type="button" name="login" id="loginbtn" value="login" onclick="location.href = 'login.php'" style="margin-top:10px; "></td>

                </tr>
            </table>
        </form> </div>
        <!--changes to be checked-->
        <input type="button" name="new" id="new">
    </body>
</html>

 <?php
 include 'footer.html';