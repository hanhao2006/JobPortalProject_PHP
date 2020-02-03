<?php
include_once 'dbconfig.php';
include_once 'User.php';
include_once 'JobSeeker.php';
include_once 'Company.php';
include_once 'Functions.php';

try{
    $connection = new PDO( "mysql:host=$host;dbname=$dbname", $username, $password );
    if(isset($_POST['loginu'])){
       
        loginUser($connection);
    }

    if(isset($_POST['loginc'])){
       
        loginCom($connection);
    }
}
catch (Exception $exception) {
    
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
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
</head>


<body>

    <header>
        <a href="index.php"><img src="./img/Logo.jpg" alt="Not Found" id ="logo"></a>
        <h2 id ="title">Job Portal</h2>
        <a href="index.php"><img src="./img/Logo.jpg" alt="Not Found" id ="logo1"></a>
    </header>
    <div id="main">
    <div class ="select">
        <h3>Select Your</h3>
        <select class='selectbtn'>
            <option value="1">User</option>
            <option value="2">Company</option>
        </select>
    </div>
    <div class="info">
        <form action="" method = "POST">
            <table>
                    <tr>
                        <td>&nbsp&nbsp</td>
                        <td>&nbsp&nbsp</td>
                    </tr>
                    <tr>
                        <td class="font_option" >User Email</td>
                        <td><input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <td>&nbsp&nbsp</td>
                        <td>&nbsp&nbsp</td>
                    </tr>
                    <tr>
                        <td class="font_option">Password</td>
                        <td><input type="password" name="psw"></td>
                    </tr>
                    <tr>
                        <td>&nbsp&nbsp</td>
                        <td>&nbsp&nbsp</td>
                    </tr>
                    <tr>
                        <td>
                        <!-- <button type="submit" class="user" name='loginu' class="btn">Go</button>
                        <button type="submit" class="com" name='loginc' class="btn">Go</button> -->
                        
                        </td>
                    </tr>
            </table>
            <button name='loginu'  class="user btn_1" > <img src="./img/login.png" class="btn"></button>
            <button name='loginc' class="com btn_1"> <img src="./img/login.png" class="btn"></button>
        </form> 
    </div>
</div> 


</body>
<script>

console.log('hello');
let select = document.querySelector('.selectbtn');
let user = document.querySelector('.user');
let com = document.querySelector('.com');
const selectChange = () => {
    let option = select.options[select.selectedIndex].innerText; 
    if (option === 'User') {
            user.style.display = 'block'
            com.style.display = 'none'
    }else{
            user.style.display = 'none'
            com.style.display = 'block'
    }
}

selectChange();

select.onchange = selectChange;
</script>
</html>