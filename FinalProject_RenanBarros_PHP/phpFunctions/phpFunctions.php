<?php
#Renan(201830362) 03/02/2020 Index Page
#Renan(201830362) 04/02/2020 Buy Page
#Renan(201830362) 05/02/2020 Purchase Page
#Renan(201830362) 06/02/2020 phpFunctions Implementation
#Renan(201830362) 07/02/2020 Filter parameters
#Renan(201830362) 09/02/2020 Erro / Exceptions management
#Renan(201830362) 10/02/2020 CSS adjustments
#Renan(201830362) 22/04/2020 Login Functions

session_start();
function createPageHeader($title){
    
    echo "<head>";
		echo '<meta charset="utf-8">';
		echo "<title>$title</title>";
				
		echo '<link rel = "stylesheet" type = "text/css" href = "./css/style.css">';
		echo '<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">';
		echo '<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">';
		echo '<link rel="shortcut icon" href="./img/LOGO_SITE.png" type="image/x-icon" />';
		
	echo "</head>";        
    
}

function createMenu($username){
    if($username==""){
    ?>
    <!-- Format fot not logged user -->
    <ul>    
        <li><a href="index.php">Home</a></li>
	&emsp;

	&emsp;
        <li><a href="register.php">Register</a></li>
	&emsp;
	
	&emsp;
	<li><a href="aboutus.php">About Us</a></li>
				
				
    </ul>
    <?php
    }
    else{
        
        ?>
    <!-- Format for logged user --> 
    <ul>    
        <li><a href="index.php">Home</a></li>
	&emsp;
	<li><a href="buy.php">Store</a></li>
	&emsp;
        <li><a href="register.php">Account</a></li>
	&emsp;
	<li><a href="orders.php">Purchases</a></li>
	&emsp;
	<li><a href="aboutus.php">About Us</a></li>
				
				
    </ul>
    <?php
    }
}



function createPageFooter(){
    //get the current year
    $todayDate = new DateTime("now");
    //generate the footer with current year        
    echo "<p>Copyright&copy Renan Barros (201830362) ".$todayDate->format("Y")."<p>";
    

}



define("JSON_FILE", "./data/jsoninfo.txt");

function generatePurchases($color, $date){
        
    
       //usethe constructor of the class purchaseSearch to get all
        //the purchaes referent to the logged user
       $purchases = new purchaseSearch($_SESSION["customeruuid"],$date);
        
       
        
        
       foreach($purchases->items as $purchase){
           
                 $product = new product($purchase->getProductuuid());
                 $product->load();
                 $customer = new customer($purchase->getCustomeruuid());
                 $customer->load();
                 
                       
                       echo '<tr id="line-products">';
                       echo '<th >'.'<button class="buttondelete" value="'.$purchase->getPurchaseuuid().'" type="button">Delete</button>'."</th>";
                       echo '<th id="line-products">'.$product->getProdcode()."</th>";
                       echo '<th id="line-products">'.$customer->getFirstname()."</th>";
                       echo '<th id="line-products">'.$customer->getLastname()."</th>";
                       echo '<th id="line-products">'.$customer->getCity()."</th>";
                       echo '<th id="line-products">'.$purchase->getComments()."</th>";
                       echo '<th id="line-products">'.$purchase->getPrice()."$"."</th>";
                       echo '<th id="line-products">'.$purchase->getQuantity()."</th>";
                       echo '<th id="line-products">'.$purchase->getSubtotal()."$"."</th>";
                       echo '<th id="line-products">'.$purchase->getTaxes()."$"."</th>";
                       
                                                   
                        if($color==true){
                            //change the color of the grandtotal if the user use command=color
                            if($purchase->getGrandtotal()<100){
                                echo '<th id="line-products" class="red">'.$purchase->getGrandtotal()."$"."</th>";
                            }
                            else if($purchase->getGrandtotal()>100 && $purchase->getGrandtotal()<1000){
                                echo '<th id="line-products" class="orange">'.$purchase->getGrandtotal()."$"."</th>";
                            }
                            else{
                                echo '<th id="line-products" class="green">'.$purchase->getGrandtotal()."$"."</th>";
                            }
                        }
                        else{
                            echo '<th id="line-products">'.$purchase->getGrandtotal()."$"."</th>";
                        }
                            
                         echo "</tr>";           
                            
                            
       }
                         
    
}

function generateAdvisement($arrayAdv, $arrayAdvIcon){
    //random number
    $index = rand(0 ,count($arrayAdv)-1);
    echo "<tr>";	
	echo "<th>";
            if($index==0){
                //special condition for the border red css class=icon-special
                echo '<a href="'.$arrayAdv[$index].'" ><img class="icon-special" src="'.$arrayAdvIcon[$index].'"></a>';
            }
            else{
                echo '<a href="'.$arrayAdv[$index].'" ><img class="icon" src="'.$arrayAdvIcon[$index].'"></a>';
            }
            
	echo "</th>";
    echo "</tr>";
    
}

