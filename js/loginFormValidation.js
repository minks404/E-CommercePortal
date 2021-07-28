
function checkValues() {
    if( !checkTextFields() ) return false;
    else return true;
}

function checkTextFields() {
    var x = document.getElementsByClassName("text_field");

    for( var i = 0; i < x.length; i++) {

        if( x[i].value.trim() == "" ) {
            alert("Please fill the required value in the field!");
            x[i].focus();
            return false;
        }
    }

    return true; 
}