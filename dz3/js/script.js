$(document).on("ready", function() {

    //var s = [ $('#u_name') , $('#u_age') , $('#u_about') ];
    send($('#u_name').attr("data-send"));
    send($('#u_age').attr("data-send"));
    send($('#u_about').attr("data-send"));
});

function send(place) {

    place = place.toString();
    $.ajax({
        url: "./engine/data-refactoring.php",
        method: "GET",
        data: 'out_names='+place,
        success: function(data) {
            $('.data[data-send="' + place +'"]').append(data);
        },
        error: function() {
            $('.data[' + place +']').append(data);
        }
    });
    return false;
}
