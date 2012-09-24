(function() {


    var watchId;
    var flag=0;
    var coor_lat;
    var coor_long;
    
    

    function setGeolocation(){
        loadLocation();
    }

    function loadLocation() {
        if(navigator.geolocation) {
            //document.getElementById("status").innerHTML = "HTML5 Geolocation is supported in your browser.";
            watchId = navigator.geolocation.watchPosition(updateLocation,handleLocationError,{ maximumAge:2000});
        }
    }

    function get_point_list(list){
        var point_list = [];
        for (var i = 0; i < list.length; i++) {
            var point = new Point(list[i].x,list[i].y);
            point_list.push(point);
        }
        return point_list;
    }

    function updateLocation(position) {

        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var accurary = position.coords.accurary;
        if (!latitude || !longitude) {
            $("#status").html("HTML5 Geolocation is supported in your browser, but location is currently not available.");
            return;
        }

        //cache the location choose whether to update the map
        if(flag!=0)
            var distance = haversine(latitude,longitude,coor_lat,coor_long);
        if(flag==0 || distance>getSencitiveDistance()){  
            flag = 1;

            coor_lat = latitude;
            coor_long = longitude;

            post_location(latitude,longitude);
            my_timer = setInterval(function(){
                post_location(latitude,longitude);
            }, 10000);

            init_map(latitude,longitude);    
        }
    }
    

    var my_timer;
    function init_map(latitude,longitude){
        var latlng = new google.maps.LatLng(latitude, longitude);
        var myOptions = {
            zoom: 17,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_container"),myOptions);

        //show me 
        $('#show_me').click(function(){
            console.log(1);
            map.panTo(latlng);
        });

        var current = new Point(latitude,longitude);
        $('#location_title').html('undefined');

            //check location{
            // highlight and make mark
            //}

        for (var i = 0; i < window.mydata.length; i++) {
            var loc_name = window.mydata[i].name;
            var loc_polygon = window.mydata[i].polygon;
            loc_polygon.push(loc_polygon[0]);

            if(inPolygon(current,loc_polygon)){

                $('#location_title').html(loc_name);
                //chat room update

                chatConnection(loc_name);
                $('#enterButton').click(function(){
                    sendChat(loc_name, $("#contentBox").val());
                });
                ///////////////////
                var PolygonCoords = [];
                for (var i = 0; i < loc_polygon.length; i++) {
                    var tmp = new google.maps.LatLng(loc_polygon[i].getX(), loc_polygon[i].getY());
                    PolygonCoords.push(tmp);
                };
                //highlight
                var highlight = new google.maps.Polygon({
                    paths: PolygonCoords,
                    strokeColor: "#FF0000",
                    strokeOpacity: 0.6,
                    strokeWeight: 2,
                    fillColor: "#FF0000",
                    fillOpacity: 0.35
                });
                highlight.setMap(map);
                break;
            }
        }  

        
        

        
        $.get(urlConfig.user, function(data) {
            $.each(data, function(index,value){
                var now = new Date().getTime();
                var mydate = Date.parse(value.last_location_timestamp);
                
                console.log(now-mydate);
                mydate = (now - mydate);

                if(value.geometry!=null && mydate < 1500){
                    
                    var image = new google.maps.MarkerImage('../application/views/images/meinv.jpg',null,null,null,
                                new google.maps.Size(30, 30));
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(parseFloat(value.geometry.x), parseFloat(value.geometry.y)),
                        map: map, 
                        icon: image,
                        title: value.name,
                        content: value.status,
                    });
                
                    attachSecretMessage(marker);
                }
                

            });
            },'json');
        
        var infowindow = new google.maps.InfoWindow(
            {
                content:'',
                size: new google.maps.Size(50,50)
            });
        function attachSecretMessage(marker){
            var message = '<table>\
                        <tr>\
                            <td class="left"\
                                <span ><img src="../application/views/images/meinv.jpg" height="60" width="60" /></span>\
                            </td>\
                            <td class="right" >\
                                <div id="name"><b>'+marker.title+'</b> '+haversine(latitude,longitude,marker.position.Xa,marker.position.Ya)+'m'+'\
                                </div>\
                                <div id="other">'+marker.content+'\
                                </div>\
                            </td>\
                        </tr>\
                    </table>';
            
            google.maps.event.addListener(marker,'click',function(event){
                infowindow.setContent(message);
                infowindow.open(map,marker);
            });
        }
    }

    function post_location(lat,long){

        var point = {x:lat, y:long};
        $.post(urlConfig.post_location, point);
    }

    function getSencitiveDistance(){
        return 20;
    }

    function rad(x){
        return x * Math.PI / 180;
    }

    function haversine(p1_latitude,p1_longtitude,p2_latitude,p2_longtitude){
        var R = 6371*1000;
        var p1 = {
            latitude:p1_latitude,
            longitude:p1_longtitude
        };
        var p2 = {
            latitude:p2_latitude,
            longitude:p2_longtitude
        };
        var dLat  = rad(p2.latitude - p1.latitude)
        var dLong = rad(p2.longitude - p1.longitude)

        var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(rad(p1.latitude)) * Math.cos(rad(p2.latitude)) * Math.sin(dLong/2) * Math.sin(dLong/2)
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a))
        var d = R * c
        return Math.round(d)
    }

    function handleLocationError(error){
      switch(error.code){
        case 0:
                updateStatus("There was an error while retrieving your location: " +
                error.message);
        break;
        case 1:
        updateStatus("The user prevented this page from retrieving a location.");
        break;
        case 2:
        updateStatus("The browser was unable to determine your location: " +
                                error.message);
        break;
        case 3:
        updateStatus("The browser timed out before retrieving the location.");
        break;
        }
    }

    function updateStatus(message){
      $("#status").html(message);
    }
    
    function get_location(x,y){
        for (var i = 0; i < window.mydata.length; i++) {
            var loc_name = window.mydata[i].name;
            var loc_polygon = window.mydata[i].polygon;
            loc_polygon.push(loc_polygon[0]);
            var point = new Point(x,y);

            var result= {
                'name':'undefined',
                'polygon': [],
            };
            if(inPolygon(point,loc_polygon)){
                result['name'] = loc_name;
                result['polygon'] = loc_polygon; 
            }
            break;
        }  
        return result;
    }

    // Geometry Class  -----------------------------------------

    function Point( x , y ){
        this.x = x;
        this.y = y;
    }

    Point.prototype.getX = function(){
        return this.x;
    }

    Point.prototype.getY = function(){
        return this.y;
    }

    function Polygon(points){
        this.points = points;
    }

    Polygon.prototype.getPoints = function(){
        return this.points;
    }

    // in polygon algorithm---------------------------------------

    function cross(p, q, r){
        return ( r.getX()-q.getX() ) * ( p.getY()-q.getY() ) - ( r.getY()-q.getY() ) * ( p.getX()-q.getX() );
    }

    function angle(a, b, c){   // a is the middle point
        var ux = b.getX() - a.getX(), uy = b.getY() - a.getY(), vx = c.getX() - a.getX(), vy = c.getY() - a.getY();
        return Math.acos( (ux * vx + uy * vy) / Math.sqrt( (ux * ux + uy * uy) * (vx * vx + vy * vy) ) ); 
    }

    
    function inPolygon(point, polygon){   //important !!! the last point must equal to the first point
        

        //var polygon = polygon.getPoints();
        var eps = 0.0000001;
        if(polygon.length == 0)
            return false;
        var sum = 0;
        for (var i = 0; i < polygon.length - 1; i++) {
            if( cross(point, polygon[i], polygon[i+1]) < 0 )
                sum -= angle(point, polygon[i], polygon[i+1]);
            else
                sum += angle(point, polygon[i], polygon[i+1]);
        }

        return ( Math.abs(sum-2*Math.PI) < eps || Math.abs(sum+2*Math.PI) < eps );
    }
    
    function init(){
        $.get(urlConfig.location, function(data) {
            if(window.mydata == undefined){
                var list = data;
                var location = [];

                for (var i = 0; i < list.length; i++) {
                    var tmp_geo = list[i].geometry;
                    var point_list = get_point_list(tmp_geo);
                    var tmp = {
                        name: list[i].name,
                        polygon: point_list, 
                    };
                    location.push(tmp);
                }
                window.mydata = location;
            }  
            setGeolocation();
        }, 'json');
    }

    $('a[href*="#page1"]').click(function(){
        console.log('refresh');
        init();
    });

    //-----------------------------------------------------
    $(function() {
        $('#map_container').on('fixed',function(){
            console.log('init map')
            init();
        });
    });
})();