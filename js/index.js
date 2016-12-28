$('document').ready(function(){

    var controller = "/Controller.php";

    function getSettings() {
        var url = controller+"/config";
        $.get(url, function (data) {
            console.log((data));
        });
    }

    getSettings();
});