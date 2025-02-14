function confirmPwd(){​

	   var pass1=document.getElementById("pass1").value;​

	   var pass2=document.getElementById("pass2").value;​

		   var ok=true;​

		   if(pass1!=pass2){​

		   document.getElementById("pass1").style.borderColor="#E34234";​

		   document.getElementById("pass2").style.borderColor="#E34234";  ​

			   alert("Passwords do not match"); ​

			     ok=false;​

		   }​

		 else {​

		 alert("Passwords match");​

		 }​

		   return ok;​

	   }​
