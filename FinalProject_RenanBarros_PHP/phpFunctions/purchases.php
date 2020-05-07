<?php
 //#Renan(201830362) 26/04/2020 Created
require_once 'database-connection.php';
require_once 'purchase.php';
require_once 'collection.php';

class purchases extends collection
{
    
    function __construct()
    {
        global $connection;
            
        $sql = 'CALL purchases_select()';
        $purchases = $connection->prepare($sql);
        $purchases->execute();
        
        while($row = $purchases->fetch(PDO::FETCH_ASSOC))
        {
            $purchase = new purchase($row["purchaseuuid"], $row["customeruuid_fk"], $row["productuuid_fk"], $row["quantity"], $row["price"], $row["subtotal"], $row["taxes"], $row["grandtotal"], $row["comments"]);
            $this->add($row["purchaseuuid"], $purchase);
        }
              
    }
    
}

