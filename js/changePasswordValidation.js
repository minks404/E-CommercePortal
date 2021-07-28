
function checkValues() {
    var n_password = document.getElementById("n_password").value;
    var c_password = document.getElementById("c_password").value;

    if( n_password != c_password ) {
        alert("Passwords do not match!");
        document.getElementById("c_password").focus();
        return false;
    }

    if( !checkTextFields() ) return false;

    return true;
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