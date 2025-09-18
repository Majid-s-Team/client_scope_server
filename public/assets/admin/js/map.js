
'use strict';
var locations = [],
    map,
    marker,
    markersArr = [],
    markerClusterer = null,
    drawingManager,
    drawing_color = $('#favcolor').val(),
    params = {
        search_latitude: parseFloat($('#search_latitude').val()),
        search_longitude: parseFloat($('#search_longitude').val())
    },
    infowindow,
    territory_arr = [],
    check_territory_arr = [],
    check_user_pin_arr = [],
    googleAutoComplete;

getLocation();

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((position) => {

            params.search_latitude = position.coords.latitude
            params.search_longitude = position.coords.longitude

        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

//date filter
$('.date_filter').change(function (e) {
    e.preventDefault();
    var value = $(this).val();
    if (value == 'custom') {
        $(this).parent().hide();
        $('#custom_date').show();
    } else {
        $('#custom_date').hide();
    }
})
//clear map filter
$('.clear_filter').click(function () {
    $('#custom_date').hide();
    $('.date_filter').parent().show();
    $('#search_pin_form').trigger("reset");
})

//add territory
$(".add_territory").click(function (e) {
    $('.territory_list').css("display", "none");
    $(".territory_form").css("display", "flex");
})
//territory close
$('.territory-close').click(function (e) {
    $('.territory_list').css("display", "block");
    $(".territory_form").css("display", "none");
    $(".edit_territory_form").css("display", "none");
    location.reload(true);
})
//user pin filer
$('#search_pin_form').submit(function (e) {
    e.preventDefault();
    markersArr = [];
    check_user_pin_arr = [];
    params = $(this).serialize()
    loadPins().then(function () {
        clusteringMarker()
    });
})
// territory form reset
$('.territory-close').click(function () {
    $('#add_territory_form').trigger("reset");
    $('#update_territory_form').trigger("reset");
})
// territory form submit
$('#add_territory_form').submit(function (e) {
    e.preventDefault();
    var geo_fence = $('#territory_latlng').val();
    var favcolor = $('#favcolor').val();
    var territory_title = $('#territory_title').val();
    var territory_user_id = $('#territory_user_id').val();

    if (geo_fence == '') {
        alert("Kindly draw a territory on map");
    } else if (favcolor == '') {
        alert("color field id required");
    } else if (territory_title == '') {
        alert("Name field is required");
    } else if (territory_user_id == '') {
        alert("Assign user field is required");
    } else {
        $.ajax({
            type: 'POST',
            url: base_url + '/admin/territory/save',
            data: $(this).serialize(),
            beforeSend: function () {
                $('#overlay').show();
            },
            success: function (data) {
                $('#overlay').hide();
                if (data.code == 200) {
                    alert('Territory has been added successfully');
                    location.reload(true)
                } else {
                    alert(data.message);
                }
            }
        });
    }
})
//update territory
$('#update_territory_form').submit(function (e) {
    e.preventDefault();
    var geo_fence = $(this).find('#territory_latlng').val();
    var favcolor = $(this).find('#favcolor').val();
    var territory_title = $(this).find('#territory_title').val();
    var territory_user_id = $(this).find('#territory_user_id').val();

    if (geo_fence == '') {
        alert("Kindly draw a territory on map");
    } else if (favcolor == '') {
        alert("color field id required");
    } else if (territory_title == '') {
        alert("Name field is required");
    } else if (territory_user_id == '') {
        alert("Assign user field is required");
    } else {
        $.ajax({
            type: 'POST',
            url: base_url + '/admin/territory/update',
            data: $(this).serialize(),
            beforeSend: function () {
                $('#overlay').show();
            },
            success: function (data) {
                $('#overlay').hide();
                if (data.code == 200) {
                    alert('Territory has been updated successfully');
                    location.reload(true)
                } else {
                    alert(data.message);
                }
            }
        });
    }

})
//search territory
$('input[name="territories_search"]').keyup(function (e) {
    if (e.which == 13) {
        loadTerritory(true)
    }
})

$('.select_territory').change(function () {
    loadTerritory(true)
})

$('#territory_search_btn').click(function () {
    loadTerritory(true)
})

// territory color change event
$('.favcolor').change(function () {

    drawing_color = $(this).val();
    var territory_id = $('[name="territory_id"]').val();

    if (territory_id != '') {
        if (territory_arr.length > 0) {
            for (var i in territory_arr) {
                if (territory_arr[i].id == territory_id) {

                    // territory_arr[i].fillColor   = drawing_color
                    // territory_arr[i].strokeColor = drawing_color
                    //
                    // console.log('strokeColor',territory_arr[i].strokeColor);
                    // console.log('fillColor',territory_arr[i].fillColor);
                    //
                    // drawingManager.setOptions(territory_arr[i])
                    // drawingManager.setMap(map);
                }
            }
        }
    } else {
        drawingManager.setOptions({
            polygonOptions: {
                editable: true,
                draggable: false,
                strokeColor: drawing_color,
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: drawing_color,
                fillOpacity: 0.35,
            }
        });
        drawingManager.setMap(map);
    }
})

$(document).on('click', '.add_territory', function () {
    //drawing map
    drawingManager = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.POLYGON,
        drawingControl: false,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [
                google.maps.drawing.OverlayType.POLYGON,
            ],
        },
        polygonOptions: {
            editable: true,
            draggable: false,
            strokeColor: drawing_color,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: drawing_color,
            fillOpacity: 0.35,
        }
    });
    drawingManager.setMap(map);

    google.maps.event.addListener(drawingManager, 'overlaycomplete', function (event) {
        if (event.type == 'polygon') {
            let polygonArray = [];
            drawingManager.setMap(null);
            var overlay = event.overlay;
            var getPath = overlay.getPath();
            var coordinates_aray = getPath.getArray();
            for (var index = 0; index < getPath.getLength(); index++) {
                var latLngObj = {};
                latLngObj.latitude = coordinates_aray[index].lat();
                latLngObj.longitude = coordinates_aray[index].lng();
                polygonArray.push(latLngObj);
            }
            $('#territory_latlng').val(JSON.stringify(polygonArray));
            $('#add_center_point').val(JSON.stringify(calculateCenterPoint(polygonArray)));

            google.maps.event.addListener(getPath, 'set_at', function (event) {

                var coordinates_aray = getPath.getArray();
                for (var index = 0; index < getPath.getLength(); index++) {
                    var latLngObj = {};
                    latLngObj.latitude = coordinates_aray[index].lat();
                    latLngObj.longitude = coordinates_aray[index].lng();
                    polygonArray.push(latLngObj);
                }
                $('#territory_latlng').val(JSON.stringify(polygonArray));
                $('#add_center_point').val(JSON.stringify(calculateCenterPoint(polygonArray)));
            });

            google.maps.event.addListener(getPath, 'insert_at', function (event) {

                var polygonArray = [];
                var coordinates_aray = getPath.getArray();
                for (var index = 0; index < getPath.getLength(); index++) {
                    var latLngObj = {};
                    latLngObj.latitude = coordinates_aray[index].lat();
                    latLngObj.longitude = coordinates_aray[index].lng();
                    polygonArray.push(latLngObj);
                }
                $('#territory_latlng').val(JSON.stringify(polygonArray));
                $('#add_center_point').val(JSON.stringify(calculateCenterPoint(polygonArray)));
            });

        }
    });


})

