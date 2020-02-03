<?php 
include_once 'dbconfig.php';
include_once 'User.php';
include_once 'JobSeeker.php';
include_once 'Company.php';
include_once 'job_class.php';
include_once 'Functions.php';


try{
    $connection = new PDO( "mysql:host=$host;dbname=$dbname", $username, $password );
    if(isset($_POST['upload'])){

        updateUserDesc($connection);
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
    <link rel="stylesheet" href="./css/userform.css">
    <title>Welcome</title>
</head>
<?php $user =  $_SESSION['user'] ?>
<body>
    <header>
            <img src="./img/Logo.jpg" alt="Not Found" id ="logo">
            <h2 id ="title">Job Portal</h2>
            <div id="search">
                <label for="">Search</label>
                <input class="search" type="text">
            </div>
            <a id="logout" href="logout.php">LogOut</a>
    </header>

    <div class='grid'>
        <div class="userinfo">
            <form action="#" method = "post">
            <div class="username"><?php echo $user->getFname()." ". $user->getLname()?></div>

            <ul>
                <li><label class="text">Eamil: </label><?php echo $user->getEmail() ?></li>
                <li><label class="text">Phone Number:</label> <?php echo $user->getPhone() ?></li>
                <li><label class="text">Address: </label><?php echo $user->getAddress()?></li>
            </ul>
                <label for="" class="describe">Paste Your Describe</label>
                <textarea name="desc" id="desc" cols="30" rows="10" class="describe"></textarea>
                <button type="submit" name='upload' id="" class="describe">Upload</button>
            </form>
            </div>
            <div class="getjob">
                <?php
            $connection = new PDO( "mysql:host=$host;dbname=$dbname", $username, $password );
            //$user = new JobSeeker();
            $alljobs = $user->getJobs($connection);
            foreach($alljobs as $job):
                //echo $job;
                $name = $job->getJobname();
                $location = $job->getLocation();
                $jobDesc = $job->getJobdes();
                $salary = $job->getSalary();
                $date = $job->getDate();
                $id = $job->getJobid();
            ?>

                <div class="showjob" >
                    <h1 class="jobtype">Job type: <?php echo $name ?></h1>
                    <p class="loction">Address: <?php echo $location ?></p>
                    <p class="jobdes">Job description: <?php  echo $jobDesc ?></p>
                    <span class="salary">Salary: <?php  echo $salary ?></span><br/>
                    <span class="date">Date: <?php  echo $date?></span>
                    <form action="#"method="post" >
                    <button type="submit" id="apply" name="app" value= "<?php echo $id?>" >Apply </button>
                    </form>
                </div>
                
                <?php endforeach ?>
                <?php
                   try{
                    $connection = new PDO( "mysql:host=$host;dbname=$dbname", $username, $password );
                    if(isset($_POST['app'])){
                       
                        InsertJobUser($connection,$user->getEmail());
                        message("Sucessfully apply");
                    }
                
                }
                catch (Exception $exception) {
                    
                    $error = $connection.Error[2];
                    echo $error;
                }
                
                ?>
            </div>
    </div>
            
</body>

<script>
    var arrayJobPosts  = document.querySelectorAll('.showjob');
                let search = document.querySelector('.search');
search.onkeyup = () =>{
    arrayJobPosts.forEach(job => {
            if (!job.innerText.includes(search.value)) {
                job.style.display= 'none'
            }else{
                job.style.display= 'block'

            }
    });
}


</script>
</html>