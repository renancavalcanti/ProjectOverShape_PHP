<?php
  //#Renan(201830362) 24/04/2020 Adapte to the project 3
    header("Expires: Fri, 02 Dec 1994 16:00:00 GMT");
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
?>
<!DOCTYPE html>
    <?php
         //Include the function file
        include "phpFunctions/customer.php";
        include "phpFunctions/customers.php";
        include "phpFunctions/product.php";
        include "phpFunctions/products.php";
        include "phpFunctions/purchase.php";
        include "phpFunctions/phpFunctions.php";
        set_error_handler("manageError");
        set_exception_handler("manageException")
        
    ?>

<html>
     <?php
        define("MAX_NAME", 20);
        define("MAX_PROD", 12);
        define("MAX_CITY_PROVINCE", 25);
        define("MAX_USERNAME", 12);
        define("MAX_POSTALCODE", 7);
        define("FILE_EOL", "\r\n");
        //Initialize the values of input fields and their respectives errors
        $firstName = "";
        $lastName = "";
        $address = "";
        $city = "";
        $province = "";
        $username = "";
        $password = "";
        $error = false;
        $errorFirstName="";
        $errorLastName="";
        $errorAddress="";
        $errorCity="";
        $errorProvince="";
        $errorPostalCode="";
        $errorUsername="";
        $errorPassword="";
        //create the header of the page
        createPageHeader("Home");
        
  
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
            //Get the infomation from the browser when the button order is pressed
                       
            
            if(isset($_POST["customer"])){
                //set the variable error to false
                $error = false;
                //Insert all the information from the brower in variables, avoiding html and script insertion
                $firstName = htmlspecialchars($_POST["firstname"]);
                $lastName = htmlspecialchars($_POST["lastname"]);
                $address = htmlspecialchars($_POST["address"]);
                $city = htmlspecialchars($_POST["city"]);
                $province = htmlspecialchars($_POST["province"]);
                $postalCode = htmlspecialchars($_POST["postalcode"]);
                $username = htmlspecialchars($_POST["username"]);
                $password = htmlspecialchars($_POST["password"]);
                
                //check the condition of first name
                if(mb_strlen($firstName)>MAX_NAME){
                    $errorFirstName =  "First Name Cannot be longer than " . MAX_NAME . " characters!";
                    $error = true;
                }
                //check the condition of last name
                if(mb_strlen($lastName)>MAX_NAME){
                    $errorLastName =  "Last Name Cannot be longer than " . MAX_NAME . " characters!";
                    $error = true;
                }
                //check the condition of address
                if(mb_strlen($address)>MAX_CITY_PROVINCE){
                    $errorAddress =  "Address cannot be longer than " . MAX_CITY_PROVINCE . " characters!";
                    $error = true;
                }
                //check the condition of city
                if(mb_strlen($city)>MAX_CITY_PROVINCE){
                    $errorCity =  "City Cannot be longer than " . MAX_CITY_PROVINCE . " characters!";
                    $error = true;
                }
                //check the condition of Province
                if(mb_strlen($province)>MAX_CITY_PROVINCE){
                    $errorProvince =  "Province Cannot be longer than " . MAX_CITY_PROVINCE . " characters!";
                    $error = true;
                }
                //check the condition of postal code
                if(mb_strlen($postalCode)>MAX_POSTALCODE){
                    $errorPostalCode =  "Postal Code cannot be longer than " . MAX_POSTALCODE . " characters!";
                    $error = true;
                }
                //check the condition of username
                if(mb_strlen($username)>MAX_USERNAME){
                    $errorUsername =  "Username cannot be longer than " . MAX_USERNAME . " characters!";
                    $error = true;
                }
                
                
                if($error==false){
                    //in case of error is false all the conditions were accepeted
                    
                    //insert the variables in an array
                    insertCustomer ($firstName, $lastName, $address, $city, $province,$postalCode, $username, $password);
                    //$customer = new customer($_SESSION["customeruuid"]);
                    //$customer->setFirstname($firstName);
                    //$customer->setLastname($lastName);
                    //$customer->setAddress($address);
                    //$customer->setCity($city);
                    //$customer->setProvince($province);
                    //$customer->setPostalcode($postalCode);
                    //$customer->setUsername($username);
                    //$customer->setPassword($password);
                   
                    //$customer->save();
                    //if($username != $_SESSION["username"] && $newCustomer->getCustomeruuid()!=""){
                     //$_SESSION["customeruuid"]=$newCustomer->getCustomeruuid();
                     //$_SESSION["username"]=$newCustomer->getUsername();
                       //  }
                    
                    header('Location: register.php');
                    //reset all variables
                    $firstName = "";
                    $lastName = "";
                    $address = "";
                    $city = "";
                    $province = "";
                    $username = "";
                    $password = "";
                    $postalCode = "";
                    $error = false;
                    $errorFirstName="";
                    $errorLastName="";
                    $errorAddress="";
                    $errorCity="";
                    $errorProvince="";
                    $errorPostalCode="";
                    $errorUsername="";
                    $errorPassword="";
                    
                }
                
            }
                            
        ?>       
        <div class="container-form">
            <div class="reg-background">    
            <form class="form-payment" action="register.php" method="POST">
              <?php  
                tableRegister($firstName, $errorFirstName, $lastName, $errorLastName, $address, $errorAddress, $city, $errorCity, $province, $errorProvince, $postalCode, $errorPostalCode, $username, $errorUsername, $password, $errorPassword);
               ?> 
            </form>
            </div>
        </div>
    </body>
    <footer class="footer" style="opacity: <?php echo $opacity ?>">
           <?php
                //Change the opacity in case of print mode
                 createPageFooter();
            
           ?>
        </footer>
</html>
