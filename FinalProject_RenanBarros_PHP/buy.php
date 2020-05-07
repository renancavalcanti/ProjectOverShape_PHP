<?php
  //#Renan(201830362) 24/04/2020 Adapte to the project 3
    header("Expires: Fri, 02 Dec 1994 16:00:00 GMT");
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
?>

<!DOCTYPE html>
<?php
        //include the functions file
        include "phpFunctions/phpFunctions.php";
        include "phpFunctions/customer.php";
        include "phpFunctions/customers.php";
        include "phpFunctions/product.php";
        include "phpFunctions/products.php";
        include "phpFunctions/purchase.php";
        include "phpFunctions/purchases.php";
        set_error_handler("manageError");
        set_exception_handler("manageException");
        define("JSON_FILE", "./data/jsoninfo.txt");
    ?>
<html>
    <?php
        //Define all the constants
        define("MAX_COMMENT", 200);
        define("FILE_EOL", "\r\n");
        //Initialize the values of input fields and their respectives errors
        $productuuid = "";
        $customeruuid = "";
        $lastName = "";
        $city = "";
        $comments = "";
        $error = false;
        $errorQty="";
        //Create the header page          
        createPageHeader("Buy");
  
    ?>
    
    <body class="body-store">
        <div class = "section-home-store">
            <div class="container">
                <img src="./img/LOGO_SITE.png">
						
                   
						
                        <?php
                            //Create the menu bar
                            createMenu($_SESSION["username"]);
                            createLoginform($_SESSION["username"]);
                            
                        ?>
		
			
            </div>
        </div>
        <?php
            //Get the infomation from the browser when the button order is presse      
            
        
            if(isset($_GET["order"])){
                //set the variable error to false
                
                $error = false;
                //Insert all the information from the brower in variables, avoiding html and script insertion
                $productuuid = htmlspecialchars($_GET["productuuid"]);
                $customeruuid = htmlspecialchars($_GET["customeruuid"]);
                $qty = htmlspecialchars($_GET["qty"]);
                $comments = htmlspecialchars($_GET["comments"]);
                //Check the condition of product code
                echo $fullname;
                //check the condition of comments
                if(mb_strlen($comments)>MAX_COMMENT){
                    $errorComments =  "Comments cannot be longer than " . MAX_COMMENT . " characters!";
                    $error = true;
                }
                                
                //check the condition of qty
                if(!is_numeric($qty)){
                    $errorQty =  "Must be a number!";
                    $error = true;
                }
                else{
                    //check if is int
                    if(substr(strpbrk($qty, '.,'),1)!= 0){
                      $errorQty = "Value must be int!";
                      $error = true;
                     }
                     if($qty <= 0 || $qty>=100){
                         $errorQty = "Value must be higher than 0 and lower than 100!";
                         $error = true;
                     }
                     
                }
                if($error==false){
                    //in case of error is false all the conditions were accepeted
                    echo '<script> alert("WELL DONE"); </script>';
                    //calculate the taxes
                    
                    insertOrder($productuuid, $customeruuid, $comments, $qty);
                    
                    //reset all variables
                    $productuuid = "";             
                    $customeruuid = "";
                    $city = "";
                    $qty="";
                    $comments = "";
                    $error = false;
                    $errorQty="";
       
                    
                }
                
            }
                            
        ?>       
        <div class="container-form">
            <div class="buy-background">
            <form class="form-payment" action="buy.php" method="GET">
                <table class="tableGeneral" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <label> Product Code: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <select name="productuuid" required>
                                <?php fillProducts(); ?>
                            </select>
                            <label class="error-field"><?php echo $errorProd; ?></label> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Customer: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <select name="customeruuid" required>
                                <?php fillCustomers(); ?>
                            </select>
                            <label class="error-field"><?php echo $errorFirstName; ?></label> 
                            
                        </td>
                    </tr>
                    <tr>
                        <td>                    
                            <label> Comments:</label> 
                        </td>
                        <td>
                            <input type="text" name="comments" value = "<?php echo $comment; ?>">
                            <label class="error-field"><?php echo $errorComments; ?></label> 
                        </td>
                    <tr>
                        <td>
                            <label> Quantity: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <input type="text" name="qty" value = "<?php echo $qty; ?>" required>
                            <label class="error-field"><?php echo $errorQty; ?></label> 
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                        <td>
                           <input class= "submitButton" type="submit" name="order" value="Submit Order"/>
                           
                        </td>
                        <td>
                            <button class= "submitButton" type="reset" name="clear">Reset Data</button>
                
                        </td>
                        </td>
                        
                    </tr>
                    
                            
                        
                        
                        
                </table>
            </form>
            </div>
        </div>
                
    </body>
    
    <footer class="footer">
           <?php
            createPageFooter();
           ?>
        </footer>
</html>