$(document).on('click', '.user_pin_filter, .territory-close', function () {
    if (typeof drawingManager != 'undefined') {
        drawingManager.setMap(null);
    }
})

$(document).on('click', '.user_pin_filter', function () {
    if ($('#pills-filter').hasClass('show')) {
        $('#pills-tabContent').toggle();
    }
})

$(document).on('click', '.territory', function () {
    if ($('#pills-terr').hasClass('show')) {
        $('#pills-tabContent').toggle();
    }
})

$(document).on('click', '.edit_territory', function (e) {
    e.preventDefault();

    $('#_clear_territory').remove();

    if (!$('.nav-item .territory').hasClass('show')) {
        $('.nav-item').find('.territory').trigger('click');
    }

    var record = $(this).data('record');

    var LatLng = JSON.parse(record.geofence_detail);
    LatLng = { lat: LatLng[0].latitude, lng: LatLng[0].longitude }

    map.setCenter(LatLng);
    map.setZoom(15);

    var update_form = $('#update_territory_form');

    update_form.find('#favcolor').val(record.color);
    update_form.find('#universe').val(record.universe);
    update_form.find('#territory_title').val(record.title);

    update_form.find('[name="assignee_user_id[]"] option').each(function () {
        if (record.assignee_user.length > 0) {
            var option = $(this);
            var assignee_user_id = $(this).val();
            for (var i in record.assignee_user) {
                if (record.assignee_user[i].id == assignee_user_id) {
                    option.prop('selected', true);
                }
            }
        }
    })
    update_form.find('[name="geofence_detail"]').val(record.geofence_detail);
    update_form.find('[name="territory_id"]').val(record.id);
    update_form.find('[name="center_point"]').val(record.center_point);

    $('.territory_user_id').select2();

    $(".edit_territory_form").css("display", "flex");
    $('.territory_list').css("display", "none");

    //enable drawing manager tool
    drawingManager = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.POLYGON,
        drawingControl: false,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [
                google.maps.drawing.OverlayType.POLYGON,
            ],
        }
    });

    for (var teritory_index in territory_arr) {
        if (territory_arr[teritory_index].id == record.id) {

            let edit_territory = territory_arr[teritory_index];
            edit_territory.setOptions({
                editable: true,
            })

            let getPath = territory_arr[teritory_index].getPath();
            google.maps.event.addListener(getPath, 'set_at', function (event) {

                var polygonArray = [];
                var coordinates_aray = getPath.getArray();
                for (var index = 0; index < getPath.getLength(); index++) {
                    var latLngObj = {};
                    latLngObj.latitude = coordinates_aray[index].lat();
                    latLngObj.longitude = coordinates_aray[index].lng();
                    latLngObj.lat = coordinates_aray[index].lng();
                    latLngObj.lng = coordinates_aray[index].lng();
                    polygonArray.push(latLngObj);
                }
                $('#edit_territory_latlng').val(JSON.stringify(polygonArray));
                $('#edit_center_point').val(JSON.stringify(calculateCenterPoint(polygonArray)));

            });

            google.maps.event.addListener(getPath, 'insert_at', function (event) {
                var polygonArray = [];
                var coordinates_aray = getPath.getArray();
                for (var index = 0; index < getPath.getLength(); index++) {
                    var latLngObj = {};
                    latLngObj.latitude = coordinates_aray[index].lat();
                    latLngObj.longitude = coordinates_aray[index].lng();
                    latLngObj.lat = coordinates_aray[index].lng();
                    latLngObj.lng = coordinates_aray[index].lng();
                    polygonArray.push(latLngObj);
                }
                $('#edit_territory_latlng').val(JSON.stringify(polygonArray));
                $('#edit_center_point').val(JSON.stringify(calculateCenterPoint(polygonArray)));
            });
            break;
        }

    }

})
//select all status
$('#select_all_status').click(function () {
    if ($(this).is(':checked')) {
        $('input[name="pin_status_id[]"]').prop('checked', true);
    } else {
        $('input[name="pin_status_id[]"]').prop('checked', false);
    }
})

