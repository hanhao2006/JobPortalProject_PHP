<?php

include_once 'User.php';
include_once 'job_class.php';

class JobSeeker extends User {

    private $fname;
    private $lname;
    private $alljobs =[];
    private $userDesc;

    /**
    * @return mixed
    */

    public function setUserDesc($userDesc)
    {
        $this->userDesc = $userDesc;

        return $this;
    }

    public function getFname() {
        return $this->fname;
    }

    /**
    * @return mixed
    */

    public function getLname() {
        return $this->lname;
    }

    public function getUserDesc()
    {
        return $this->userDesc;
    }

    /**
    * @param mixed $fname
    */

    public function setFname( $fname ) {
        $this->fname = $fname;
    }

    /**
    * @param mixed $lname
    */

    public function setLname( $lname ) {
        $this->lname = $lname;
    }

    public function __construct( $fname = null, $lname = null, $address = null, $phone = null, $email = null, $password = null ,$userDesc = null ) {
        //echo $address;
        parent::__construct( $address, $phone, $email, $password );
        $this->fname = $fname;
        $this->lname = $lname;
        $this ->userDesc = $userDesc;

    }



    public function createUser( $connection ) {

        $fname = $this->fname;
        $lname = $this->lname;
        $address = $this->getAddress();
        $phone = $this->getPhone();
        $email = $this->getEmail();
        $password = $this->getPassword();

        $sql = "insert into users (FirstName, LastName, Address, Phone, Email, Password) values('$fname', '$lname', '$address', '$phone', '$email', '$password')";
        $result = $connection->exec($sql);
        return $result;
    }


    public function getJobs($connection){
        
        $sql = "SELECT * FROM jobpost ORDER BY date DESC";

        foreach($connection->query($sql) as $key =>$oneRow){
            $this->alljobs[$key] = new Job($oneRow['jobId'],$oneRow['jobName'],$oneRow['companyemail'],$oneRow['location'],$oneRow['JobDes'],$oneRow['Salary'],$oneRow['Date']);
        }
        
        return $this->alljobs;

    }

    public function UpdateUserDesc($connection)
    {
        //echo "hjkl";
        $email = $this->getEmail();
        $sql  = "update users set UserDesc= '$this->userDesc' where Email= '$email'";
        $prepare = $connection->exec($sql);
        return $prepare;
    }


    public function findUser($connection){
        $sql = "SELECT * FROM users WHERE Email =? AND Password =?";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->getEmail(),$this->getPassword()]);
        $result = $prepare->fetch();
        if($result!=null){

              $jobu = new JobSeeker($result['FirstName'], $result['LastName'], $result['Address'], $result['Phone'], $result['Email'], "" );
              return $jobu;
        }
        else{
            return null;
        }
        
    }

    public function ApplayJob($connection,$id){       
        $sql = "SELECT jobName, location, Salary FROM jobpost WHERE jobId =?";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$id]);
        $result = $prepare->fetch();
        $job = new Job();
        if($result !=null){   
            $job->setJobname($result['jobName']);
            $job->setLocation($result['location']);
            $job->setSalary($result['Salary']);

        }
        return $job;
    }

    public function insertApplyJob ($connection,$id,$email)
    {
        $applyDate = date("Y-m-d h:i:sa");
        $sql = "INSERT into appliedjobs values('$id', '$email', '$applyDate')";
        $result = $connection->exec($sql);
        return $result;
        
    }
    
}

?>