<?php
 //#Renan(201830362) 26/04/2020 Created
require_once 'database-connection.php';


class purchase
{
    private $purchaseuuid = "";
    private $customeruuid = "";
    private $productuuid = "";
    private $quantity = "";
    private $price = "";
    private $subtotal = "";
    private $taxes = "";
    private $grandtotal = "";
    private $comments = "";
   
    
    
    function __construct($purchaseuuid ='',$customeruuid = '',$productuuid = '',$quantity = '', $price = '',$subtotal = '', $taxes = '', $grandtotal='',$comments=''){
        
        if($purchaseuuid!=""){
            $this->purchaseuuid = $purchaseuuid;    
            $this->customeruuid = $customeruuid;
            $this->productuuid = $productuuid;
            $this->quantity = $quantity;
            $this->price = $price;
            $this->subtotal = $subtotal;
            $this->taxes = $taxes;
            $this->grandtotal = $grandtotal;
            $this->comments = $comments;
            
            
            
        }  
    } //end of the constructor
    
     public function getPurchaseuuid(){
            return $this->purchaseuuid;
        }
        
     public function getCustomeruuid(){
         return $this->customeruuid;
     }
     
     public function setCustomeruuid($customeruuid){
         $this->customeruuid = $customeruuid;
     }
    
     public function getProductuuid(){
         return $this->productuuid;
     }
     
     public function setProductuuid($productuuid){
         $this->productuuid = $productuuid;
     }
     
     public function getQuantity(){
         return $this->quantity;
     }
     
     public function setQuantity($quantity){
         $this->quantity = $quantity;
     }
     
     public function getPrice(){
         return $this->price;
     }
     
     public function setPrice($price){
         $this->price = $price;
     }
    
     public function getSubtotal(){
         return $this->subtotal;
     }
     
     public function setSubtotal($subtotal){
         $this->subtotal = $subtotal;
     }
     
     public function getTaxes(){
         return $this->taxes;
     }
     
     public function setTaxes($taxes){
         $this->taxes = $taxes;
     }
     
     public function getGrandtotal(){
         return $this->grandtotal;
     }
     
     public function setGrandtotal($grandtotal){
         $this->grandtotal = $grandtotal;
     }
     
     public function getComments(){
         return $this->comments;
     }
     
     public function setComments($comments){
         $this->comments = $comments;
     }
     
          
     public function load(){
         global $connection;
         $sql = "CALL purchases_select()";
         $purchases = $connection->prepare($sql);
         $purchases->execute();
         
         while($row = $purchases->fetch()){
           if($row["purchaseuuid"]== $this->purchaseuuid){
               $this->setCustomeruuid($row["customeruuid_fk"]);
               $this->setProductuuid($row["productuuid_fk"]);
               $this->setQuantity($row["quantity"]);
               $this->setPrice($row["price"]);
               $this->setSubtotal($row["subtotal"]);
               $this->setTaxes($row["taxes"]);
               $this->setGrandtotal($row["grandtotal"]);
               $this->setComments($row["comments"]);
                              
            }
       }
       
     }
     
     public function save(){
         global $connection;
         if($this->purchaseuuid == ""){
            $sql = "CALL purchases_insert(:customeruuid, :productuuid, :quantity, :price, :subtotal, :taxes, :grandtotal ,:comments)";
            $purchases  = $connection->prepare($sql);
            $purchases->bindValue(":customeruuid", $this->customeruuid);
            $purchases->bindValue(":productuuid", $this->productuuid);
            $purchases->bindValue(":quantity", $this->quantity);
            $purchases->bindValue(":price", $this->price);
            $purchases->bindValue(":subtotal", $this->subtotal);
            $purchases->bindValue(":taxes", $this->taxes);
            $purchases->bindValue(":grandtotal", $this->grandtotal);
            $purchases->bindValue(":comments", $this->comments);


            $purchases->execute();
         
         }
         else{
              $sql = "CALL products_update(:purchaseuuid, :customeruuid, :productuuid, :quantity, :price, :subtotal, :taxes, :grandtotal ,:comments)";
              $purchases  = $connection->prepare($sql);
              $purchases->bindValue(":purchaseuuid", $this->purchaseuuid);
              $purchases->bindValue(":customeruuid", $this->customeruuid);
              $purchases->bindValue(":productuuid", $this->productuuid);
              $purchases->bindValue(":quantity", $this->quantity);
              $purchases->bindValue(":price", $this->price);
              $purchases->bindValue(":subtotal", $this->subtotal);
              $purchases->bindValue(":taxes", $this->taxes);
              $purchases->bindValue(":grandtotal", $this->grandtotal);
              $purchases->bindValue(":comments", $this->comments);
                                                         
              $purchases->execute();
         }
         
     }
     
     public function delete(){
         global $connection;
         $sql = "CALL purchases_delete(:purchaseuuid)";
         $purchases  = $connection->prepare($sql);
         $purchases->bindValue(":purchaseuuid", $this->purchaseuuid);
                  
         $purchases->execute();
     }
     
}
