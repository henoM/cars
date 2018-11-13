$(document).ready(function(){
    var map = L.map('map', {
        'center': [0, 0],
        'zoom': 13,
        'layers': [
            L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                'attribution': 'Map data &copy; OpenStreetMap contributors'
            })
        ]
    });
    var marker = L.marker([0, 0]).addTo(map)
        .bindPopup('first position')
        .openPopup();
    $(document).on('click','.car',function(){
        map.removeLayer(marker);
        var id = $(this).attr('id');
        ajaxCall(id);
    });
    function ajaxCall(id){
        $.ajax({
            type:'get',
            url: "car",
            data:{id:id},
            dataType:'json',
            success:function(results){
                var name = results.name;
                var x = results.location.x;
                var y = results.location.y;
                var id = results.id;
                marker = L.marker([x, y]).addTo(map)
                    .bindPopup(name)
                    .openPopup();
                setTimeout(function(){ajaxCall(id)},5000);
            }
        });
    }
});