define("LOG", "..\\..\\debug\\logOverShape.txt");
//define("LOG", "C:\\xampp\\debug\\logOverShape.txt");
function manageError($errorCode, $errorMessage, $errorFile, $errorLine){
           
    $dataLog = date('d/m/Y \a\t H:i:s');
    $browser = $_SERVER['HTTP_USER_AGENT'];
    file_put_contents(LOG,"\n\nAn Error Occured: ".$dataLog. " \n", FILE_APPEND);
    file_put_contents(LOG,"Erro Code: " .$errorCode, FILE_APPEND);
    file_put_contents(LOG,"\nMessage: ".$errorMessage, FILE_APPEND);
    file_put_contents(LOG,"\nFile: " .$errorFile, FILE_APPEND);
    file_put_contents(LOG,"\nLine: ".$errorLine, FILE_APPEND);
    file_put_contents(LOG,"\nBrowser: ".$browser, FILE_APPEND);

}
        
function manageException($exception){
    $dataLog = date('d/m/Y \a\t H:i:s');
    $browser = $_SERVER['HTTP_USER_AGENT'];
    file_put_contents(LOG,"\n\nAn Exception Occured: ".$dataLog. " \n",FILE_APPEND);
    file_put_contents(LOG,"Exception code:".$exception->getCode()." \n",FILE_APPEND);
    file_put_contents(LOG,"Exception Message:".$exception->getMessage(). " \n",FILE_APPEND);
    file_put_contents(LOG,"FileName:".$exception->getFile(). " \n",FILE_APPEND);
    file_put_contents(LOG,"Line Number:".$exception->getLine()."\n",FILE_APPEND);
    file_put_contents(LOG,"Line Number:".$browser."\n",FILE_APPEND);
     
   }
   
   function insertCustomer ($firstname, $lastname, $address, $city, $province,$postalCode, $username, $password){
       $customers = new customers();
       $flag = true;
       //create a new customer using the session because if its empty will generate a new user 
       $newCustomer = new customer($_SESSION["customeruuid"]);
       $newCustomer->setFirstname($firstname);
       $newCustomer->setLastname($lastname);
       $newCustomer->setAddress($address);
       $newCustomer->setCity($city);
       $newCustomer->setProvince($province);
       $newCustomer->setPostalcode($postalCode);
       $newCustomer->setUsername($username);
       $newCustomer->setPassword($password);
        //check if exists the username
       foreach($customers->items as $customer){
           if($customer->getUsername()==$newCustomer->getUsername()){
               $flag=false;
               
           }
       }
       
       if($flag==true){
           
       $newCustomer->save();
       //create a new user and update the connection
       if($username != $_SESSION["username"] && $newCustomer->getCustomeruuid()!=""){
        $_SESSION["customeruuid"]=$newCustomer->getCustomeruuid();
        $_SESSION["username"]=$newCustomer->getUsername();
        
       }
       }
       else{
          echo '<script> alert("Username Exists!"); </script>';
       }
       
       
   }
   
   function fillProducts(){
       //load all the products
       $products = new products();
              
       foreach($products->items as $product){
           echo '<option value="'.$product->getProductuuid().'">'.$product->getProdcode()."-".$product->getDescription()."</option>";
       
           
       }
      
   }
   
   function fillCustomers(){
       $customers = new customers();
       //load all the customers
       
       foreach($customers->items as $customer){
           echo '<option value="'.$customer->getCustomeruuid().'">'.$customer->getFirstname()." ".$customer->getLastname()."</option>";
       }
       
   }
   
   function insertOrder($productuuid, $customeruuid, $comments, $qty){
       //create a new order
       $newPurchase = new purchase();
       $product = new product($productuuid);
       $product->load();
       $newPurchase->setCustomeruuid($customeruuid);
       $newPurchase->setProductuuid($productuuid);
       $newPurchase->setPrice($product->getPrice());
       $newPurchase->setQuantity($qty);
       $newPurchase->setComments($comments);
       //calculate all the bill
       $subtotal = number_format($product->getPrice()*$qty,2, '.','');
       $taxes = number_format($subtotal*0.152,2, '.','');
       $grandtotal = number_format($subtotal + $taxes,2, '.','');
       
       $newPurchase->setSubtotal($subtotal);
       $newPurchase->setTaxes($taxes);
       $newPurchase->setGrandtotal($grandtotal);
       
       $newPurchase->save();
       
   }
   
   function deletePurchase($purchaseuuid){
       $purchase = new purchase($purchaseuuid);
       $purchase->delete();
       
   }
   
   
   function createLoginform($username){
       if($username==""){
       ?>
         <form class="form-login" action="index.php" method="POST">
                <table class="tableLogin" cellspacing="0" cellpadding="0">
                    
                    <tr>
                        <td>
                            <label> Username: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <input type="text" name="username"  required>
                            <label class="error-field"></label> 
                            
                        </td>
                    </tr>
                    <tr>
                        <td>                    
                            <label> Password: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <input type="password" name="password" required>
                            <label class="error-field"></label> 
                        </td>
                    </tr>
                    <tr>
                        
                        <td>
                           <input class= "submitButton" type="submit" name="login" value="login"/>
                          
                           
                        </td>
                        <td>
                           
                           <a " href="./register.php">REGISTER</a>
                           
                        </td>
                        
                    </tr>
                </table>
                </form>
     <?php
       }
       else{
           ?>
         <form class="form-login" action="index.php" method="POST">
                <table class="tableLogin" cellspacing="0" cellpadding="0">
                    
                    <tr>
                        <td>
                            <label> WELCOME <?php echo $username; ?></label> 
                        </td>
                        
                    </tr>
                    <tr>
                        
                        <td>
                           <input class= "submitButton" type="submit" name="logout" value="logout"/>
                        
                        </td>
                                               
                    </tr>
                </table>
                </form>
            <?php
       }
       
   }
   
   function verifyLogin($username, $password){
       
        $connection = new PDO("mysql:host=localhost;dbname=Project2_renan", "phpuser", "123");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'CALL getPassword(:username)';
        $login = $connection->prepare($sql);
        $login->bindValue(":username", $username);
        $login->execute();
        $databasepassword="";
        
        while($row = $login->fetch(PDO::FETCH_ASSOC))
        {
            $databasepassword = $row["passwordenc"];
            
        }
        
        
        $sql = 'SELECT PASSWORD(:password) as passenc ';
        $login = $connection->prepare($sql);
        $login->bindValue(":password", $password);
        $login->execute();
        $loginpassword="";
        while($row = $login->fetch(PDO::FETCH_ASSOC))
        {
            $loginpassword = $row["passenc"];
            
        }
        
        if($databasepassword == $loginpassword){
            return true;
        }
        else
            return false;
   }
   
   function createCookie(){
        if(isset($_POST["username"])){
                        $_SESSION["username"] = htmlspecialchars($_POST["username"]);
                        $customers = new customers();
                        
                        foreach($customers->items as $customer){
                            if($customer->getUsername()==$_POST["username"]){
                                $_SESSION["customeruuid"]=$customer->getCustomeruuid();
                            }
                        }
                        header('Location: index.php');
                        exit();
                    }
                }
                
                function deleteCookie(){
                    
                    $_SESSION["username"]="";
                    $_SESSION["customeruuid"]="";
                    header('Location: index.php');
                    exit();
                    
                }
                
                function readCookie(){
                    global $username;
                    if(isset($_SESSION["username"])){
                        $username = $_SESSION["username"];
                    }
                }

