function cfg_applying(){
    var cfg_font_size = document.getElementById("cfg_font_size").value;
    var cfg_font_family = document.getElementById("cfg_font_family").value;
    var cfg_red = document.getElementById("cfg_red").value;
    var cfg_green = document.getElementById("cfg_green").value;
    var cfg_blue = document.getElementById("cfg_blue").value;

    document.getElementById("events_box").style.fontSize = cfg_font_size+"px";
    document.getElementById("events_box").style.fontFamily = cfg_font_family;
    document.getElementById("events_box").style.background = "rgb("+cfg_red+","+cfg_green+","+cfg_blue+")";
}