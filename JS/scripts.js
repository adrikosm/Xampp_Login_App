<!-- Country Change for form-->
function country_code() {
    var val = document.getElementById("country").value;

    if (val == 'other_country') {
        document.getElementById("phone_number").value = ' ';
    } else if (val == 'UK') {
        document.getElementById("phone_number").value = '+44';
    } else if (val == 'DE') {
        document.getElementById("phone_number").value = '+49';
    }

}

