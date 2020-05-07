<!-- Teacher's Comments and My Reply!
Create the section with the logo //The revision history is required for all files - OK
Your cheat cheat should contain much more information - OK
You should write comments in all your files - OK
You should use more constants in the code - OK
C:\ is not a relative path - FIXED phpFunction.php line 148
The website presentation looks a little minimalistic (white background, not much CSS, etc.) - NOT REQUIRED BEFORE
You have 4 ads instead of 5, and the 'premium' ad don’t have a red border - RED COLOR WAS ALREADY DONE, AD ADDED index.php line 52
You have HTML code outside the <body> - OK
You have malformed HTML in the <form> and with  
The link to purchases.php page says Purchases.php (capital P) so the navigation menu works only on a Windows web server - FIXED
You forgot the UTF-8 header - WAS ALREADY DONE phpFunctions.php line 13
You should use POST for more security - NO REQUIRED BEFORE
The purchases table should show some borders - WAS ALREADY DONE
When validating, the comments are reset - WAS ALREADY DONE
The validation errors should be displayed in red - WAS ALREADY DONE
You should use CSS with in command=print - WAS ALREADY DONE
The command=color command was started but not implemented - WAS ALREADY DONE
We can buy more than 99 items - FIXED ON buy.php line 88
Your website generates an error in the log file (JSON_FILE already defined). - OK
All the fields should be protected against HTML injection - WAS ALREADY DONE
-->



<?php
    header("Expires: Fri, 02 Dec 1994 16:00:00 GMT");
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
?>


<!DOCTYPE html>
    <?php
         //Include the function file
        include "phpFunctions/phpFunctions.php";
        include "phpFunctions/customer.php";
        include "phpFunctions/customers.php";
        include "phpFunctions/product.php";
        include "phpFunctions/products.php";
        include "phpFunctions/purchase.php";
        include "phpFunctions/purchases.php";
        set_error_handler("manageError");
        set_exception_handler("manageException");
        $username="";
    ?>
<html>
    <?php
         
        //Create the arrays of advsiment
        $arrayAdv = array("https://www.redbull.com/ca-en/", "https://www.amazon.ca/", "https://www.monsterenergy.com/","https://www.optimumnutrition.com/en-us/product/gold-standard-100-whey", "https://www.monsterenergy.com/" );
        $arrayAdvIcon = array("./img/redbull.png", "./img/amazon.png", "./img/monster.png", "./img/on.png", "./img/hyde.png");
        //create the header of the page
        createPageHeader("Home");
  
    ?>
    <body>
        <!-- Create the section with the logo -->
        <div class = "section-home">
            <div class="container">
		<img src="./img/LOGO_SITE.png">
				
		<?php
                    session_start(); //start the php session
                
                if(isset($_POST["login"])){
                    //call the function to verify login
                    verifyLogin($_POST["username"], $_POST["password"]);
                    if(verifyLogin($_POST["username"], $_POST["password"])){
                        //create a new cookie session if login verified sucessfuly
                        createCookie();
                    }
                    else {
                        //login invalid log
                        echo '<script> alert("Login Invalid"); </script>';
                    }
                }
                else{
                    if(isset($_POST["logout"])){
                        //delete cookie if the button logout is called
                        deleteCookie();
                    }
                    else{
                        //read the cookie if the page is reload
                        readCookie();
                    }
                }
                
                
                
                
                    //Function to create the menu bar
                    //Function will behave in different way in case of logged user
                    createMenu($_SESSION["username"]);
                    createLoginform($_SESSION["username"]);
                ?>
           
            </div>
            <!-- Div to start with animation -->
            <div class="wrapper animated bounceInDown" >
                
		<h1> Never Give Up </h1>
                
            </div>
            <!-- Background Video Div -->		
            <div class="video-container">
		<video autoplay loop muted>
		<source src="./img/Untitled.mp4" type="video/mp4"> 
		</video>
            </div>
				
            <a id="buttom-home" href="./buy.php">STORE</a>
				
	</div>
		
	<table class="fix-me">
            <?php
                
               //Generate randomly the advisement by the function
                generateAdvisement($arrayAdv, $arrayAdvIcon);
            ?>
	</table>
            
        
    </body>
   
        <footer class="footer">
           <?php
            //Create the footer
            createPageFooter();
           ?>
        </footer>
    
</html>
