// Assuming 'data.json' is your JSON file
const jsonFile = "/front/js/dialingcodes.json";
var dialingcodes = [];

// Fetch the JSON file
fetch(jsonFile)
    .then((response) => {
        // Check if the response status is OK (200)
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        // Parse the JSON from the response
        return response.json();
    })
    .then((data) => {
        // Handle the JSON data
        dialingcodes = data;
    })
    .catch((error) => {
        // Handle errors
        console.error("Error fetching JSON:", error);
    });

$(document).ready(function () {
    function setMobileDialingCodes () {
        var html_dialingcodes_options = dialingcodes.map(dc => {
            let newOption = $("<option>", {
                id: "mdc-"+dc.name,
                value: dc.dial_code,
                text: `${dc.dial_code} - ${dc.name}`,
                class: "added-through-api",
            });
    
            return newOption;
        })

        $('.mobile-dialing-codes[name*="mobile-dialing-code"]').append(html_dialingcodes_options);
    }

    // Edit Delivery Addresses via AJAX (Page refresh and fill in the <input> fields with the authenticated/logged in user Delivery Addresses details from the `delivery_addresses` database table when clicking on the Edit button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js
    $(document).on("click", ".editAddress", function () {
        var addressid = $(this).data("addressid"); // We use the jQuery data() function to get the Custom HTML Attribute value
        // alert(addressid);

        setMobileDialingCodes();

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            }, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token
            url: "/get-delivery-address", // check this route in web.php
            type: "post",
            data: { addressid: addressid }, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function (resp) {
                // if the AJAX request / AJAX call is successful
                // alert(resp);

                $("#showdifferent").removeClass("collapse");
                $(".newAddress").hide();
                $(".deliveryText").text("Edit Delivery Address");

                // Select the <input> field in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php), and change its value to the value coming from the server response to the AJAX request
                $('#form-editAddress [name="delivery_id"]').val(
                    resp.address["id"]
                );
                $('#form-editAddress [name="delivery_name"]').val(
                    resp.address["name"]
                );
                $('#form-editAddress [name="delivery_address"]').val(
                    resp.address["address"]
                );
                $('#form-editAddress [name="delivery_country"]')
                    .val(resp.address["country"])
                    .change();
                $('#form-editAddress [name="mobile-dialing-code"]')
                    .val(dialingcodes.find(d => d.name == resp.address["country"]).dial_code)
                    .change();

                let address_dialcode = $('#form-editAddress [name="mobile-dialing-code"]').val();

                setTimeout(() => {
                    $('#form-editAddress [name="delivery_state"]')
                        .val(resp.address["state"])
                        .change();
                    setTimeout(() => {
                        $('#form-editAddress [name="delivery_city"]').val(
                            resp.address["city"]
                        );
                    }, 500);
                }, 500);

                $('#form-editAddress [name="delivery_pincode"]').val(
                    resp.address["pincode"]
                );
                $('#form-editAddress [name="delivery_mobile"]').val(
                    resp.address["mobile"].replace(address_dialcode, '')
                );
                $('#form-editAddress [name="delivery_lat"]').val(
                    resp.address["lat"]
                );
                $('#form-editAddress [name="delivery_lng"]').val(
                    resp.address["lng"]
                );
            },
            error: function () {
                // if the AJAX request is unsuccessful
                alert("Error");
            },
        });
    });

    // Save Delivery Addresses via AJAX (save the delivery addresses of the authenticated/logged-in user in `delivery_addresses` database table when submitting the HTML Form) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js
    $(document).on("submit", "#form-editAddress, #form-checkoutNewDeliveryAddress", function (el) {
        console.log(el.currentTarget);
        // var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp
        var formdata = $("#form-editAddress").serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            }, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token
            url: "/save-delivery-address", // check this route in web.php
            type: "post",
            data: formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function (resp) {
                // if the AJAX request / AJAX call is successful
                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                if (resp.type == "error") {
                    // if there're Validation Errors, show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the saveDeliveryAddress() method in Front/AddressController.php
                    // Hide our Preloader/Loader/Loading Page/Preloading Screen when there's an error
                    $(".loader").hide();

                    // Note: in HTML in front/products/delivery_addresses.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: account-x (e.g. account-mobile, register-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="account-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop)
                    $.each(resp.errors, function (i, error) {
                        // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                        $("#delivery-" + i).attr("style", "color: red"); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="account-name" style="color: red"></p>    )    // This is the same as:    $('#delivery-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $("#delivery-" + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'account-x' (e.g. account-mobile, account-email, ...)

                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function () {
                            $("#delivery-" + i).css({
                                display: "none",
                            });
                        }, 3000);
                    });
                } else {
                    // if there're no Validation Errors
                    window.location.href = "/checkout";
                }
            },
            error: function () {
                // if the AJAX request is unsuccessful
                alert("Error");
            },
        });
    });

    var my_form = "";
    setMobileDialingCodes();
    var countryElement = $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_country"]');
    
    // Check if the element has a value
    if (countryElement.val()) {
        my_form = "form-checkoutNewDeliveryAddress";
        // Trigger the change event
        setTimeout(function() {
            countryElement.trigger('change');
            $('#form-checkoutNewDeliveryAddress [name="mobile-dialing-code"]')
                .val(dialingcodes.find(d => d.name == countryElement.val())?.dial_code)
                .change();
        }, 500)
    }

    /**
     * On change of country name - load city
     */
    $('.address-field[name*="delivery_country"]').change(
        (el) => {
            my_form = $(el.currentTarget).closest('form').attr('id');
            let country = $(`#${my_form}`).find(el.currentTarget).val();

            var settings = {
                url: "https://countriesnow.space/api/v0.1/countries/states",
                method: "POST",
                data: {
                    country: country,
                },
            };

            $.ajax(settings).done(function (response) {
                if (!response.error) {
                    $(`#${my_form} .address-field[name*="delivery_state"] .added-through-api`).remove();

                    let states = response.data.states.map((state) => {
                        let newOption = $("<option>", {
                            value: state.name,
                            text: state.name,
                            class: "added-through-api",
                        });

                        return newOption;
                    });

                    $(`#${my_form} .address-field[name*="delivery_state"]`).append(states);
                }
            });
        }
    );

    /**
     * On change of state get cities
     */
    $(`#${my_form} .address-field[name*="delivery_state"]`).change(
        (el) => {
            let country = $(`#${my_form} .address-field[name*="delivery_country"]`).val();
            let state = $(`#${my_form}`).find(el.currentTarget).val();

            var settings = {
                url: "https://countriesnow.space/api/v0.1/countries/state/cities",
                method: "POST",
                data: {
                    country: country,
                    state: state,
                },
            };

            $.ajax(settings).done(function (response) {
                if (!response.error) {
                    $(`#${my_form} .address-field[name*="delivery_city"] .added-through-api`).remove();

                    let cities = response.data.map((city) => {
                        let newOption = $("<option>", {
                            value: city,
                            text: city,
                            class: "added-through-api",
                        });

                        return newOption;
                    });

                    $(`#${my_form} .address-field[name*="delivery_city"]`).append(cities);
                }
            });
        }
    );
});



