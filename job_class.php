<?php

class Job
{
    private $jobid;
    private $jobname;
    private $companyemail;
    private $location;
    private $jobdes;
    private $salary;
    private $date;

    public function __construct($jobid = null, $jobname = null, $companyemail = null, $location = null, $jobdes = null, $salary = null, $date = null)
    {
        $this->jobid = $jobid;
        $this->jobname = $jobname;
        $this->companyemail = $companyemail;
        $this->location = $location;
        $this->jobdes = $jobdes;
        $this->salary = $salary;
        $this->date = $date;
    }

    /**
     * Get the value of jobid
     */
    public function getJobid()
    {
        return $this->jobid;
    }

    /**
     * Get the value of location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the value of jobname
     */
    public function getJobname()
    {
        return $this->jobname;
    }

    /**
     * Get the value of companyemail
     */
    public function getCompanyemail()
    {
        return $this->companyemail;
    }

    /**
     * Get the value of jobdes
     */
    public function getJobdes()
    {
        return $this->jobdes;
    }

    /**
     * Get the value of salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Set the value of jobname
     *
     * @return  self
     */
    public function setJobname($jobname)
    {
        $this->jobname = $jobname;

        return $this;
    }

    /**
     * Set the value of salary
     *
     * @return  self
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    public function setJobid($jobid)
    {
        $this->jobid = $jobid;

        return $this;
    }
    public function setJobdes($jobdes)
    {
        $this->jobdes = $jobdes;

        return $this;
    }

    // public function getJobs($connection){
    //     $counter = 0;
    //     $list = [];
    //     $sql = "SELECT * FROM jobpost ORDER BY date DESC";
    //     foreach ( $connection->query( $sql ) as $row ) {
    //         $obj =  new Book();
    //         $obj->setJobid( $row['jobId'] );
    //         $obj->setJobname( $row['jobName'] );
    //         $obj->setJobdes( $row['location'] );
    //         $obj->setAuthor( $row['location'] );
    //         $obj->setPrice( $row['JobDes'] );
    //         $obj->setEdition( $row['Salary'] );
    //         $obj->setDesc( $row['Date'] );
    //         $list[$counter++] = $obj;
    //     }
    //     return $list;
        
    //     $sql = "SELECT * FROM jobpost ORDER BY date DESC";

    //     foreach($connection->query($sql) as $key =>$oneRow){
    //         $this->alljobs[$key] = new Job($oneRow['jobId'],$oneRow['jobName'],$oneRow['companyemail'],$oneRow['location'],$oneRow['JobDes'],$oneRow['Salary'],$oneRow['Date']);
    //     }
        
    //     return $this->alljobs;

    // }



}
