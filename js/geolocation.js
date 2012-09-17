(function() {

    var watchId;
    function loadDemo() {
        if(navigator.geolocation) {
            document.getElementById("status").innerHTML = "HTML5 Geolocation is supported in your browser.";
            watchId = navigator.geolocation.watchPosition(updateLocation,handleLocationError,{maximumAge:1000});
        }
    }

    function updateLocation(position) {

            // pgp points

        var a = new Point(1.292309, 103.780096);
        var b = new Point(1.291429, 103.779001);
        var c = new Point(1.289638, 103.780954);
        var d = new Point(1.291397, 103.783593);
        var e = new Point(1.291922, 103.783196);
        var f = new Point(1.291054, 103.781115);

        var pgp = new Polygon([a,b,c,d,e,f,a]);



        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var accurary = position.coords.accurary;
        if (!latitude || !longitude) {
            document.getElementById("status").innerHTML = "HTML5 Geolocation is supported in your browser, but location is currently not available.";
            return;
        }

		// commented out as it is needed for testing only
        //document.getElementById("latitude").innerHTML = latitude;
        //document.getElementById("longitude").innerHTML = longitude;

        var current = new Point(latitude,longitude);
        console.log(inPolygon(current,pgp));
        if(inPolygon(current, pgp) )
            document.getElementById("status").innerHTML = "You are in PGP!";
        var latlng = new google.maps.LatLng(latitude, longitude);
        var myOptions = {
          zoom: 17,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_container"),myOptions);
 
        var marker = new google.maps.Marker({
          position: latlng, 
          map: map, 
          title:"PGP!"
        }); 

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
      document.getElementById("status").innerHTML(message);
    }
    $(function() {
        loadDemo();
    });


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
        var polygon = polygon.getPoints();
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
        console.log(sum);
        return ( Math.abs(sum-2*Math.PI) < eps || Math.abs(sum+2*Math.PI) < eps );
    }

    //-----------------------------------------------------


})();