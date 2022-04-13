import L from 'leaflet';
import axios from 'axios';


// html Elements

var jours_vacci = document.querySelector('#jours_vacci')
var doses = document.querySelector('#doses')
var couverture = document.querySelector('#couverture_vaccinale')
var pers_vacci = document.querySelector('#pers_vacci')
var nbr_sites = document.querySelector('#nbr_sites')
var doses_livres = document.querySelector('#doses_livres')
var table_body = document.querySelector('#site_vacc tbody')
var table_body_ville = document.querySelector('#tab_villes tbody')
var province_name = document.querySelector('#province_name')


var map = L.map('map', {
    zoomControl: true,
    maxZoom: 28,
    minZoom: 1
}).fitBounds([
    [-10.27244102712632, 11.78521081569146],
    [4.808373156945728, 32.29619908606451]
]);

// #region handler functions
// fonctions for feature

function handle_province_polygon(feature, layer) {
    layer.on('click', function(e) {
        table_body.innerHTML = '';
        table_body_ville.innerHTML = '';
        axios.get('/sites_vaccination/' + feature.properties.ogc_fid).then(data => {
            // console.log(data.data.sites)
            let table_row = ``;
            data.data.sites.forEach(site => {
                table_row += `<tr>
                <td>${site.nom}</td>
                <td>${site.adresse}</td>
                <td>${site.horaire}</td>
                <td>${site.contact}</td>
                </tr>`;
            });
            table_body.innerHTML = table_row;
            nbr_sites.innerHTML = data.data.sites.length ? data.data.sites.length : 0
        })
        axios.get('/villes/' + feature.properties.ogc_fid).then(data => {
            let table_row = ``;
            data.data.villes.forEach(site => {
                table_row += `<tr>
                <td>${site.nom}</td>
                <td>10000</td>
                </tr>`;
            });
            table_body_ville.innerHTML = table_row;
        })
        axios.get('/province/' + feature.properties.ogc_fid).then(data => {
            let province = data.data.province_attrib
                //console.log(province)
            jours_vacci.innerHTML = province.date_debut ? province.date_debut + ' jours' : 0 + ' jours'
        })
        pers_vacci.innerHTML = feature.properties.pers_vacci ? feature.properties.pers_vacci : 0
        province_name.innerHTML = feature.properties.nom
        let intcouv = (parseInt(feature.properties.pers_vacci) / parseInt(feature.properties.pop_totale)).toFixed(4)
        couverture.innerHTML = intcouv.toString() + '%'
    });
    layer.on('mouseover', function(e) {
        e.target.setStyle({ fillColor: "#f48574", fillOpacity: .8 });
        e.target.bindPopup(feature.properties.nom);
    });
    layer.on('mouseout', function(e) {
        e.target.setStyle({ fillColor: "#c6e9a3", fillOpacity: 0.5 });
    });

}


function handle_province_points(feature, layer) {}

function province_points_style(feature) {
    return {
        pane: 'pane_points',
        radius: 10.0,
        opacity: 1,
        color: 'rgba(35,35,35,1.0)',
        dashArray: '',
        lineCap: 'butt',
        lineJoin: 'miter',
        weight: 1.0,
        fill: true,
        fillOpacity: 1,
        fillColor: 'rgba(232,112,0,1.0)',
        interactive: true,
    }
}

// #endregion

// #region bases_layer
map.createPane('pane_OpenStreetMap_1');
map.getPane('pane_OpenStreetMap_1').style.zIndex = 401;

const OpenStreetMapLayer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    pane: 'pane_OpenStreetMap_1',
    opacity: 1.0,
    attribution: '',
    minZoom: 1,
    maxZoom: 28,
    minNativeZoom: 0,
    maxNativeZoom: 19
}).addTo(map);

map.createPane('pane_GoogleSatellite_0');
map.getPane('pane_GoogleSatellite_0').style.zIndex = 400;

var layer_GoogleSatellite_0 = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    pane: 'pane_GoogleSatellite_0',
    opacity: 1.0,
    attribution: '<a href="https://www.google.at/permissions/geoguidelines/attr-guide.html">Map data ©2015 Google</a>',
    minZoom: 1,
    maxZoom: 28,
    minNativeZoom: 0,
    maxNativeZoom: 20
}).addTo(map);


axios.get('/provinces_layer').then(data => {
    let StoredData = data.data.province_layer_data;
    let provinces_data_geojson = JSON.parse(StoredData);

    //  console.log(province_attrib)

    map.createPane('pane_provinces_pays');
    map.getPane('pane_provinces_pays').style.zIndex = 403;
    map.getPane('pane_provinces_pays').style['mix-blend-mode'] = 'normal';

    let provinces_layer = L.geoJSON(provinces_data_geojson, {
        onEachFeature: handle_province_polygon,
        pane: 'pane_provinces_pays',
        layerName: 'provinces_pays',
        style: function() {
            return {
                opacity: 0.6,
                fillColor: '#c6e9a3',
                fillOpacity: 0.5
            }
        }
    }).addTo(map)

    // ajout du layer sur le control layer
    LayerControl.addOverlay(provinces_layer, 'provinces_pays')

}).catch(error => {
    console.error(error)
})

axios.get('/vaccination_layer').then(data => {
    let StoredData = data.data.dataVaccination_layer;
    let points_data_geojson = JSON.parse(StoredData);
    // var greenIcon = new L.Icon({
    //     iconUrl: '/img/pointer2.png',
    // })
    map.createPane('pane_points');
    map.getPane('pane_points').style.zIndex = 404;
    map.getPane('pane_points').style['mix-blend-mode'] = 'normal';

    let points_layer = L.geoJSON(points_data_geojson, {
        onEachFeature: handle_province_points,
        // pointToLayer: function(feature, latlng) {
        //     return L.marker(latlng, { icon: greenIcon });
        // }, pour changer l'image du point
        pane: 'pane_points',
        layerName: 'provinces_points',
        pointToLayer: function(feature, latlng) {
            var context = {
                feature: feature,
                variables: {}
            };
            return L.circleMarker(latlng, province_points_style(feature));
        },
    }).addTo(map)

    // ajout du layer des points sur le control layer
    LayerControl.addOverlay(points_layer, 'provinces_points')
}).catch(error => {
    console.error(error);
})

//#endregion

const LayerControl = L.control.layers({}, {
    OpenStreetMapLayer: OpenStreetMapLayer,
    GoogleMapLayer: layer_GoogleSatellite_0
}).addTo(map)