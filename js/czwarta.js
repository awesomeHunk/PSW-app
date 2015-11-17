function isKeyPressed(event) {
    var x = document.getElementById("alt_box");
    var y = document.getElementById("shift_box");
    var z = document.getElementById("ctrl_box");
    var charcode = document.getElementById("charcode_box");

    if (event.altKey) {
        x.innerHTML = "The ALT key was pressed!";
    } else {
        x.innerHTML = "The ALT key was NOT pressed!";
    }
    if (event.shiftKey) {
        y.innerHTML = "The SHIFT key was pressed!";
    } else {
        y.innerHTML = "The SHIFT key was NOT pressed!";
    }
    if (event.ctrlKey) {
        z.innerHTML = "The CTRL key was pressed!";
    } else {
        z.innerHTML = "The CTRL key was NOT pressed!";
    }

    charcode.innerHTML = "You pressed key with keyCode: "+ event.keyCode+"!" ;
}

function mousePosition(event)
{
	var y = document.getElementById("mouse_pointer_screen");
    var z = document.getElementById("mouse_pointer_relative");
    
    y.innerHTML = "x: " + event.screenX +", y: " + event.screenY;
    z.innerHTML = "x: " + event.clientX +", y: " + event.clientY;
    // x.innerHTML = "x: " + event.screenX +", y: " + event.screenY;
}
 
function mouse_entered(event){
	document.getElementById("events_box").style.fontWeight='bold';
}

function mouse_out(event){
	document.getElementById("events_box").style.fontWeight='normal';
}