//edit address map integration


/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
let mapEdit;
let markerEdit;
let geocoderEdit;

let mapAdd;
let markerAdd;
let geocoderAdd;


async function initMapEdit() {
    const position = { lat: 14.5806494, lng: 121.0203798 };

    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    
    mapEdit = new Map(document.getElementById("map-edit"), {
        zoom: 11,
        center: position,
        // mapTypeControl: false,
        mapId: "e36eca20b19b9c"
    });
    geocoderEdit = new google.maps.Geocoder();
    markerEdit = new AdvancedMarkerElement({
        map: mapEdit,
        position: new google.maps.LatLng(14.5806494, 121.0203798),
        title: "Metro Manila"
    });
}


async function initMapAdd() {
    const position = { lat: 14.5806494, lng: 121.0203798 };

    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    
    mapAdd = new Map(document.getElementById("map-add"), {
        zoom: 11,
        center: position,
        // mapTypeControl: false,
        mapId: "e36eca20b19b9c"
    });
    geocoderAdd = new google.maps.Geocoder();
    markerAdd = new AdvancedMarkerElement({
        map: mapAdd,
        position: new google.maps.LatLng(14.5806494, 121.0203798),
        title: "Metro Manila"
    });
}


window.addEventListener("load", () => {
    initMapEdit();
    initMapAdd();
});



