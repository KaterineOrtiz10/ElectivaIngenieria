function dato(e) {
    var p = document.getElementById('espacio');
    console.log(e);
    var t = "";
   
    t += "<input type='hidden' autocomplete='off' name='codigo2' value='" + e + "' require></input>";

    p.innerHTML = t;
}