//show selected territory
$('.select_territory').click(function (e) {

    if (territory_arr.length > 0) {
        for (var t = 0; t < territory_arr.length; t++) {
            territory_arr[t].setMap(null);
        }
        territory_arr = [];
        check_territory_arr = [];
    }
    loadTerritory();
})

$('#_clear_territory').click(function () {
    if (territory_arr.length > 0) {
        for (var t = 0; t < territory_arr.length; t++) {
            territory_arr[t].setMap(null);
        }
        territory_arr = [];
        check_territory_arr = [];
    }

    $('.select_all_territory').prop('checked', false)
    $('.select_territory').prop('checked', false)
})

$('.select_all_territory').click(function () {

    if (territory_arr.length > 0) {
        for (var t = 0; t < territory_arr.length; t++) {
            territory_arr[t].setMap(null);
        }
        territory_arr = [];
        check_territory_arr = [];
    }

    if ($(this).is(':checked')) {
        $('.select_territory').prop('checked', true)
        loadTerritory();
    } else {
        $('.select_territory').prop('checked', false)
    }
})

//move territory
$('.move_territory').click(function (e) {
    e.preventDefault();
    var record = $(this).data('record');
    var LatLng = JSON.parse(record.geofence_detail);
    LatLng = { lat: LatLng[0].latitude, lng: LatLng[0].longitude }

    map.setCenter(LatLng);
    map.setZoom(13);
})

