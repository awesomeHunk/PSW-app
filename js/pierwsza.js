function get_BMI_user_input()
{
	var height = parseFloat(window.prompt("Enter your height in cm"));
	var weight = parseFloat(window.prompt("Enter your weight"));
	
	create_BMI_element(countBMI(height, weight));
		
}

function countBMI(height, weight)
{
	weight = Math.ceil(weight);
	height = Math.floor(height);
	height = height/100;
	return result = (weight/(height*height)).toFixed(2);
}

function create_BMI_element(BMI)
{
	var element = document.createElement("h3");
	var tekst = new Array();
	tekst.push("Your BMI: ");
	tekst.push(BMI);
	tekst.push(" - ");

	if(BMI <= 18){
		tekst.push("You are underweight! ");
	} else if (BMI < 25) {
		tekst.push("Your weight is normal! ");
	} else {
		tekst.push("You have to loose some weight! ");
	}

	var prepared_string = "";
	var i =0;
	
	while(i < tekst.length){
		prepared_string+= tekst[i];
		i++;
	}

	var paragraph = document.createTextNode(prepared_string);
	element.appendChild(paragraph);

	// document.forms["register"].bmi.style.display = 'none';
	document.getElementById('bmi_session').removeChild(document.forms.namedItem("register").bmi);
	bmi_session.replaceChild(element, bmi_session.childNodes[1]);
	
	return true;

}