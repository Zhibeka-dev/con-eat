function confirmPwd(){​
	var pass1=document.getElementById("password").value;​
	var pass2=document.getElementById("confirmpassword").value;​
	var ok=true;​
		if(pass1!=pass2){​
			document.getElementById("password").style.borderColor="#E34234";​
			document.getElementById("confirmpassword").style.borderColor="#E34234";  ​
			alert("Passwords do not match"); ​
			ok=false;​
			}​
		else {​
		 	alert("Passwords match");​
		 }​
		return ok;​
	}​
