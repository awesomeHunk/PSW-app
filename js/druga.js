
function last_link_color() {
	document.links.item(document.links.length-1).style.color = 'green';
}

function image_rounding() {
	var logo = document.images.namedItem("pc_format_image");
	logo.style.border ='8px solid red';
	logo.style.borderRadius="8px";
}

function init_site() {
	image_rounding();
	last_link_color();
}

function set_current_menu_active(item){
	current_page = item;
	document.anchors[current_page].style.color = 'orange';
}

var current_page = 'contact_menu';
function set_current(current){
	current_page = current.name;
}
