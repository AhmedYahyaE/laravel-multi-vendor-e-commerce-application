{{-- This page is 'include'-ed in front/products/checkout.blade.php, and will be used by jQuery AJAX to reload it, check front/js/custom.js --}}


    <!-- Form-Fields /- -->
    <h4 class="section-h4 deliveryText">Add New Delivery Address</h4> {{-- We created that deliveryText CSS class to use the HTML element as a handle for jQuery to change the <h4> content when clicking the Edit button --}}
    <div class="u-s-m-b-24">
        <input type="checkbox" class="check-box" id="ship-to-different-address" data-toggle="collapse" data-target="#showdifferent">


        
        
        @if (count($deliveryAddresses) > 0) {{-- Checking if there are any $deliveryAddreses for the currently authenticated/logged-in user --}} {{-- $deliveryAddresses variable is passed in from checkout() method in Front/ProductsController.php --}}
            <label class="label-text newAddress" for="ship-to-different-address">Ship to a different address?</label>
        @else {{-- if there're no already existing delivery addresses --}}
            <label class="label-text newAddress" for="ship-to-different-address">Check to add Delivery Address</label>
        @endif

    </div>
    <div class="collapse" id="showdifferent">
        <!-- Form-Fields -->

        {{-- Note: To show the form's Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend), we create a <p> tag after every <input> field --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
        <form id="addressAddEditForm" action="javascript:;" method="post">
            @csrf


            <input type="hidden" name="delivery_id"> {{-- We created this hidden <input> field to submit the delivery address id when this HTML Form is submitted via AJAX to save the delivery address in the `delivery_addresses` database table. Check the Save Delivery Addresses via AJAX function in front/js/custom.js file --}} 
            <div class="group-inline u-s-m-b-13">
                <div class="group-1 u-s-p-r-16">
                    <label for="delivery_name">Name
                        <span class="astk">*</span>
                    </label>
                    <input class="text-field" type="text" id="delivery_name" name="delivery_name">
                    <p id="delivery-delivery_name"></p>                         {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                </div>
                <div class="group-2">
                    <label for="delivery_address">Address
                        <span class="astk">*</span>
                    </label>
                    <input class="text-field" type="text" id="delivery_address" name="delivery_address">
                    <p id="delivery-delivery_address"></p>                                {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                </div>
            </div>
            <div class="group-inline u-s-m-b-13">
                <div class="group-1 u-s-p-r-16">
                    <label for="delivery_city">City
                        <span class="astk">*</span>
                    </label>
                    <input class="text-field" type="text" id="delivery_city" name="delivery_city">
                    <p id="delivery-delivery_city"></p>                         {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}                    
                </div>
                <div class="group-2">
                    <label for="delivery_state">State
                        <span class="astk">*</span>
                    </label>
                    <input class="text-field" type="text" id="delivery_state" name="delivery_state">
                    <p id="delivery-delivery_state"></p>                        {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}                    
                </div>
            </div>
            <div class="u-s-m-b-13">
                <label for="select-country-extra">Country
                    <span class="astk">*</span>
                </label>
                <div class="select-box-wrapper">
                    <select class="select-box" id="delivery_country" name="delivery_country">
                        <option value="">Select Country</option>

                        @foreach ($countries as $country) {{-- $countries was passed from UserController to view using compact() method --}}
                            <option value="{{ $country['country_name'] }}"  @if ($country['country_name'] == \Illuminate\Support\Facades\Auth::user()->country) selected @endif>{{ $country['country_name'] }}</option>
                        @endforeach

                    </select>
                    <p id="delivery-delivery_country"></p>                      {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}                    
                </div>
            </div>
            <div class="u-s-m-b-13">
                <label for="delivery_pincode">Pincode
                    <span class="astk">*</span>
                </label>
                <input class="text-field" type="text" id="delivery_pincode" name="delivery_pincode">
                <p id="delivery-delivery_pincode"></p>                      {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}                    
            </div>
            <div class="u-s-m-b-13">
                <label for="delivery_mobile">Mobile
                    <span class="astk">*</span>
                </label>
                <input class="text-field" type="text" id="delivery_mobile" name="delivery_mobile">
                <p id="delivery-delivery_mobile"></p>                       {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}                    
            </div>
            <div class="u-s-m-b-13">
                <button style="width: 100%" type="submit" class="button button-outline-secondary">Save</button> {{-- Save whether it's Add or Edit --}} 
            </div>

        </form>

        <!-- Form-Fields /- -->



    </div>
    <div>
        <label for="order-notes">Order Notes</label>
        <textarea class="text-area" id="order-notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
    </div>