<?php
session_start();

function signUpU ($connection )
 {

    try {

        if ( isset( $_GET['fname'] ) && isset( $_GET['lname'] ) && isset( $_GET['phone'] ) && isset( $_GET['address'] ) && isset( $_GET['email'] ) &&  ( isset( $_GET['password'] ) ) && ( isset( $_GET['repassword'] ) ) ) {

            $fname = $_GET['fname'];
            $lname = $_GET['lname'];
            $address = $_GET['address'];
            $phone = $_GET['phone'];
            $email = $_GET['email'];
            $password = $_GET['password'];
            $repassword = $_GET['repassword'];
            if ( $password == $repassword ) {
                
                $user = new JobSeeker($fname, $lname, $address, $phone, $email, $password );
                $res = $user->createUser( $connection );

                if ($res) {  
                $_SESSION['user'] = $user;
                header("Location: ./UserForm.php");
              }
            } else {
                echo 'Password does not match ';
            }
        } else {
            echo 'Fill all the fields ';
        }

    } catch ( Exception $exception ) {

        $error = $connection.Error[2];
        echo $error;

    }

}

function loginUser($connection){
    $email = $_POST['email'];
    $pws = $_POST['psw'];
    $user = new JobSeeker();
    $user->setEmail($email);
    $user->setPasssword(md5($pws));
    $result = $user->findUser($connection);
    //echo $result->getFname();
    if($result !=null){
        $_SESSION['user'] = $result;
        header("Location: ./UserForm.php");

    }
}


function loginCom($connection){
    $email = $_POST['email'];
    $pws = $_POST['psw'];
    $user = new Company();
    $user->setEmail($email);
    $user->setPasssword(md5($pws));
    $res = $user->findcom($connection);
    print_r($res);
    if($res !=null){
        $_SESSION['user'] = $res;
        header("Location: ./postjob.php");
    }
}


function updateUserDesc($connection){
    $userDesc = $_POST['desc'];
    $user = $_SESSION['user'];
    $user->setUserDesc($userDesc);
    $result = $user->UpdateUserDesc($connection);
}



function deleteJobPost($connection)
{
    $com = $_SESSION['user']; 
    $id = $_GET['delete'];
    $result = $com->deleteJobpost($connection,$id);
    if ($result) {
        
        header("Location: ./postjob.php");
    }
}

function ApplayJobUser($connection){   
    $user = $_SESSION['user'];
    $id = $_POST['app'];
    $result = $user->ApplayJob($connection,$id);
    return $result;
}

function InsertJobUser($connection,$email){   
    $user = $_SESSION['user'];
    $id = $_POST['app'];
    $result = $user->insertApplyJob($connection,$id,$email);
    
}

function message($string)
{
    echo "<script> alert('$string') </script>";
}

function createJob($connection){
$com = $_SESSION['user'];
$jobtype = $_GET['jobtype'];
$salary = $_GET['salary'];
$jobdes = $_GET['jobdes'];
$location = $_GET['location'];
$result =  $com->createJob($connection,$jobtype,$jobdes,$salary,$location);
    if ($result) {
        header("Location: ./postjob.php");
    }

}
// function updatejob($connection){
 
//     $com = $_SESSION['user'];
//     $id = $_GET['jobid'];
//     $jobname = $_GET['jobtype'];
//     $joblocation = $_GET['location'];
//     $jobdes = $_GET['jobdes'];
//     $salary = $_GET['salary'];
//     $result = $com->updateJobpost($connection,$id, $jobname,$joblocation,$jobdes,$salary);
    
//     if($result){
//         header("Location: ./postjob.php");
//     }
    
// }

function signUpC( $connection )
 {

    try {

        // echo "You are connected to $dbname database <br/>";

        if ( isset($_GET['cname']) && isset( $_GET['phonec'] ) && isset( $_GET['addressc'] ) && isset( $_GET['emailc'] ) &&  ( isset( $_GET['passwordc'] ) ) && ( isset( $_GET['repasswordc'] ) ) ) {
            
            $namec = $_GET['cname'];
           
            $address = $_GET['addressc'];

            $phone = $_GET['phonec'];

            $email = $_GET['emailc'];

            $password = $_GET['passwordc'];
            $repassword = $_GET['repasswordc'];

            if ( $password == $repassword ) {
              
                $user = new Company($namec, $address, $phone, $email, $password );
                $res =  $user->createUser( $connection );
                echo $user;
                if ($res) {                  
                    $_SESSION['user'] = $user;
                    header("Location: ./postjob.php");               
                }
            } else {
                echo 'Password does not match ';
            }
        } else {
            echo 'Fill all the fields ';
        }

    } catch ( Exception $exception ) {

        $error = $connection.Error[2];
        echo $error;

    }

    

}



?>