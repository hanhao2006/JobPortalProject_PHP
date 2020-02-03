<?php

include 'JobSeeker.php';

class User {
    // Properties

    private $address;
    private $phone;
    private $email;
    private $password;

    public function __construct($address, $phone, $email, $password) {
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = md5($password);

    }

    /**
    * @return mixed
    */

    public function getAddress()
 {
        return $this->address;
    }

    /**
    * @return mixed
    */

    public function getPhone()
 {
        return $this->phone;
    }

    /**
    * @return mixed
    */

    public function getEmail()
 {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    /**
    * @param mixed $address
    */

    public function setAddress( $address )
 {
        $this->address = $address;
    }

    /**
    * @param mixed $phone
    */

    public function setPhone( $phone )
 {
        $this->phone = $phone;
    }

    /**
    * @param mixed $email
    */

    public function setEmail( $email )
 {
        $this->email = $email;
    }

    public function setPasssword( $password ) {
        $this->password = $password;
    }

    public function __toString(){
        return $this->getEmail();
    }




}
?>