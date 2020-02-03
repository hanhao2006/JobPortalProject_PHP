<?php
include_once 'dbconfig.php';
include_once 'User.php';
include_once 'JobSeeker.php';
include_once 'Company.php';
include_once 'job_class.php';
include_once 'Functions.php';

try {
    //code...
    $connection = new PDO( "mysql:host=$host;dbname=$dbname", $username, $password );
    
    if (isset($_GET['sub'])) {
        createJob($connection);
        $obj = new Company();

    }
    if(isset($_GET['delete'])){
        
        deleteJobPost($connection);
    }
   
    // if(isset($_GET['update'])){

    //     $id = $_GET['update'];
    //     $jobname = $_GET['jobtype'];
    //     $joblocation = $_GET['location'];
    //     $jobdes = $_GET['jobdes'];
    //     $salary = $_GET['salary'];
    //     $obj = new Company();
    //     $res = $obj->updateJobpost($connection,$id, $jobname,$joblocation,$jobdes,$salary);
    // }

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
    <link rel="stylesheet" href="./css/postjob.css">
    <title>Company Page</title>
</head>
    <?php $com=$_SESSION['user'] ?>
<body>
    <header>
        <img src="./img/Logo.jpg" alt="Not Found" id ="logo">
        <h2 id ="title">Welcom <?php echo $com->getname()?></h2>
        <a id="logout" href="logout.php">LogOut</a>
    </header>
   <div id="main_title">
        <h3>Post Job</h3>
    </div>
    <div class="grid">
        <div class="post_job">
            <form action="" method="get">
                    <table>
                        <!-- <tr>
                            <td>Job ID</td>
                            <td><input type="text" name="jobid"></td>
                        </tr> -->
                        <tr>
                            
                            <td>Job Type</td>
                            <td><input type="text" name="jobtype"></td>
                        </tr>
                        <tr>
                            <td>Locatioin</td>
                            <td><input type="text" name="location"></td>
                        </tr>
                        <tr>
                            <td>Salary</td>
                            <td><input type="text" name="salary"></td>
                        </tr>
                        <tr>
                            <td>Job decsption</td>
                            <td><textarea name="jobdes" cols="30" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td><button type="submit" name="sub" >Create Job</button></td>
                
                           
                           
                        </tr>
                    </table>
            </form>
        </div>
    </div>
<h1>Posts Job</h1>
<div class="posts">
<?php 
    $connection = new PDO( "mysql:host=$host;dbname=$dbname", $username, $password );
   
    $user = $_SESSION['user'];
    $postss = $user->getEmail();
    $tempuser = new Company();
    $tempuser->setEmail($postss);
    $allposts = $tempuser->getJobs($connection);
   
     foreach($allposts as $post): 
        $id = $post->getJobid();
        $name = $post->getJobname();
        $location = $post->getLocation();
        $jobDesc = $post->getJobdes();
        $salary = $post->getSalary();
        $date = $post->getDate();
      
        
    ?>
        <div class="post">
            <form action="#" method ="get">
                <label class="post_text">Job ID:</label><?php echo $id?><br>
                <label class="post_text">Job Name : </label><?php echo $name?><br>
                <label class="post_text">Job Location: </label><?php echo $location ?><br>
                <label class="post_text">About Job:</label> <?php echo $jobDesc ?><br>
                <label class="post_text">Salary: </label><?php echo $salary ?><br>
                <label class="post_text">Post Date: </label><?php echo $date?><br>
                <button type="submit" name = 'delete' value= "<?php echo $id ?>">Delete</button>  
                <button type="submit" name = 'update' value= "<?php echo $id ?>" > Update</button>
            
            </form>
        </div>
    <?php endforeach ?>
</div>
</body>
</html>
