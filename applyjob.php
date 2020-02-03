<?php
include_once 'dbconfig.php';
include_once 'User.php';
include_once 'JobSeeker.php';
include_once 'Company.php';
include_once 'job_class.php';
include_once 'Functions.php';

try{
    $connection = new PDO( "mysql:host=$host;dbname=$dbname", $username, $password );
    if(isset($_POST['app'])){
        $jobDetails =  ApplayJobUser($connection);
        $name =  $jobDetails->getJobname();
        $location = $jobDetails ->getLocation();
        $salary = $jobDetails->getSalary();
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
    <title>Document</title>
</head>
<body>
    <div>
        <h1 class="jobName"><?php echo $name?></h1>
        <span><?php echo $location ?></span>
        <span><?php echo $salary ?></span><br/>
      
    </div>
</body>
</html>