$(document).ready(function() {

    function requestGeocodeEdit(address) {
        geocoderEdit.geocode({
            "address": address
        }, function (results, status) {
            if (status == "OK") {
                mapEdit.setCenter(results[0].geometry.location);
                markerEdit.position = results[0].geometry.location;

                $('#form-editAddress #shipping_address_lat[name*="lat"]').val(Object.values(markerEdit.position)[0])
                $('#form-editAddress #shipping_address_lng[name*="lng"]').val(Object.values(markerEdit.position)[1])
            }
        })
    }



    function requestGeocodeAdd(address) {
        geocoderAdd.geocode({
            "address": address
        }, function (results, status) {
            if (status == "OK") {
                mapAdd.setCenter(results[0].geometry.location);
                markerAdd.position = results[0].geometry.location;
    
                $('#form-checkoutNewDeliveryAddress #shipping_address_lat[name*="lat"]').val(Object.values(markerAdd.position)[0])
                $('#form-checkoutNewDeliveryAddress #shipping_address_lng[name*="lng"]').val(Object.values(markerAdd.position)[1])
            }
        })
    }



    /**
     * On change of country name - load city
     */
    $('#form-editAddress .address-field[name*="delivery_country"]').change((el) => {
        let countryEdit = $(el.currentTarget).val();

        var settingsEdit = {
            "url": 'https://countriesnow.space/api/v0.1/countries/states',
            "method": "POST",
            data: {
                "country": countryEdit
            }
        };
          

        $.ajax(settingsEdit).done(function (response) {
            if (!response.error) {
                $('#form-editAddress .address-field[name*="delivery_state"] .added-through-api').remove();

                let statesEdit = response.data.states.map((state) => {
                    let newOptionEdit = $('<option>', {
                        value: state.name,
                        text: state.name,
                        class: "added-through-api"
                    });

                    return newOptionEdit;
                });
                
                $('#form-editAddress .address-field[name*="delivery_state"]').append(statesEdit);
            }
        });
    })

    /**
     * On change of state get cities
     */
    $('#form-editAddress .address-field[name*="deliver_state"]').change((el) => {
        let country = $('.address-field[name*="delivery_country"]').val();
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
                $('#form-editAddress .address-field[name*="delivery_city"] .added-through-api').remove();
                
                let cities = response.data.map((city) => {
                    let newOption = $('<option>', {
                        value: city,
                        text: city,
                        class: "added-through-api"
                    });

                    return newOption;
                });
                
                $('#form-editAddress .address-field[name*="delivery_city"]').append(cities);
            }
        });
    });




    /**
     * On change of country name - load city
     */
    $('#form-editAddress .address-field[name*="delivery_country"]').change((el) => {
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
                $('#form-editAddress .address-field[name*="delivery_state"] .added-through-api').remove();

                let states = response.data.states.map((state) => {
                    let newOption = $('<option>', {
                        value: state.name,
                        text: state.name,
                        class: "added-through-api"
                    });

                    return newOption;
                });
                
                $('#form-editAddress .address-field[name*="delivery_state"]').append(states);
                requestGeocodeEdit(country);
            }
        });
    })
    /**
     * On change of state get cities
     */
    $('#form-editAddress .address-field[name*="delivery_state"]').change((el) => {
        let country = $('#form-editAddress .address-field[name*="delivery_country"]').val();
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
                $('#form-editAddress .address-field[name*="delivery_city"] .added-through-api').remove();
                
                let cities = response.data.map((city) => {
                    let newOption = $('<option>', {
                        value: city,
                        text: city,
                        class: "added-through-api"
                    });

                    return newOption;
                });
                
                $('#form-editAddress .address-field[name*="delivery_city"]').append(cities);
                requestGeocodeEdit(`${state}, ${country}`);
            }
        });
    });

    let business_addressEdit;
    let timeoutIdEdit;
    $('#form-editAddress .address-field[name*="delivery_city"]').keyup(function (e) {
        let business_city_val = $(e.currentTarget).val();
        clearTimeout(timeoutIdEdit);
        
        let country = $('#form-editAddress .address-field[name*="delivery_country"]').val();
        let state = $('#form-editAddress .address-field[name*="delivery_state"]').val();
        business_addressEdit = `${business_city_val}, ${state}, ${country}`;
        timeoutIdEdit = setTimeout(() => {
            requestGeocodeEdit(business_addressEdit)
        }, 300);
    })
    

    $('#form-editAddress .address-field[name*="address"]').keyup(function (e) {
        let business_address_val = $(e.currentTarget).val();
        clearTimeout(timeoutIdEdit);

        let country = $('#form-editAddress .address-field[name*="delivery_country"]').val();
        let state = $('#form-editAddress .address-field[name*="delivery_state"]').val();
        let city = $('#form-editAddress .address-field[name*="delivery_city"]');
        business_addressEdit = `${business_address_val} ${city}, ${state}, ${country}`;
        timeoutIdEdit = setTimeout(() => {
            requestGeocodeEdit(business_addressEdit)
        }, 300);
    })




    //ADD NEW
      /**
     * On change of country name - load city
     */
      $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_country"]').change((el) => {
        let countryAdd = $(el.currentTarget).val();

        var settingsAdd = {
            "url": 'https://countriesnow.space/api/v0.1/countries/states',
            "method": "POST",
            data: {
                "country": countryAdd
            }
        };
          

        $.ajax(settingsAdd).done(function (response) {
            if (!response.error) {
                $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_state"] .added-through-api').remove();

                let statesAdd = response.data.states.map((state) => {
                    let newOptionAdd = $('<option>', {
                        value: state.name,
                        text: state.name,
                        class: "added-through-api"
                    });

                    return newOptionAdd;
                });
                
                $('#form-editAddress .address-field[name*="delivery_state"]').append(statesAdd);
            }
        });
    })

    /**
     * On change of state get cities
     */
    $('#form-checkoutNewDeliveryAddress .address-field[name*="deliver_state"]').change((el) => {
        let country = $('.address-field[name*="delivery_country"]').val();
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
                $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_city"] .added-through-api').remove();
                
                let cities = response.data.map((city) => {
                    let newOption = $('<option>', {
                        value: city,
                        text: city,
                        class: "added-through-api"
                    });

                    return newOption;
                });
                
                $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_city"]').append(cities);
            }
        });
    });




    /**
     * On change of country name - load city
     */
    $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_country"]').change((el) => {
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
                $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_state"] .added-through-api').remove();

                let states = response.data.states.map((state) => {
                    let newOption = $('<option>', {
                        value: state.name,
                        text: state.name,
                        class: "added-through-api"
                    });

                    return newOption;
                });
                
                $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_state"]').append(states);
                requestGeocodeAdd(country);
            }
        });
    })
    /**
     * On change of state get cities
     */
    $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_state"]').change((el) => {
        let country = $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_country"]').val();
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
                $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_city"] .added-through-api').remove();
                
                let cities = response.data.map((city) => {
                    let newOption = $('<option>', {
                        value: city,
                        text: city,
                        class: "added-through-api"
                    });

                    return newOption;
                });
                
                $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_city"]').append(cities);
                requestGeocodeAdd(`${state}, ${country}`);
            }
        });
    });

    let business_addressAdd;
    let timeoutIdAdd;
    $('#form-checkoutNewDeliveryAddress .address-field[name*="delivery_city"]').keyup(function (e) {
        let business_city_val = $(e.currentTarget).val();
        clearTimeout(timeoutIdAdd);
        
        let country = $('#form-editAddress .address-field[name*="delivery_country"]').val();
        let state = $('#form-editAddress .address-field[name*="delivery_state"]').val();
        business_addressAdd = `${business_city_val}, ${state}, ${country}`;
        timeoutIdAdd = setTimeout(() => {
            requestGeocodeEdit(business_addressAdd)
        }, 300);
    })
    

    $('#form-checkoutNewDeliveryAddress .address-field[name*="address"]').keyup(function (e) {
        let business_address_val = $(e.currentTarget).val();
        clearTimeout(timeoutIdAdd);

        let country = $('#form-editAddress .address-field[name*="delivery_country"]').val();
        let state = $('#form-editAddress .address-field[name*="delivery_state"]').val();
        let city = $('#form-editAddress .address-field[name*="delivery_city"]');
        business_addressAdd = `${business_address_val} ${city}, ${state}, ${country}`;
        timeoutIdAdd = setTimeout(() => {
            requestGeocodeAdd(business_addressAdd)
        }, 300);
    })

})






