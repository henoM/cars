$(document).ready(function(){
    var map = L.map('map', {
        'center': [0, 0],
        'zoom': 10,
        'layers': [
            L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                'attribution': 'Map data &copy; OpenStreetMap contributors'
            })
        ]
    });
    $("#v").hide();
    $(document).on('click','#cars',function(){
        $("#v").show();
        ajaxCall();
    });
    function ajaxCall(){
        $.ajax({
            type:'get',
            url: "cars",
            dataType:'json',
            success:function(results){

                $.each(results.cars, function (key, car) {
                    var name = car.name;
                    var x = car.location.x;
                    var y = car.location.y;
                   L.marker([x, y]).addTo(map)
                        .bindPopup(name)
                        .on('click', clickZoom);
                });
            setTimeout(function(){ajaxCall()},5000);
            }
        });
    }
    function clickZoom(e) {
        map.setView(e.target.getLatLng(),1);
    }
    $(document).on('click','.car',function(){
        var id = $(this).attr("id")
        $.ajax({
            type:'get',
            url: "car",
            data:{id:id},
            dataType:'json',
            success:function(results){

                    var name = results.name;
                    var x = results.location.x;
                    var y = results.location.y;
                    map.setView(new L.LatLng(x, y), 10);
            }
        });

    });
});