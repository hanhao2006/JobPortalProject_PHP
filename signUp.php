
<?php

include_once 'dbconfig.php';
include_once 'User.php';
include_once 'JobSeeker.php';
include_once 'Company.php';
include_once 'Functions.php';
try {
   
    $connection = new PDO( "mysql:host=$host;dbname=$dbname", $username, $password );
    
    if (isset($_GET['signUpU'])) {
   
        signUpU($connection);      
    }
    if(isset($_GET['signUpC'])){

        signUpC($connection);
       
    }
}  catch (Exception $exception) {
    
    $error = $connection.Error[2];
    echo $error;
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Portal</title>
    <script defer src="index.js"></script>
    <link rel="stylesheet" href="./css/signup.css">
</head>

<body>
<header>
        <a href="index.php"><img src="./img/Logo.jpg" alt="Not Found" id ="logo"></a>
        <h2 id ="title">Job Portal</h2>
        <a href="index.php"><img src="./img/Logo.jpg" alt="Not Found" id ="logo1"></a>
</header>
<div class="main">
    <div class="signup_company">
        <h1>Company Sign up</h1>
        <form action="#" method="get">
            <table>
                <tr>
                    <td class="company">Company Name</td>
                    <td class="company"><input type="text" name="cname"></td>
                </tr>
                
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="addressc"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phonec"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="eamil" name="emailc"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="passwordc"></td>
                </tr>
                <tr>                   
                    <td>Confirm Password</td>
                    <td><input type="password" name="repasswordc"></td>
                </tr>
                <tr>
                    <td>&nbsp&nbsp&nbsp</td>
                    <td>&nbsp&nbsp&nbsp</td>
                </tr>
                <tr>
                    <!-- <td><button class ='company btn' type="submit" name='signUpC'>Submit</button></td> -->
                    <td><button name='signUpC'> <img src="./img/signup.png" class="btn"></button>
                    
                </tr>
             
            </table>
        </form>
    </div>

    <div class="signup_user">
        <h1>User Sign up</h1>
        <form action="#" method="get">
            <table>
                <tr>
                    <td class="user">First Name</td>
                    <td class="user"><input type="text" name="fname"></td>
                </tr>
                <tr>
                    <td class="user">Last Name</td>
                    <td class="user"><input type="text" name="lname" id=""></td>
                </tr>           
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" id=""></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" id=""></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" id=""></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" id=""></td>
                </tr>
                <tr>                   
                    <td>Confirm Password</td>
                    <td><input type="password" name="repassword" id=""></td>
                </tr>
                <tr>
                   <!-- <td><button class ='user btn' type="submit" name='signUpU'>Submit</button></td> -->
                   <td><button name='signUpU'> <img src="./img/signup.png" class="btn"></button>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>