//delete territory
$('.delete_territory').click(function (e) {
    e.preventDefault();
    var ele = $(this);
    var msg = confirm("Are you sure you want to continue?");
    if (msg) {
        $.ajax({
            type: 'POST',
            url: base_url + '/admin/territory/delete',
            data: { id: ele.attr('id') },
            beforeSend: function () {
                $('#overlay').show()
            },
            success: function (data) {
                $('#overlay').hide()
                alert(data.message);
                if (data.code == 200) {
                    location.reload(true);
                }
            }
        });
    } else {
        return false
    }
})
$(document).on('click', '#_close_territory_sidebar', function (e) {
    e.preventDefault();
    $(".new-box-area").show();
    $('#drawer').addClass('d-none');
})
//delete pin
$(document).on('click', '.delete_pin', function (e) {
    e.preventDefault()
    var element = $(this);
    var msg = confirm('Are you sure you want to continue?');
    if (msg) {
        $.ajax({
            type: 'POST',
            url: base_url + '/admin/user-pin/delete',
            data: { id: element.attr('id') },
            beforeSend: function () {
                $('#overlay').show();
            },
            success: function (data) {
                $('#overlay').hide();
                alert(data.message);
                location.reload(true);
            }
        });
    } else {
        return false;
    }
})
//auto complete
function GoogleAutoComplete(element = 'googleautocomplete') {
    googleAutoComplete = new google.maps.places.Autocomplete(document.getElementById(element));
    googleAutoComplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
    var place = googleAutoComplete.getPlace();
    var lat = place.geometry.location.lat();
    var long = place.geometry.location.lng();

    $('#search_latitude').val(lat);
    $('#search_longitude').val(long);

    var noPoi = [
        {
            featureType: "poi",
            stylers: [
                { visibility: "off" }
            ]
        }
    ];
    map.setOptions({ styles: noPoi });
    map.setCenter(new google.maps.LatLng(lat, long));
    map.setZoom(15);
}

function initMap() {
    let myLatLng = { lat: params.search_latitude, lng: params.search_longitude };
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: myLatLng,
        mapTypeControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
        },
        zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP,
        },
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP,
        },
    });

    //map zoom in & out event
    map.addListener("zoom_changed", () => {
        $('#search_latitude').val(map.getCenter().lat());
        $('#search_longitude').val(map.getCenter().lng());
        loadPins().then(function () {
            clusteringMarker()
        });
        loadTerritory();
    });
    // map drag event
    map.addListener('dragend', () => {
        $('#search_latitude').val(map.getCenter().lat());
        $('#search_longitude').val(map.getCenter().lng());
        loadPins().then(function () {
            clusteringMarker()
        });
        loadTerritory();
    });

    var noPoi = [
        {
            featureType: "poi",
            stylers: [
                { visibility: "off" }
            ]
        }
    ];
    map.setOptions({ styles: noPoi });

    if (user_pin != '') {
        map.setCenter(new google.maps.LatLng(parseFloat(user_pin.latitude), parseFloat(user_pin.longitude)));
        map.setZoom(19);
    }

    loadPins().then(function () {
        clusteringMarker()
    });
    loadTerritory();
}

function clusteringMarker() {
    if (markerClusterer) {
        markerClusterer.clearMarkers();
    }
    markerClusterer = new MarkerClusterer(map, markersArr, {
        imagePath:
            "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
    });
}

