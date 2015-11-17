function myFunction() {
    var x = document.images;
    var txt = "Na stronie jest/sa " + document.images.length + " obrazki.<br>"
    var i;
    for (i = 0; i < x.length; i++) {
        txt = txt +  x[i].src + "<br>";
    }
    document.getElementById("obrazkowo").innerHTML = txt;
}