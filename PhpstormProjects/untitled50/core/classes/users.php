<?php

class users{
    private $conn;
    private $erorr = array('name'=> '','family' =>'','username'=> '','city' => '','street' => '','email' => '','password' => '');
    private $name;
    private $family;
    private $username;
    private $city;
    private $street;
    private $email;
    private $password;
    private $code;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function setName($name){
        if(!preg_match("/^[א-ת'-]+$/",$name)){

            $this->erorr['name'] = 'שם חייב להיות בעברית';
        }
        else{
            $this->name = $name;
        }
    }
    public function setFamily($family){
        if(!preg_match("/^[א-ת'-]+$/",$family)){

            $this->erorr['family'] = 'שם משפחה חייב להיות בעברית';
        }
        else{
            $this->family = $family;
        }
    }









    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->erorr['email'] = 'מייל לא תקין';
        }
        else {
            $sql = "select * from users WHERE email ='$email'";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $this->erorr['email'] = 'מייל כבר בשימוש';
            }
            else {
                $this->email = $email;
            }
        }
    }
    public function setPassword($password,$password1){
        if($password!=$password1){
            $this->erorr['password'] = 'סיסמא לא תאומת';
        }
        else{
            if(strlen($password)<5||strlen($password1)<5){
                $this->erorr['password'] ='סיסמא חייבת להיות 5 תווים או יותר';
            }
            else {
                $this->password = $password;
            }
        }

    }
    public function setUsername($userName){
        $this->username = $userName;
    }
    public function setCode($code){
        $sql = "select * from users WHERE code ='$code'";
        $result = $this->conn->query($sql);
        if($result->num_rows==0){
            $this->code = $code;
        }
        else{
            $this->setCode(substr(md5(uniqid(mt_rand(), true)) , 0, 8));
        }
    }
    public function setUser($user_type,$name,$family,$username,$email,$passowrd,$code)
    {
        $sql = "INSERT INTO users(user_type,name,family,username,email,password,code,confirm)VALUES (3,'$name','$family','1','$email','$passowrd','$code',2)";
        $this->conn->query($sql);

    }

    public function getName(){
        return $this->name;
    }
    public function getFamily(){
        return  $this->family;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function getError(){
        return $this->erorr;
    }


}
?>