<?php
 //#Renan(201830362) 26/04/2020 Created
require_once 'database-connection.php';
require_once 'product.php';
require_once 'collection.php';

class products extends collection
{
    
    function __construct()
    {
        global $connection;
            
        $sql = 'CALL products_select()';
        $products = $connection->prepare($sql);
        $products->execute();
        
        while($row = $products->fetch(PDO::FETCH_ASSOC))
        {
            $product = new product($row["productuuid"], $row["prodcode"], $row["description"], $row["price"], $row["cost"]);
            $this->add($row["productuuid"], $product);
        }
        
               
    }
    
}
