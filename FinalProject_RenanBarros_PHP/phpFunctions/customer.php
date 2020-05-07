<?php
 //#Renan(201830362) 26/04/2020 Created
require_once 'database-connection.php';


class customer
{
    private $customeruuid = "";
    private $firstname = "";
    private $lastname = "";
    private $address = "";
    private $city = "";
    private $province = "";
    private $postalcode = "";
    private $username = "";
    private $password = "";
    
    function __construct($customeruuid ='',$firstname = '',$lastname = '',$address = '', $city = '',$province = '',$postalcode = '',$username = '', $password = ''){
        
        if($customeruuid!=""){
            $this->customeruuid = $customeruuid;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->address = $address;
            $this->city = $city;
            $this->province = $province;
            $this->postalcode = $postalcode;
            $this->username = $username;
            $this->password = $password;
            
        }  
    } //end of the constructor
    
     public function getCustomeruuid(){
            return $this->customeruuid;
        }
        
     public function getFirstname(){
         return $this->firstname;
     }
     
     public function setFirstname($firstname){
         $this->firstname = $firstname;
     }
    
     public function getLastname(){
         return $this->lastname;
     }
     
     public function setLastname($lastname){
         $this->lastname = $lastname;
     }
     
     public function getAddress(){
         return $this->address;
     }
     
     public function setAddress($address){
         $this->address = $address;
     }
     
     public function getCity(){
         return $this->city;
     }
     
     public function setCity($city){
         $this->city = $city;
     }
     
     public function getProvince(){
         return $this->province;
     }
     
     public function setProvince($province){
         $this->province = $province;
     }
     
     public function getPostalcode(){
         return $this->postalcode;
     }
     
     public function setPostalcode($postalcode){
         $this->postalcode = $postalcode;
     }
     
     public function getUsername(){
         return $this->username;
     }
     
     public function setUsername($username){
         $this->username = $username;
     }
     
     public function getPassword(){
         return $this->password;
     }
     
     public function setPassword($password){
         $this->password = $password;
     }
     
     public function load(){
         global $connection;
         $sql = "CALL customers_select()";
         $customers  = $connection->prepare($sql);
         $customers->execute();
         
         while($row = $customers->fetch()){
           if($row["customeruuid"]== $this->customeruuid){
               $this->setFirstname($row["firstname"]);
               $this->setLastname($row["lastname"]);
               $this->setAddress($row["address"]);
               $this->setCity($row["city"]);
               $this->setProvince($row["province"]);
               $this->setPostalcode($row["postalcode"]);
               $this->setUsername($row["username"]);
               $this->setPassword($row["passwordenc"]);
            }
       }
       
     }
     
     public function save(){
         global $connection;
         if($this->customeruuid == ""){
         $sql = "CALL customers_insert(:firstname, :lastname, :address, :city, :province, :postalcode, :username, PASSWORD(:password))";
         $customers  = $connection->prepare($sql);
         $customers->bindValue(":firstname", $this->firstname);
         $customers->bindValue(":lastname", $this->lastname);
         $customers->bindValue(":address", $this->address);
         $customers->bindValue(":city", $this->city);
         $customers->bindValue(":province", $this->province);
         $customers->bindValue(":postalcode", $this->postalcode);
         $customers->bindValue(":username", $this->username);
         $customers->bindValue(":password", $this->password);
         
         $customers->execute();
         
         }
         else{
              $sql = "CALL customers_update(:customeruuid, :firstname, :lastname, :address, :city, :province, :postalcode, :username, PASSWORD(:password))";
              $customers  = $connection->prepare($sql);
              $customers->bindValue(":customeruuid", $this->customeruuid);
              $customers->bindValue(":firstname", $this->firstname);
              $customers->bindValue(":lastname", $this->lastname);
              $customers->bindValue(":address", $this->address);
              $customers->bindValue(":city", $this->city);
              $customers->bindValue(":province", $this->province);
              $customers->bindValue(":postalcode", $this->postalcode);
              $customers->bindValue(":username", $this->username);
              $customers->bindValue(":password", $this->password);
              
              $customers->execute();
         }
         
     }
     
     public function delete(){
         global $connection;
          $sql = "CALL customers_delete(:customeruuid)";
         $customers  = $connection->prepare($sql);
         $customers->bindValue(":customeruuid", $this->customeruuid);
                  
         $customers->execute();
     }
     
}