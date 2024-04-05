/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
let map;
let marker;
let geocoder;

async function initMap() {
    const position = { lat: 14.5806494, lng: 121.0203798 };

    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    
    map = new Map(document.getElementById("map"), {
        zoom: 11,
        center: position,
        // mapTypeControl: false,
        mapId: "e36eca20b19b9c"
    });
    geocoder = new google.maps.Geocoder();
    marker = new AdvancedMarkerElement({
        map: map,
        position: new google.maps.LatLng(14.5806494, 121.0203798),
        title: "Metro Manila"
    });
}

window.addEventListener("load", initMap);

$(document).ready(function() {

    function requestGeocode(address) {
        geocoder.geocode({
            "address": address
        }, function (results, status) {
            if (status == "OK") {
                map.setCenter(results[0].geometry.location);
                marker.position = results[0].geometry.location;

                $('#form-vendor_registration div.business-details #business_address_lat[name*="lat"]').val(Object.values(marker.position)[0])
                $('#form-vendor_registration div.business-details #business_address_lng[name*="lng"]').val(Object.values(marker.position)[1])
            }
        })
    }

    /**
     * On change of country name - load city
     */
    $('#form-vendor_registration div.personal-address .address-field[name*="country"]').change((el) => {
        let country = $(el.currentTarget).val();

        var settings = {
            "url": 'https://countriesnow.space/api/v0.1/countries/states',
            "method": "POST",
            data: {
                "country": country
            }
        };
          

        $.ajax(settings).done(function (response) {
            if (!response.error) {
                $('#form-vendor_registration div.personal-address .address-field[name*="state"] .added-through-api').remove();

                let states = response.data.states.map((state) => {
                    let newOption = $('<option>', {
                        value: state.name,
                        text: state.name,
                        class: "added-through-api"
                    });

                    return newOption;
                });
                
                $('#form-vendor_registration div.personal-address .address-field[name*="state"]').append(states);
            }
        });
    })

    /**
     * On change of state get cities
     */
    $('#form-vendor_registration div.personal-address .address-field[name*="state"]').change((el) => {
        let country = $('.address-field[name*="country"]').val();
        let state = $(el.currentTarget).val();

        var settings = {
            "url": 'https://countriesnow.space/api/v0.1/countries/state/cities',
            "method": "POST",
            data: {
                "country": country,
                "state": state
            }
        }

        $.ajax(settings).done(function (response) {
            if (!response.error) {
                $('#form-vendor_registration div.personal-address .address-field[name*="city"] .added-through-api').remove();
                
                let cities = response.data.map((city) => {
                    let newOption = $('<option>', {
                        value: city,
                        text: city,
                        class: "added-through-api"
                    });

                    return newOption;
                });
                
                $('#form-vendor_registration div.personal-address .address-field[name*="city"]').append(cities);
            }
        });
    });



    // Business Details
    /**
     * On change of country name - load city
     */
    $('#form-vendor_registration div.business-details .address-field[name*="country"]').change((el) => {
        let country = $(el.currentTarget).val();

        var settings = {
            "url": 'https://countriesnow.space/api/v0.1/countries/states',
            "method": "POST",
            data: {
                "country": country
            }
        };
          

        $.ajax(settings).done(function (response) {
            if (!response.error) {
                $('#form-vendor_registration div.business-details .address-field[name*="state"] .added-through-api').remove();

                let states = response.data.states.map((state) => {
                    let newOption = $('<option>', {
                        value: state.name,
                        text: state.name,
                        class: "added-through-api"
                    });

                    return newOption;
                });
                
                $('#form-vendor_registration div.business-details .address-field[name*="state"]').append(states);
                requestGeocode(country);
            }
        });
    })
    /**
     * On change of state get cities
     */
    $('#form-vendor_registration div.business-details .address-field[name*="state"]').change((el) => {
        let country = $('#form-vendor_registration div.business-details .address-field[name*="country"]').val();
        let state = $(el.currentTarget).val();

        var settings = {
            "url": 'https://countriesnow.space/api/v0.1/countries/state/cities',
            "method": "POST",
            data: {
                "country": country,
                "state": state
            }
        }

        $.ajax(settings).done(function (response) {
            if (!response.error) {
                $('#form-vendor_registration div.business-details .address-field[name*="city"] .added-through-api').remove();
                
                let cities = response.data.map((city) => {
                    let newOption = $('<option>', {
                        value: city,
                        text: city,
                        class: "added-through-api"
                    });

                    return newOption;
                });
                
                $('#form-vendor_registration div.business-details .address-field[name*="city"]').append(cities);
                requestGeocode(`${state}, ${country}`);
            }
        });
    });

    let business_address;
    let timeoutId;
    $('#form-vendor_registration div.business-details .address-field[name*="city"]').keyup(function (e) {
        let business_city_val = $(e.currentTarget).val();
        clearTimeout(timeoutId);
        
        let country = $('#form-vendor_registration div.business-details .address-field[name*="country"]').val();
        let state = $('#form-vendor_registration div.business-details .address-field[name*="state"]').val();
        business_address = `${business_city_val}, ${state}, ${country}`;
        timeoutId = setTimeout(() => {
            requestGeocode(business_address)
        }, 300);
    })
    

    $('#form-vendor_registration div.business-details .address-field[name*="address"]').keyup(function (e) {
        let business_address_val = $(e.currentTarget).val();
        clearTimeout(timeoutId);

        let country = $('#form-vendor_registration div.business-details .address-field[name*="country"]').val();
        let state = $('#form-vendor_registration div.business-details .address-field[name*="state"]').val();
        let city = $('#form-vendor_registration div.business-details .address-field[name*="city"]');
        business_address = `${business_address_val} ${city}, ${state}, ${country}`;
        timeoutId = setTimeout(() => {
            requestGeocode(business_address)
        }, 300);
    })

})