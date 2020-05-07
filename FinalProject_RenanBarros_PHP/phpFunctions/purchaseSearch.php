<?php
 //#Renan(201830362) 26/04/2020 Created
require_once 'database-connection.php';
require_once 'purchase.php';
require_once 'collection.php';

class purchaseSearch extends collection
{
    
    function __construct($customeruuid, $date)
    {
        global $connection;
            
        $sql = 'CALL purchases_filter(:customeruuid, :date)';
        $purchases = $connection->prepare($sql);
        $purchases->bindValue(":customeruuid", $customeruuid);
        $purchases->bindValue(":date", $date);
        $purchases->execute();
        
        while($row = $purchases->fetch(PDO::FETCH_ASSOC))
        {
            $purchase = new purchase($row["purchaseuuid"], $row["customeruuid_fk"], $row["productuuid_fk"], $row["quantity"], $row["price"], $row["subtotal"], $row["taxes"], $row["grandtotal"], $row["comments"]);
            $this->add($row["purchaseuuid"], $purchase);
        }
              
    }
    
}
