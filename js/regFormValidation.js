
function checkValues() {

    if ( !checkTextFields() ) return false;

    var password = document.getElementById("password").value;
    var c_password = document.getElementById("c_password").value;

    if( password != c_password ) {

        alert("Passwords do not match!");
        document.getElementById("c_password").focus();
        return false;
    }

    var d = document.getElementsByName("dealing_type");
    var check = false;

    for( var i = 0; i < d.length; i++) {
        if( d[i].checked ) check = true;
    }

    if( !check ) {
        alert("Please choose your dealing type!");
        return false;
    }
  

    var p = document.getElementsByName("product_category[]");
    var check = false;

    for( var i = 0; i < p.length; i++ ) if ( p[i].checked ) check = true;

    if( !check ) {
        alert("Please select atleast one product category to deal in!");
        return false;
    }

    var s = document.getElementById("scale");

    if( s.value == "-1") {
        alert("Please select the scale of your company!");
        return false;
    }

    var f = document.getElementById("pdf");

    if( f.value == "") {
        alert("Please select and upload the registration certificate of your company!");
        return false;
    }

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
