function ajax() {
    var msg = $("#ajax").serialize();
    $.ajax({
        type: "POST",
        url: "handler.php",
        data: msg,
        success: function(data) {
            alert(data);
        },
        error: function(xhr, str){
            alert("Error!");
        }
    });
}
