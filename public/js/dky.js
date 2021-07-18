function copyCode() {
    /* Get the text field */
    var copyText = document.getElementById("Code");
  
    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
  
    /* Copy the text inside the text field */
    document.execCommand("copy");
    var c = document.getElementById("copyCode");
    $('#copyCode').prop('disabled',true);
}

function createCode(){
    $.ajax({
        type: "POST",
        url: "./dkynhanh/getcode",
        success: function(msg){
            $('#Code').html(msg);
            $('#copyCode').prop('disabled',false);
        }
    });
}