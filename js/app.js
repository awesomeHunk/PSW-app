var contact_form = document.getElementById('register');

function form_canceling_prompt(){
	var name_entered = document.getElementById('given-name').value;
	if(name_entered!=''){
		var confirmed = confirm("You will lose all data you have entered!");
		if(confirmed){
			contact_form.reset();
		} else {}
	}
}

function validate_input_focus(){
	var inputs_to_validation = document.getElementsByClassName('js_form_validation');
	for (i = inputs_to_validation.length - 1; i >= 0; i--) {
		inputs_to_validation[i].style.background = "red";
	}
}

function validate_input_blur(){
	var inputs_to_validation = document.getElementsByClassName('js_form_validation');
	
	var i = inputs_to_validation.length - 1;
	do {
		if(inputs_to_validation[i].value != ''){
			inputs_to_validation[i].style.background = "green";
		}
		i--;
	}while(i>=0)


}

var span_helper;

function input_helper_removal(item){
	item.parentNode.removeChild(item.nextSibling);
}

var logo_flag = true;

function url_entered(){
	if(logo_flag){
	console.log("called")
	var url = document.getElementById('url');
	var other_input = document.getElementById('register');
	var url_src = url.value;
	var next = url.nextSibling.nextSibling;
	var btn = document.createElement("img"); 
	switch(url_src) {
        case "http://www.youtube.com":
	    	btn.setAttribute("src", "http://icons.iconarchive.com/icons/marcus-roberto/google-play/256/YouTube-icon.png");
	    	btn.setAttribute("height", "30px");
	   	 	btn.setAttribute("width", "30px");
	    	break;
	 	case "http://www.google.pl":
	   	 	btn.setAttribute("src", "http://images.dailytech.com/nimage/G_is_For_Google_New_Logo_Thumb.png");
	   	 	btn.setAttribute("height", "30px");
	   	 	btn.setAttribute("width", "30px");
	    	break;
	}
	logo_flag = false;    
	url.parentNode.insertBefore(btn, url.nextSibling);
	}
}




