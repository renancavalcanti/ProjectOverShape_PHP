var btns = document.querySelectorAll("button");
//get all the buttons in the file
btns.forEach(function(button){
	//for each button create a function
	button.addEventListener("click",function(e){
		//if the button is clicked
                //get the hidden input on hidden form
		var hiddenControl = document.getElementById('callfunction');
                //get the form
                var form = document.getElementById("formdelete");
                //set the input with the button target which is the purchaseuuid
                hiddenControl.value = e.target.value.toString();
                //submit the form to call the _GET
		form.submit();
                
		
		
	});
	
});