function tableRegister($firstName, $errorFirstName, $lastName, $errorLastName, $address, $errorAddress, $city, $errorCity, $province, $errorProvince, $postalCode, $errorPostalCode, $username, $errorUsername, $password, $errorPassword){
    
     ?>
        <table class="tableGeneral" cellspacing="0" cellpadding="0">
                    
                    <tr>
                        <td>
                            <label> First Name: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <input type="text" name="firstname" value = "<?php echo $firstName; ?>" required>
                            <label class="error-field"><?php echo $errorFirstName; ?></label> 
                            
                        </td>
                    </tr>
                    <tr>
                        <td>                    
                            <label> Last Name: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <input type="text" name="lastname" value = "<?php echo $lastName; ?>" required>
                            <label class="error-field"><?php echo $errorLastName; ?></label> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Address:<label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <input type="text" name="address" value = "<?php echo $address; ?>">
                            <label class="error-field"><?php echo $errorAddress; ?></label> 
                        </td> 
                    </tr>
                    <tr>
                        <td>
                            <label> City: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <input type="text" name="city" value = "<?php echo $city; ?>" required>
                            <label class="error-field"><?php echo $errorCity; ?></label> 
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label> Province: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <input type="text" name="province" value = "<?php echo $province; ?>" required>
                            <label class="error-field"><?php echo $errorProvince; ?></label> 
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label> Postal Code: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <input type="text" name="postalcode" value = "<?php echo $postalCode; ?>" required>
                            <label class="error-field"><?php echo  $errorPostalCode; ?></label> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Username: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <input type="text" name="username" value = "<?php echo $username; ?>" required>
                            <label class="error-field"><?php echo $errorUsername; ?></label> 
                        </td>   
                    </tr>
                    <tr>
                        <td>
                            <label> Password: <label style="color:red;">*<label></label> 
                        </td>
                        <td>
                            <input type="password" name="password" value = "<?php echo $password; ?>" required>
                            <label class="error-field"><?php echo $errorPassword; ?></label> 
                        </td>   
                    </tr>
                    <tr>
                        <td>
                        <td>
                           <input class= "submitButton" type="submit" name="customer" value=<?php if($_SESSION["username"]=="") {echo '"Register"';} else{echo '"Update Info"';} ?>/>
                           
                        </td>
                        <td>
                            <button class= "submitButton" type="reset" name="clear">Reset Data</button>
                
                        </td>
                        </td>
                        
                    </tr>
                    
                            
                        
                        
                        
                </table>
    
    <?php
    
    
}
