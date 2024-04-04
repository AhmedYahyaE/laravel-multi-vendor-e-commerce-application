/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
let map;

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
    // geocoder = new google.maps.Geocoder();
    const marker = new AdvancedMarkerElement({
        map: map,
        position: new google.maps.LatLng(14.5806494, 121.0203798),
        title: "Metro Manila"
    });
}

window.addEventListener("load", initMap);

$(document).ready(function() {
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
            }
        });
    });
})