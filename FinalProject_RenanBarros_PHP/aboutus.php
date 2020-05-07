<?php
    header("Expires: Fri, 02 Dec 1994 16:00:00 GMT");
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
    
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
        include "phpFunctions/phpFunctions.php";
        
        createPageHeader("AboutUs");
        ?>
    
    <body>
        
        <div class = "section-home-store">
            <div class="container">
		<img src="./img/LOGO_SITE.png">
					
		<?php
                    createMenu($_SESSION["username"]);
                    createLoginform($_SESSION["username"]);
                ?>
			
            </div>
	</div>
			
	<div class = "mid-aboutus">
            <div class="wrapper animated bounceInLeft">
		<h1 id="h1-aboutus"> About Us </h1>
            </div>
            <div>
		<img  class="image-aboutus" src="./img/crossfit.jpg">
            </div>
	</div>	
			
	<br><br><br>
			
	<div class="wrapper-aboutus" >
				
            <div>
					
		<h3>
                    &emsp; Created and developed to become the most complete fitness 
                    apparel store in Canada, Overshape was created to always add quality to the products it offers.
		</h3>	
            </div>
				
            <div>
		<p> The passion for healthy lifestyle and sports is in our DNA, and it is with this motivation that we innovate daily, bringing the best of the sports world to our customers. </p>
		<p> Our store is so interested in providing the best products and prices to its customers that we create our own brand bringing unique collections of masculine and feminine articles related to both the casual and the fitness universe.</p>
		<p> We seek to be a reference in what we provide ourselves to do, and thus be recognized by the quality and innovation of our products .</p>
            </div>
							
            </div>
		
		
        <?php
                        
        ?>
    </body>
</html>