function getPins(cb) {
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/map/get-pins',
        data: $('#search_pin_form').serialize(),
        beforeSend: function () {

        },
        success: function (data) {
            cb(data)
        }
    });
}

function loadPins() {
    $('#filter_error_msg').hide();
    return new Promise(function (resolve, reject) {

        infowindow = new google.maps.InfoWindow();
        getPins(function (data) {
            //show validation message
            if (data.code != 200) {
                let validation_msg_html = '<div class="alert alert-danger">';
                let validation_messages = Object.values(data.data);
                for (var index in validation_messages) {
                    validation_msg_html += '<p>' + validation_messages[index] + '</p>';
                }
                validation_msg_html += '</div>';
                $('#filter_error_msg').html(validation_msg_html);
                $('#filter_error_msg').show();
                return;
            }
            //load pins
            let res = data.data;
            console.log(res, "RES")
            if (res.length > 0) {
                for (var i = 0; i < res.length; i++) {

                    if (check_user_pin_arr.indexOf(res[i].id) == -1 && res[i].pin_status != null) {
                        let pin_status_count;
                        if (res[i].pin_status_history === null || res[i].pin_status_history === '') {
                            pin_status_count = '0';
                        } else {
                            pin_status_count = res[i].pin_status_history.length.toString();
                        }
                        locations.push([res[i].house_address, res[i].latitude, res[i].longitude]);
                        const image = {
                            url: res[i].pin_status.image_url,
                            scaledSize: new google.maps.Size(40, 40), // scaled size
                            origin: new google.maps.Point(0, 0), // origin
                            anchor: new google.maps.Point(0, 0) // anchor
                        };

                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(res[i].latitude, res[i].longitude),
                            map: map,
                            icon: image,
                            user_pin_id: res[i].id,
                            user_pin: res[i],
                            label: {
                                text: pin_status_count,
                                fontWeight: 'bold',
                                fontSize: '18px'
                            }
                        });

                        check_user_pin_arr.push(res[i].id)
                        markersArr.push(marker);

                        if (user_pin != '') {
                            if (res[i].id == user_pin.id) {
                                var appointment_date;
                                var appointment_time;
                                if (res[i].appointment == null || res[i].appointment == '' || res[i].appointment.length == 0) {
                                    appointment_date = '';
                                    appointment_time = '';
                                } else {
                                    appointment_date = moment(res[i].appointment.start_datetime).format('MM-DD-YYYY');
                                    appointment_time = res[i].appointment.start_datetime.split(' ')[1]
                                }
                                infowindow.setContent(
                                    `
                                    <div class="col-12">
                                        <div class="pin-detail">
                                                <div>
                                                    <p class="font-18">Pin Details</p>
                                                </div>
                                                <div>
                                                <button type="button" class="close_map_window hide_pin_detail" aria-label="Close">
                                                    <img src="/assets/img/cross-icon.png">
                                                </button>
                                                </div>
                                            <div>
                                        </div>
                                        <div class="detail-body">
                                            <div class="detail-head">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="font-18">${res[i].name == null ? '' : res[i].name}</p>
                                                        <p class="color-light mt-2">${res[i].house_address}</p>
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="filter-btn-without-icon bg-orange">
                                                            Filters
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p class="color-light mt-3 mb-1">Status</p>
                                                        <span class="table-circle cirlce-orange"></span><span class="ms-2">${res[i].pin_status.title}</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <p class="color-light mt-3 mb-1">${res[i].pin_status.title} </p>
                                                        <p>${appointment_date}, ${appointment_time}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-center mt-2 color-light" onclick="pinDetailPopup(${res[i].id})">View More</p>
                                        </div>
                                    </div>
                                
                                
                            `)
                            
                                infowindow.open(map, marker);
                            }
                        }

                        google.maps.event.addListener(marker, 'click', (function (marker, i) {
                            console.log("marker",marker)
                            $(".new-box-area").hide();
                            $("#drawer").hide();
                            return function () {
                                var appointment_date;
                                var appointment_time;
                                if (res[i].appointment == null || res[i].appointment == '' || res[i].appointment.length == 0) {
                                    appointment_date = '';
                                    appointment_time = '';
                                } else {
                                    appointment_date = moment(res[i].appointment.start_datetime).format('MM-DD-YYYY');
                                    appointment_time = res[i].appointment.start_datetime.split(' ')[1]
                                }
                                infowindow.setContent(`
                                    <div class="col-12">
                                        <div class="pin-detail">
                                            <div>
                                                <p class="font-18">Pin Details</p>

                                            </div>
                                            <div>
                                            <button type="button" class="close_map_window hide_pin_detail" aria-label="Close">
                                                    <img src="/assets/img/cross-icon.png">
                                            </button>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="detail-body">
                                            <div class="detail-head">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="font-18">${res[i].name == null ? '' : res[i].name}</p>
                                                        <p class="color-light mt-2">${res[i].house_address}</p>
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="filter-btn-without-icon bg-orange">
                                                            Filters
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p class="color-light mt-3 mb-1">Status</p>
                                                        <span class="table-circle cirlce-orange"></span><span class="ms-2">${res[i].pin_status.title}</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <p class="color-light mt-3 mb-1">Status</p>
                                                        <p>${appointment_date}, ${appointment_time}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-center mt-2 color-light" onclick="pinDetailPopup(${res[i].id})">View More</p>
                                        </div>
                                    </div>
                                `)
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                    }
                }
            } else {
                for (let i = 0; i < markersArr.length; i++) {
                    markersArr[i].setMap(null);
                }
                markersArr = [];
                check_user_pin_arr = [];
            }
            resolve(true);
        });
    })
}

function pinDetailPopup(user_pin_id) {
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/user-pin/edit/' + user_pin_id,
        beforeSend: function () {
            $('#overlay').show();
        },
        success: function (data) {
            $(".detail-body").append(data);
            $('#overlay').hide();
            // $('#update_pin_modal').html(data)
            // $('#pinDetail').modal('show');
        }
    });
}

