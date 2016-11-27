$(document).on("ready", function() {
    var place = $(".data");
});

function send(place) {
    place = place.toString();
    $.ajax({
        url: "./engine/out.php",
        method: "GET",
        data: place,
        beforeSend: function() {

        },
        success: function(data) {

        },
        error: function() {

        }
    });
}