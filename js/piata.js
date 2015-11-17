function input_helper(item) {
	var current_item = item.name;
	var help_message = '';

	switch (current_item) {
		case 'given-name':
			help_message = "What is your first name?";
			break;
		case 'family-name' :
			help_message = "What is your second name?";
			break;
		case 'email' :
			help_message = "What is your contact email?";
			break;
		case 'url' :
			help_message = "Optionaly you enter your website url";
			break;
		case 'phone' :
			help_message = "Enter your mobile phone number";
			break;
	}

	span_helper  = document.createElement("span");
	span_helper.innerHTML = "  --> " + help_message;

	item.parentNode.insertBefore(span_helper, item.nextSibling);

}