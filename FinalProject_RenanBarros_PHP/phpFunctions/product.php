<?php
 //#Renan(201830362) 26/04/2020 Created
require_once 'database-connection.php';


class product
{
    private $productuuid = "";
    private $prodcode = "";
    private $description = "";
    private $price = "";
    private $cost = "";
    
    
    function __construct($productuuid ='',$prodcode = '',$description = '',$price = '', $cost = ''){
        
        if($productuuid!=""){
            $this->productuuid = $productuuid;
            $this->prodcode = $prodcode;
            $this->description = $description;
            $this->price = $price;
            $this->cost = $cost;
            
            
        }  
    } //end of the constructor
    
     public function getProductuuid(){
            return $this->productuuid;
        }
        
     public function getProdcode(){
         return $this->prodcode;
     }
     
     public function setProdcode($prodcode){
         $this->prodcode = $prodcode;
     }
    
     public function getDescription(){
         return $this->description;
     }
     
     public function setDescription($description){
         $this->description = $description;
     }
     
     public function getPrice(){
         return $this->price;
     }
     
     public function setPrice($price){
         $this->price = $price;
     }
     
     public function getCost(){
         return $this->cost;
     }
     
     public function setCost($cost){
         $this->cost = $cost;
     }
     
          
     public function load(){
         global $connection;
         $sql = "CALL products_select()";
         $products  = $connection->prepare($sql);
         $products->execute();
         
         while($row = $products->fetch()){
           if($row["productuuid"]== $this->productuuid){
               $this->setProdcode($row["prodcode"]);
               $this->setDescription($row["description"]);
               $this->setPrice($row["price"]);
               $this->setCost($row["cost"]);
               
            }
       }
       
     }
     
     public function save(){
         global $connection;
         if($this->productuuid == ""){
         $sql = "CALL products_insert(:prodcode, :description, :price, :cost)";
         $products  = $connection->prepare($sql);
         $products->bindValue(":prodcode", $this->prodcode);
         $products->bindValue(":description", $this->description);
         $products->bindValue(":price", $this->price);
         $products->bindValue(":cost", $this->cost);
                  
         $products->execute();
         
         }
         else{
              $sql = "CALL products_update(:productuuid, :prodcode, :description, :price, :cost)";
              $products  = $connection->prepare($sql);
              $products->bindValue(":productuuid", $this->productuuid);
              $products->bindValue(":prodcode", $this->prodcode);
              $products->bindValue(":description", $this->description);
              $products->bindValue(":price", $this->price);
              $products->bindValue(":cost", $this->cost);
              
              $products->execute();
         }
         
     }
     
     public function delete(){
         global $connection;
          $sql = "CALL products_delete(:productuuid)";
         $products  = $connection->prepare($sql);
         $products->bindValue(":productuuid", $this->productuuid);
                  
         $products->execute();
     }
     
}
