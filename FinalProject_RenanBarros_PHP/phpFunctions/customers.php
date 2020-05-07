<?php
 //#Renan(201830362) 26/04/2020 Created
require_once 'database-connection.php';
require_once 'customer.php';
require_once 'collection.php';

class customers extends collection
{
    
    function __construct()
    {
        global $connection;
            
        $sql = 'CALL customers_select()';
        $customers = $connection->prepare($sql);
        $customers->execute();
        
        while($row = $customers->fetch(PDO::FETCH_ASSOC))
        {
            $customer = new customer($row["customeruuid"], $row["firstname"], $row["lastname"], $row["address"], $row["city"], $row["province"], $row["postalcode"], $row["username"], $row["passwordenc"]);
            $this->add($row["customeruuid"], $customer);
        }
        
        
        
    }
    
}