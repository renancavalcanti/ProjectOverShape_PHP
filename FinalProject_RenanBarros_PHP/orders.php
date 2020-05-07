
<?php
    //#Renan(201830362) 24/04/2020 Adapte to the project 3
    header("Expires: Fri, 02 Dec 1994 16:00:00 GMT");
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
?>

<!DOCTYPE html>

<?php
    include "phpFunctions/phpFunctions.php";
    
        include "phpFunctions/customer.php";
        include "phpFunctions/customers.php";
        include "phpFunctions/product.php";
        include "phpFunctions/products.php";
        include "phpFunctions/purchase.php";
        include "phpFunctions/purchases.php";
        include "phpFunctions/purchaseSearch.php";
        
    set_error_handler("manageError");
    set_exception_handler("manageException");
    
    //Initialize the parameters important to the commands by the brower
    $opacity=1;
    $color=false;
?>
<html>
    <?php
        //Create the header
      createPageHeader("Orders");
      //Set the command print in false
      $pagePrint = false;
      //Get the instructions from the browser
      if(isset($_GET["callfunction"])){
          
          $paramuuid = $_GET["callfunction"];
          deletePurchase($paramuuid);
          
      }
      
      if(isset($_GET["command"])){
          if($_GET["command"]=="print"){
              //If the command is print, set the flag to true and change the opacity
              $pagePrint = true;
              $opacity = 0.3;
          }
         if($_GET["command"]=="color"){
              //If the command is color, set the flag to true
              $color = true;
              
            }
        }
        
        
    ?>
    
    <body class="body-store" >
        <!-- Create the image section and set the opacity as a variable initialized by 1 -->
        <div class = "section-home-store" style="opacity: <?php echo $opacity ?>">
            <div class="container">
                <img src="./img/LOGO_SITE.png">
						
                    
						
                        <?php
                        if($pagePrint==false){
                            //Only create the menu bar if the function print is not activated
                            createMenu($_SESSION["username"]);
                            createLoginform($_SESSION["username"]);
                        }
                            
                        ?>
		
			
            </div>
        </div>
                    
        <div class="container-purchases">
            <div id="functiondelete"></div>
            <form class="form-login" action="orders.php" method="GET">
                <table class="tableLogin" cellspacing="5" cellpadding="5">
                    
                    <tr>
                        <td>
                            <label> Enter the date: </label>
                        </td>
                        <td>
                            <input type="text" name="date"> 
                        </td>
                        <td>
                           <input class= "submitButton" type="submit" name="search" value="search"/>
                        
                        </td>
                    </tr>
                    
                </table>
            </form>
            <table class="table-purchases">
                <!-- Create the header of the table with the fixed parameters -->
                <tr class="header-table">
                  <th>           </th>
                  <th>Product ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>City</th>
                  <th>Comments</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
                  <th>Taxes</th>
                  <th>Grand Total</th>
                </tr>
                <?php
                    
                    $date="";
                    if(isset($_GET["search"])){
                        //if the button search is clicked get the attribute
                        $date = $_GET["date"];
                    }
                    //call the function to generate the purchase table
                    generatePurchases($color,$date);
                    
                ?>
            </table>
            <a class="button-download" href="./data/phpcheatsheet.txt" download><button class="button-download">Submitted Files</button></a>
        </div>
        <form id="formdelete" method="GET" action="orders.php" name="formdelete">
            <input type="hidden" id="callfunction" name="callfunction" />
            <!-- Invisible form just to connect the JS file with the PHP -->
        </form>       
    </body>
        
    
    <footer class="footer" style="opacity: <?php echo $opacity ?>">
           <?php
                //Change the opacity in case of print mode
                 createPageFooter();
            
           ?>
        </footer>
    <script type="text/javascript" src="./js/main.js">
           //call the JS file to delete the purchase

        </script>
</html>
