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

function searchFood() {
    let food = document.getElementById("food").value;
    let weight = document.getElementById("weight").value;

    if (food === "" || weight === "") {
        alert("Please enter both food type and weight.");
        return;
    }

    fetch(`search_food.php?food=${food}&weight=${weight}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById("nutritionInfo").innerHTML = `
                    <p>Calories: ${data.calories} kcal</p>
                    <p>Protein: ${data.protein} g</p>
                    <p>Carbs: ${data.carbs} g</p>
                    <p>Fats: ${data.fats} g</p>
                `;
            } else {
                alert("Food not found in database.");
            }
        })
        .catch(error => console.error("Error:", error));
}


function saveEntry() {
    let food = document.getElementById("food").value;
    let weight = document.getElementById("weight").value;

    if (food === "" || weight === "") {
        alert("Please enter food type and weight.");
        return;
    }

    fetch("save_entry.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ food: food, weight: weight })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Entry saved!");
        } else {
            alert("Error saving entry.");
        }
    })
    .catch(error => console.error("Error:", error));
}
