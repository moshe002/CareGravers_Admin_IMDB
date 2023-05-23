function initMap() { //google maps initialize, asa ang coordinates, unsay style sa map
    var map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: 10.310075,
            lng: 123.911533,
        },
        zoom: 18,
        heading: 321,
        tilt: 47.5,
        mapId: "37a142a1e1464d01"
    });//syntax of... google.maps.Map(mapDiv,options) - options can accept multiple settings like zoom, style, etc
    

    // Define the LatLng coordinates for the polygon's path.

    var a1 = [
        {lat: 10.308971, lng: 123.910485},
        {lat: 10.309006, lng: 123.910530},
        {lat: 10.309066, lng: 123.910478},
        {lat: 10.309031, lng: 123.910433}
    ];

    var a2 = [
        {lat: 10.309020, lng: 123.910548},
        {lat: 10.309055, lng: 123.910593},
        {lat: 10.309115, lng: 123.910541},
        {lat: 10.309080, lng: 123.910496}
    ];

    var a3 = [
        {lat: 10.309069, lng: 123.910611},
        {lat: 10.309104, lng: 123.910656},
        {lat: 10.309164, lng: 123.910604},
        {lat: 10.309129, lng: 123.910559}
    ];

    var a4 = [
        {lat: 10.309118, lng: 123.910674},
        {lat: 10.309153, lng: 123.910719},
        {lat: 10.309213, lng: 123.910667},
        {lat: 10.309178, lng: 123.910622}
    ];

    var a5 = [
        {lat: 10.309167, lng: 123.910737},
        {lat: 10.309202, lng: 123.910782},
        {lat: 10.309262, lng: 123.910730},
        {lat: 10.309227, lng: 123.910685}
    ];

    var a6 = [
        {lat: 10.309216, lng: 123.910800},
        {lat: 10.309251, lng: 123.910845},
        {lat: 10.309311, lng: 123.910793},
        {lat: 10.309276, lng: 123.910748}
    ];

    var a7 = [
        {lat: 10.309265, lng: 123.910863},
        {lat: 10.309300, lng: 123.910908},
        {lat: 10.309360, lng: 123.910856},
        {lat: 10.309325, lng: 123.910811}
    ];

    var a8 = [
        {lat: 10.309314, lng: 123.910926},
        {lat: 10.309349, lng: 123.910971},
        {lat: 10.309409, lng: 123.910919},
        {lat: 10.309374, lng: 123.910874}
    ];

    var a9 = [
        {lat: 10.309363, lng: 123.910989},
        {lat: 10.309398, lng: 123.911034},
        {lat: 10.309458, lng: 123.910982},
        {lat: 10.309423, lng: 123.910937}
    ];

    var a10 = [
        {lat: 10.309412, lng: 123.911052},
        {lat: 10.309447, lng: 123.911097},
        {lat: 10.309507, lng: 123.911045},
        {lat: 10.309472, lng: 123.911000}
    ];

    //

    var b1 = [
        {lat: 10.308893, lng: 123.910552},
        {lat: 10.308928, lng: 123.910597},
        {lat: 10.308988, lng: 123.910545},
        {lat: 10.308953, lng: 123.910500}
    ];

    var b2 = [
        {lat: 10.308942, lng: 123.910615},
        {lat: 10.308977, lng: 123.910666},
        {lat: 10.309037, lng: 123.910608},
        {lat: 10.309002, lng: 123.910563}
    ];

    var b3 = [
        {lat: 10.308991, lng: 123.910678},
        {lat: 10.309026, lng: 123.910723},
        {lat: 10.309086, lng: 123.910671},
        {lat: 10.309051, lng: 123.910626}
    ];

    var b4 = [
        {lat: 10.309040, lng: 123.910741},
        {lat: 10.309075, lng: 123.910786},
        {lat: 10.309135, lng: 123.910734},
        {lat: 10.309100, lng: 123.910689}
    ];

    var b5 = [
        {lat: 10.309089, lng: 123.910804},
        {lat: 10.309124, lng: 123.910849},
        {lat: 10.309184, lng: 123.910797},
        {lat: 10.309149, lng: 123.910752}
    ];

    var b6 = [
        {lat: 10.309138, lng: 123.910867},
        {lat: 10.309173, lng: 123.910912},
        {lat: 10.309233, lng: 123.910860},
        {lat: 10.309198, lng: 123.910815}
    ];

    var b7 = [
        {lat: 10.309187, lng: 123.910930},
        {lat: 10.309222, lng: 123.910975},
        {lat: 10.309282, lng: 123.910923},
        {lat: 10.309247, lng: 123.910878}
    ];

    var b8 = [
        {lat: 10.309236, lng: 123.910993},
        {lat: 10.309271, lng: 123.911038},
        {lat: 10.309331, lng: 123.910986},
        {lat: 10.309296, lng: 123.910941}
    ];

    var b9 = [
        {lat: 10.309285, lng: 123.911056},
        {lat: 10.309320, lng: 123.911101},
        {lat: 10.309380, lng: 123.911049},
        {lat: 10.309345, lng: 123.911004}
    ];
    var b10 = [
        {lat: 10.309334, lng: 123.911119},
        {lat: 10.309369, lng: 123.911164},
        {lat: 10.309429, lng: 123.911112},
        {lat: 10.309394, lng: 123.911067}
    ];

    //

    var c1 = [
        {lat: 10.308815, lng: 123.910619},
        {lat: 10.308850, lng: 123.910664},
        {lat: 10.308910, lng: 123.910612},
        {lat: 10.308875, lng: 123.910567}
    ];

    var c2 = [
        {lat: 10.308864, lng: 123.910682},
        {lat: 10.308899, lng: 123.910727},
        {lat: 10.308959, lng: 123.910675},
        {lat: 10.308924, lng: 123.910630}
    ];

    var c3 = [
        {lat: 10.308913, lng: 123.910745},
        {lat: 10.308948, lng: 123.910790},
        {lat: 10.309008, lng: 123.910738},
        {lat: 10.308973, lng: 123.910693}
    ];

    var c4 = [
        {lat: 10.308962, lng: 123.910808},
        {lat: 10.308997, lng: 123.910853},
        {lat: 10.309057, lng: 123.910801},
        {lat: 10.309022, lng: 123.910756}
    ];

    var c5 = [
        {lat: 10.309011, lng: 123.910871},
        {lat: 10.309046, lng: 123.910916},
        {lat: 10.309106, lng: 123.910864},
        {lat: 10.309071, lng: 123.910819}
    ];

    var c6 = [
        {lat: 10.309060, lng: 123.910934},
        {lat: 10.309095, lng: 123.910979},
        {lat: 10.309155, lng: 123.910927},
        {lat: 10.309120, lng: 123.910882}
    ];

    var c7 = [
        {lat: 10.309109, lng: 123.910997},
        {lat: 10.309144, lng: 123.911042},
        {lat: 10.309204, lng: 123.910990},
        {lat: 10.309169, lng: 123.910945}
    ];

    var c8 = [
        {lat: 10.309158, lng: 123.911060},
        {lat: 10.309193, lng: 123.911105},
        {lat: 10.309253, lng: 123.911053},
        {lat: 10.309218, lng: 123.911008}
    ];

    var c9 = [
        {lat: 10.309207, lng: 123.911123},
        {lat: 10.309242, lng: 123.911168},
        {lat: 10.309302, lng: 123.911116},
        {lat: 10.309267, lng: 123.911071}
    ];

    var c10 = [
        {lat: 10.309256, lng: 123.911186},
        {lat: 10.309291, lng: 123.911231},
        {lat: 10.309351, lng: 123.911179},
        {lat: 10.309316, lng: 123.911134}
    ];

    //

    var d1 = [
        {lat: 10.308737, lng: 123.910686},
        {lat: 10.308772, lng: 123.910731},
        {lat: 10.308832, lng: 123.910679},
        {lat: 10.308797, lng: 123.910634}
    ];

    var d2 = [
        {lat: 10.308786, lng: 123.910749},
        {lat: 10.308821, lng: 123.910794},
        {lat: 10.308881, lng: 123.910742},
        {lat: 10.308846, lng: 123.910697}
    ];

    var d3 = [
        {lat: 10.308835, lng: 123.910812},
        {lat: 10.308870, lng: 123.910857},
        {lat: 10.308930, lng: 123.910805},
        {lat: 10.308895, lng: 123.910760}
    ];

    var d4 = [
        {lat: 10.308884, lng: 123.910875},
        {lat: 10.308919, lng: 123.910920},
        {lat: 10.308979, lng: 123.910868},
        {lat: 10.308944, lng: 123.910823}
    ];

    var d5 = [
        {lat: 10.308933, lng: 123.910938},
        {lat: 10.308968, lng: 123.910983},
        {lat: 10.309028, lng: 123.910931},
        {lat: 10.308993, lng: 123.910886}
    ];

    var d6 = [
        {lat: 10.308982, lng: 123.911001},
        {lat: 10.309017, lng: 123.911046},
        {lat: 10.309077, lng: 123.910994},
        {lat: 10.309042, lng: 123.910949}
    ];

    var d7 = [
        {lat: 10.309031, lng: 123.911064},
        {lat: 10.309066, lng: 123.911109},
        {lat: 10.309126, lng: 123.911057},
        {lat: 10.309091, lng: 123.911012}
    ];

    var d8 = [
        {lat: 10.309080, lng: 123.911127},
        {lat: 10.309115, lng: 123.911172},
        {lat: 10.309175, lng: 123.911120},
        {lat: 10.309140, lng: 123.911075}
    ];

    var d9 = [
        {lat: 10.309129, lng: 123.911190},
        {lat: 10.309164, lng: 123.911235},
        {lat: 10.309224, lng: 123.911183},
        {lat: 10.309189, lng: 123.911138}
    ];

    var d10 = [
        {lat: 10.309178, lng: 123.911253},
        {lat: 10.309213, lng: 123.911298},
        {lat: 10.309273, lng: 123.911246},
        {lat: 10.309238, lng: 123.911201},
    ];

    //

    var e1 = [
        {lat: 10.308659, lng: 123.910753},
        {lat: 10.308694, lng: 123.910798},
        {lat: 10.308754, lng: 123.910746},
        {lat: 10.308719, lng: 123.910701}
    ];

    var e2 = [
        {lat: 10.308708, lng: 123.910816},
        {lat: 10.308743, lng: 123.910861},
        {lat: 10.308803, lng: 123.910809},
        {lat: 10.308768, lng: 123.910764}
    ];

    var e3 = [
        {lat: 10.308757, lng: 123.910879},
        {lat: 10.308792, lng: 123.910924},
        {lat: 10.308852, lng: 123.910872},
        {lat: 10.308817, lng: 123.910827}
    ];

    var e4 = [
        {lat: 10.308806, lng: 123.910942},
        {lat: 10.308841, lng: 123.910987},
        {lat: 10.308901, lng: 123.910935},
        {lat: 10.308866, lng: 123.910890}
    ];

    var e5 = [
        {lat: 10.308855, lng: 123.911005},
        {lat: 10.308890, lng: 123.911050},
        {lat: 10.308950, lng: 123.910998},
        {lat: 10.308915, lng: 123.910953}
    ];

    var e6 = [
        {lat: 10.308904, lng: 123.911068},
        {lat: 10.308939, lng: 123.911113},
        {lat: 10.308999, lng: 123.911061},
        {lat: 10.308964, lng: 123.911016}
    ];

    var e7 = [
        {lat: 10.308953, lng: 123.911131},
        {lat: 10.308988, lng: 123.911176},
        {lat: 10.309048, lng: 123.911124},
        {lat: 10.309013, lng: 123.911079}
    ];

    var e8 = [
        {lat: 10.309002, lng: 123.911194},
        {lat: 10.309037, lng: 123.911239},
        {lat: 10.309097, lng: 123.911187},
        {lat: 10.309062, lng: 123.911142}
    ];

    var e9 = [
        {lat: 10.309051, lng: 123.911257},
        {lat: 10.309086, lng: 123.911302},
        {lat: 10.309146, lng: 123.911250},
        {lat: 10.309111, lng: 123.911205}
    ];

    var e10 = [
        {lat: 10.309100, lng: 123.911320},
        {lat: 10.309135, lng: 123.911365},
        {lat: 10.309195, lng: 123.911313},
        {lat: 10.309160, lng: 123.911268}
    ];

    //

    var f1 = [
        {lat: 10.308581, lng: 123.910820},
        {lat: 10.308616, lng: 123.910865},
        {lat: 10.308676, lng: 123.910813},
        {lat: 10.308641, lng: 123.910768}
    ];

    var f2 = [
        {lat: 10.308630, lng: 123.910883},
        {lat: 10.308665, lng: 123.910928},
        {lat: 10.308725, lng: 123.910876},
        {lat: 10.308690, lng: 123.910831}
    ];

    var f3 = [
        {lat: 10.308679, lng: 123.910946},
        {lat: 10.308714, lng: 123.910991},
        {lat: 10.308774, lng: 123.910939},
        {lat: 10.308739, lng: 123.910894}
    ];

    var f4 = [
        {lat: 10.308728, lng: 123.911009},
        {lat: 10.308769, lng: 123.911054},
        {lat: 10.308823, lng: 123.911002},
        {lat: 10.308788, lng: 123.910957}
    ];

    var f5 = [
        {lat: 10.308777, lng: 123.911072},
        {lat: 10.308812, lng: 123.911117},
        {lat: 10.308872, lng: 123.911065},
        {lat: 10.308837, lng: 123.911020}
    ];

    var f6 = [
        {lat: 10.308826, lng: 123.911135},
        {lat: 10.308861, lng: 123.911180},
        {lat: 10.308921, lng: 123.911128},
        {lat: 10.308886, lng: 123.911083}
    ];

    var f7 = [
        {lat: 10.308875, lng: 123.911198},
        {lat: 10.308910, lng: 123.911243},
        {lat: 10.308970, lng: 123.911191},
        {lat: 10.308935, lng: 123.911146}
    ];

    var f8 = [
        {lat: 10.308924, lng: 123.911261},
        {lat: 10.308959, lng: 123.911306},
        {lat: 10.309019, lng: 123.911254},
        {lat: 10.308984, lng: 123.911209}
    ];

    var f9 = [
        {lat: 10.308973, lng: 123.911324},
        {lat: 10.309008, lng: 123.911369},
        {lat: 10.309068, lng: 123.911317},
        {lat: 10.309033, lng: 123.911272}
    ];

    var f10 = [
        {lat: 10.309022, lng: 123.911387},
        {lat: 10.309057, lng: 123.911432},
        {lat: 10.309117, lng: 123.911380},
        {lat: 10.309082, lng: 123.911335}
    ];

    // Construct the polygon.
    var polygon = new google.maps.Polygon({
        paths: [a1, a2, a3, a4, a5, a6, a7, a8, a9, a10,
        b1, b2, b3, b4, b5, b6, b7, b8, b9, b10,
        c1, c2, c3, c4, c5, c6, c7, c8, c9, c10,
        d1, d2, d3, d4, d5, d6, d7, d8, d9, d10,
        e1, e2, e3, e4, e5, e6, e7, e8, e9, e10,
        f1, f2, f3, f4, f5, f6, f7, f8, f9, f10],
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35,
        map: map
    });


    //////////////
    // Define the coordinates for each grave site/tombstone as rectangles
    var graves = [
        { lat: 10.309180, lng: 123.911015, graveID: '1' },
        { lat: 10.309156, lng: 123.910903, graveID: '2' },
        { lat: 10.309128, lng: 123.910790, graveID: '3' },
        { lat: 10.309099, lng: 123.910676, graveID: '4' },
        // Add more graves here as needed
    ];

    // Create a rectangle for each grave site/tombstone and add it to the map
    graves.forEach(function(grave) {
        var rectangle = new google.maps.Rectangle({
            bounds: new google.maps.LatLngBounds(
                new google.maps.LatLng(grave.lat - 0.00005, grave.lng - 0.00005),
                new google.maps.LatLng(grave.lat + 0.00005, grave.lng + 0.00005)),
            clickable: true,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            map: map
        });// no need to edit this every addition of graves, automatic ra kay loop man (pero ari naka define ang colors)

        google.maps.event.addListener(rectangle, 'click', function() { 
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../pages/grave-explorer-process.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Process the PHP script response here if needed
                    console.log(xhr.responseText);
                    gravesiteResult = JSON.parse(xhr.responseText);
                    var status = gravesiteResult.availability;
                    console.log(status);
                    var name = gravesiteResult['nameOfDeceased'];
                    var dateOfBirth = gravesiteResult['dateOfBirth'];
                    var dateOfDeath = gravesiteResult['dateOfDeath'];
                    // var coordinates = gravesiteResult['graveCoordinates'];
                    // coordinates.split(",")
                    var coordinate = gravesiteResult['graveCoordinates'].split(",");
                    var blockNo = coordinate[0];
                    var lotNo = coordinate[1];
                    console.log(coordinate);
                    var graveImage = gravesiteResult['graveImage'];
                    var graveClassification = gravesiteResult['gravesiteClassification'];
                    var gravePrice = gravesiteResult['price'];                    
                    
                    var nameHTML = document.getElementById('name');
                    nameHTML.textContent = name;
                    var dobHTML = document.getElementById('dob');
                    dobHTML.textContent = dateOfBirth;
                    var dodHTML = document.getElementById('dod');
                    dodHTML.textContent = dateOfDeath;
                    var blockNoHTML = document.getElementById('blockNo');
                    blockNoHTML.textContent = blockNo;
                    var lotNoHTML = document.getElementById('lotNo');
                    lotNoHTML.textContent = lotNo;
                    var graveImageHTML = document.getElementById('graveImage');
                    graveImageHTML.src = "../assets/gravesite-images/" + graveImage;
                    var priceHTML = document.getElementById('price');
                    priceHTML.textContent = gravePrice;                    
                    
                    switch(graveClassification){
                        case "LL":
                            var graveClassHTML = document.getElementById('graveClass');
                            graveClassHTML.textContent = "Lawn Lot";
                            break;
                        case "FE":
                            var graveClassHTML = document.getElementById('graveClass');
                            graveClassHTML.textContent = "Family Estate";
                            break;
                        case "GN":
                            var graveClassHTML = document.getElementById('graveClass');
                            graveClassHTML.textContent = "Garden Niche";
                            break;
                        default:
                    }

                    switch(status) {
                        case "O":
                            var statusHTML = document.getElementById('status');
                            statusHTML.textContent = "Occupied";
                            document.getElementById('nameT').style.display = 'flex';
                            document.getElementById('dobT').style.display = 'flex';
                            document.getElementById('dodT').style.display = 'flex';
                            document.getElementById('graveImageT').style.display = 'flex';
                            //dont display
                            document.getElementById('graveClassT').style.display = 'none';
                            document.getElementById('priceT').style.display = 'none';
                            document.getElementById('buttonAvailableT').style.display = 'none';
                            break;
                        case "R":
                            var statusHTML = document.getElementById('status');
                            statusHTML.textContent = "Reserved";
                            document.getElementById('graveClassT').style.display = 'flex';
                            //dont display
                            document.getElementById('nameT').style.display = 'none';
                            document.getElementById('dobT').style.display = 'none';
                            document.getElementById('dodT').style.display = 'none';
                            document.getElementById('graveImageT').style.display = 'none';
                            document.getElementById('priceT').style.display = 'none';
                            document.getElementById('buttonAvailableT').style.display = 'none';
                            break;
                        case "A":
                            var statusHTML = document.getElementById('status');
                            statusHTML.textContent = "Available";
                            document.getElementById('graveClassT').style.display = 'flex';
                            document.getElementById('priceT').style.display = 'flex';
                            document.getElementById('buttonAvailableT').style.display = 'flex';
                            //dont display
                            document.getElementById('nameT').style.display = 'none';
                            document.getElementById('dobT').style.display = 'none';
                            document.getElementById('dodT').style.display = 'none';
                            break;
                        default:
                            // code block
                        }
                }
            };
            xhr.send('graveClicked=' + encodeURIComponent(grave['graveID']));
            document.getElementById('sidebar').style.display = 'flex';
            document.getElementById('sidebar').style.width = '27%';
            document.getElementById('map').style.width = '73%';
        });
    });
}