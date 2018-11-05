$(document).ready(function(){
    // var x = 40.1051;
    // var y = 44.3048;
    // var name = 'mersedes';
    // var id = 'map';

    // maps(x,y,name,id);
    $(document).on('click','.car',function(){

        var id = $(this).attr('id');
        $('#cont').html('<div id="map"+id class="vmap"></div>');
        $('.vmap').attr('id','map'+id);
        $.ajax({
            type:'get',
            url: "car",
            data:{id:id},
            success:function(results){
                var name = results.name;
                var x =results.location.x;
                var y =results.location.y;
                var id = 'map'+results.id;
                maps(x,y,name,id);
            }
        });
    });
    function maps(x,y,name,id){
        var map = L.map(id).setView([x,y], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([x,y]).addTo(map)
            .bindPopup(name)
            .openPopup();
    }

    $("#map").remove();
});