function loadTerritory(is_search = false) {
    if (is_search == true) {
        check_territory_arr = [];
    }
    let territory_ids = [];
    $('.select_territory').each(function () {
        if ($(this).is(':checked')) {
            territory_ids.push($(this).val());
        }
    })
    $.ajax({
        type: 'GET',
        url: base_url + '/admin/territory/get',
        data: {
            keyword: $('input[name="territories_search"]').val(),
            latitude: params.search_latitude,
            longitude: params.search_longitude,
            territory_ids: territory_ids,
            device_type: 'web'
        },
        success: function (data) {
            if (data.code == 200) {
                if (data.data.length > 0) {
                    var territories = data.data;
                    console.log(territories);
                    for (var i = 0; i < territories.length; i++) {
                        if (check_territory_arr.indexOf(territories[i].id) == -1) {
                            var coordinates = [];
                            var latLng = JSON.parse(territories[i].geofence_detail);
                            for (var index in latLng) {
                                var obj = {
                                    lat: latLng[index].latitude,
                                    lng: latLng[index].longitude,
                                }
                                coordinates.push(obj);
                            }
                            var territory_polygon = new google.maps.Polygon({
                                map,
                                paths: coordinates,
                                strokeColor: territories[i].color,
                                strokeOpacity: 0.8,
                                strokeWeight: 2,
                                fillColor: territories[i].color,
                                fillOpacity: 0.1,
                                draggable: false,
                                geodesic: true,
                                title: territories[i].title,
                                id: territories[i].id,
                                territory_data: territories[i]
                            });
                            territory_arr.push(territory_polygon);
                            check_territory_arr.push(territories[i].id);

                            google.maps.event.addListener(territory_polygon, 'click', function (event) {
                                $(".new-box-area").hide();
                                let assignee_territory_user = '';
                                let area_activity = '';
                                let territory_data = this.territory_data;

                                for (var i = 0; i < territory_data.assignee_user.length; i++) {
                                    assignee_territory_user += `<div class="active-territories-user d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="territories-user-img">
                                                <img src="${territory_data.assignee_user[i].image_url}" alt="" class="img-fluid" />
                                            </div>
                                            <div class="ms-3">
                                                <p>${territory_data.assignee_user[i].name}</p>
                                                <p class="font-12 color-light">12/5/2023</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt="" class="img-fluid" />
                                        </div>
                                    </div>
                                    `
                                }
                                for (var i = 0; i < territory_data.pin_status.length; i++) {
                                    let color_class="bg-orange";
                                    if(territory_data.pin_status[i].title=='Sale'){
                                        color_class="bg-aqua";
                                    }
                                    if(territory_data.pin_status[i].title=='Contact'){
                                        color_class="bg-pink";
                                    }
                                    console.log(territory_data.pin_status[i].title);
                                    area_activity += ` <div class="active-territories-user d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="territories-user-para ">
                                              <p class="${color_class}"></p>
                                            </div>
                                            <div class="ms-3">
                                                <p>${territory_data.pin_status[i].title}</p>
                                               
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-14 color-light">${territory_data.pin_status[i].total_pin}</p>
                                        </div>
                                    </div>
                                    `;
                                }
                    let contentString = `<div class="user-territories">
                                <div class="user-territories-header">
                                    <p class="font-18">${territory_data.title}</p>
                                    <div id="_close_territory_sidebar" class="close-img"> <img src="/assets/images/close-img.png" /></div>
                                </div>
                        <div class="terrain-box">
                            <p class="font-16 mb-3">${territory_data.universe}</p>
                            <p class="font-14 color-light">26</p>
                            <p class="font-16 mt-3">Terrain</p>
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="terrain-img">
                                        <img src="/assets/img/terrain-img.png" alt="" class="img-fluid mt-4" / onclick="changeMapType('terrain')">

                                    </div>
                                    <p class="text-center mt-2">Street</p>
                                </div>
                                <div>
                                    <div class="terrain-img">
                                        <img src="/assets/img/terrain-img.png" alt="" class="img-fluid mt-4"  onclick="changeMapType('satellite')" />

                                    </div>
                                    <p class="text-center mt-2">Satellite</p>
                                </div>
                                <div>
                                    <div class="terrain-img">
                                        <img src="/assets/img/terrain-img.png" alt="" class="img-fluid mt-4" onclick="changeMapType('hybrid')" />

                                    </div>
                                    <p class="text-center mt-2">Hybrid</p>
                                </div>
                            </div>
                        </div>
                        <div class="territories-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Active Users</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Area Activity</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="tab-pane-territories mt-3 territory">
                                    ${assignee_territory_user}
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                    <div class="tab-pane-territories mt-3 activity" style="display:none;">
                                        
                                    ${area_activity}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                                $('#drawer').html(contentString);
                                $('#drawer').removeClass('d-none')
                            });

                            google.maps.event.addListener(territory_polygon, 'mouseout', function (event) {
                                //infowindow.opeshown(false);
                            });
                        }
                    }
                    if (is_search) {
                        console.log('coordinates', coordinates);
                        var LatLng = calculateCenterPoint(coordinates);
                        console.log('LatLng', LatLng);
                        LatLng = { lat: LatLng.latitude, lng: LatLng.longitude }
                        map.setCenter(LatLng);
                        map.setZoom(13);
                    }
                }
            }
        }
    })

    
}

function calculateCenterPoint(points = []) {
    let latitude = 0;
    let longitude = 0;
    const n = points.length;
    for (const point of points) {
        latitude += typeof point.latitude == 'undefined' ? point.lat : point.latitude;
        longitude += typeof point.longitude == 'undefined' ? point.lng : point.longitude;
    }

    return {
        latitude: latitude / n, longitude: longitude / n
    }
}

function changeMapType(type){
map.setMapTypeId(type);

}

$(document).on("click","#home-tab,#profile-tab",function(){
    if($(this).attr('id')=='home-tab'){
        $(".territory").show();
        $(".activity").hide();
    }else{
        $(".territory").hide();
        $(".activity").show();
    }
})


$(document).on("click",'.hide_pin_detail',function(){
    $(".new-box-area").show();
    $(".pin-detail").hide();
    $(".detail-body").hide();
});
    
