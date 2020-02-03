<?php

include_once 'User.php';
include_once 'job_class.php';

class Company extends User {

    private $name;
    private $alljobslist = [];

   

    public function __construct( $name = null, $address = null, $phone = null, $email = null, $password = null ) {
        parent::__construct( $address, $phone, $email, $password );
        $this->name = $name;

    }
    public function getname() {
        return $this->name;
    }

    public function setname( $name ) {
        $this->name = $name;
    }

    public function createUser( $connection ) {
        $name = $this->name;
        $address = $this->getAddress();
        $phone = $this->getPhone();
        $email = $this->getEmail();
        $password = $this->getPassword();

        $sql = "insert into company values('$name', '$address', '$phone', '$email','$password')";
        
        $result = $connection->exec( $sql );
        return $result;
    }


    public function createJob($connection,$jobtype,$jobdes,$salary,$location){
       
        $jobid = rand(111,999);
        $date = date("Y-m-d h:i:sa");
        $companyemail = $this->getEmail();
   
        $sql = "insert into jobpost values('$jobid','$jobtype','$companyemail','$location','$jobdes','$salary',' $date')";
      
        $result = $connection->exec($sql);
       
        return $result;
    }



     public function getJobs($connection){
        
        $sql = "SELECT * FROM jobpost WHERE companyemail =? ORDER BY date DESC";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->getEmail()]);
        $result = $prepare->fetchAll();
        if(sizeof($result)>0){

            foreach($result as $key=> $post){
            $this->alljobslist[$key] = new Job($post['jobId'],$post['jobName'],$post['companyemail'],$post['location'],$post['JobDes'],$post['Salary'],$post['Date']);
                
            }
        }
        return $this->alljobslist;

    }


    public function findcom($connection){
        $sql = "SELECT * FROM company WHERE Email =? AND Password =?";
        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->getEmail(),$this->getPassword()]);
        $result = $prepare->fetch();
        if($result !=null){
            
              $com = new Company($result['CompanyName'], $result['Address'], $result['Phone'], $result['Email'], '');
              return $com;
        }
        else{
            return null;
        }
        
    }

    public function updateJobpost($connection,$id,$jobname,$joblocation,$jobdes,$salary){

        $joblist = array('jobName'=>$jobname, 'location' =>$joblocation,'JobDes'=>$jobdes,'Salary'=>$salary);
        foreach ( $joblist as $key => $value ) {
            if ( $value != '' ) {
                $sql = 'update jobpost set '.$key.' = "'.$value.'" where jobId = '.$id;
                $result = $connection->exec( $sql );
            
            }
        }

        return $result;

    }

    public function deleteJobpost($connection, $id){
        $sql = "delete from jobpost where jobId = $id";
        $result = $connection->exec($sql);
        return $result;
    }

}

?>