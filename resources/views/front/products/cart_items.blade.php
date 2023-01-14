{{-- https://www.youtube.com/watch?v=8OZ5iAK8m50&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=120 --}}
{{-- Note: This whole file is 'include'-ed in front/products/cart.blade.php (to allow the AJAX call when updating orders quantities in the Cart) --}}



<!-- Products-List-Wrapper -->
<div class="table-wrapper u-s-m-b-60">
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>



            {{-- https://www.youtube.com/watch?v=I98dEyyrZLU&list=PLLUtELdNs2ZYTlQ97V1Tl8mirS3qXHNFZ&index=120 --}} {{-- https://www.youtube.com/watch?v=8OZ5iAK8m50&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=120 --}}

            {{-- We'll place this $total_price inside the foreach loop to calculate the total price of all products in Cart. Check the end of the next foreach loop before @endforeach --}}
            @php $total_price = 0 @endphp

            @foreach ($getCartItems as $item) {{-- $getCartItems is passed in from cart() method in Front/ProductsController.php --}}
                @php
                    $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']); // from the `products_attributes` table, not the `products` table
                    // dd($getDiscountAttributePrice);
                @endphp

                <tr>
                    <td>
                        <div class="cart-anchor-image">
                            <a href="{{ url('product/' . $item['product_id']) }}">
                                <img src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}" alt="Product">
                                <h6>
                                    {{ $item['product']['product_name'] }} ({{ $item['product']['product_code'] }}) - {{ $item['size'] }}
                                    <br>
                                    Color: {{ $item['product']['product_color'] }}
                                </h6>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">



                            @if ($getDiscountAttributePrice['discount'] > 0) {{-- If there's a discount on the price, show the price before (the original price) and after (the new price) the discount --}}
                                <div class="price-template">
                                    <div class="item-new-price">
                                        Rs.{{ $getDiscountAttributePrice['final_price'] }} {{-- 'Rs' means Rupees the Indian currency --}}
                                    </div>
                                    <div class="item-old-price" style="margin-left: -40px">
                                        Rs.{{ $getDiscountAttributePrice['product_price'] }}
                                    </div>
                                </div>
                            @else {{-- if there's no discount on the price, show the original price --}}
                                <div class="price-template">
                                    <div class="item-new-price">
                                        Rs.{{ $getDiscountAttributePrice['final_price'] }}
                                    </div>
                                </div>
                            @endif



                        </div>
                    </td>
                    <td>
                        <div class="cart-quantity">
                            <div class="quantity">
                                <input type="text" class="quantity-text-field" value="{{ $item['quantity'] }}">
                                <a data-max="1000" class="plus-a  updateCartItem" data-cartid="{{ $item['id'] }}" data-qty="{{ $item['quantity'] }}">&#43;</a> {{-- The Plus sign:  Increase items by 1 --}} {{-- .updateCartItem CSS class and the Custom HTML attributes data-cartid & data-qty are used to make the AJAX call in front/js/custom.js --}}
                                <a data-min="1"    class="minus-a updateCartItem" data-cartid="{{ $item['id'] }}" data-qty="{{ $item['quantity'] }}">&#45;</a> {{-- The Minus sign: Decrease items by 1 --}} {{-- .updateCartItem CSS class and the Custom HTML attributes data-cartid & data-qty are used to make the AJAX call in front/js/custom.js --}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            Rs.{{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }} {{-- price of all products (after discount (if any)) (= price (after discoutn) * no. of products) --}}
                        </div>
                    </td>
                    <td>
                        <div class="action-wrapper">
                            {{-- <button class="button button-outline-secondary fas fa-sync"></button> --}}
                            <button class="button button-outline-secondary fas fa-trash deleteCartItem" data-cartid="{{ $item['id'] }}"></button>{{-- .deleteCartItem CSS class and the Custom HTML attribute data-cartid is used to make the AJAX call in front/js/custom.js --}} {{-- https://www.youtube.com/watch?v=GCZ8a3Dw_Zg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127 --}}
                        </div>
                    </td>
                </tr>


                {{-- This is placed here INSIDE the foreach loop to calculate the total price of all products in Cart --}}
                @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
            @endforeach



        </tbody>
    </table>
</div>
<!-- Products-List-Wrapper /- -->





{{-- To solve the problem of Submiting the Coupon Code works only once, we moved the Coupon part from cart_items.blade.php to here in cart.blade.php. Check 21:39 in https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149 --}} {{-- Explanation of the problem: http://publicvoidlife.blogspot.com/2014/03/on-on-or-event-delegation-explained.html --}}





<!-- Billing -->
<div class="calculation u-s-m-b-60">
    <div class="table-wrapper-2">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Cart Totals</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">Sub Total</h3> {{-- Total Price before any Coupon discounts --}}
                    </td>
                    <td>
                        <span class="calc-text">Rs.{{ $total_price }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">Coupon Discount</h3>
                    </td>
                    <td>
                        <span class="calc-text couponAmount"> {{-- We create the 'couponAmount' CSS class to use it as a handle for AJAX inside    $('#applyCoupon').submit();    function in front/js/custom.js: https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149 --}}
                            {{-- https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149 --}}
                            @if (\Session::has('couponAmount')) {{-- We stored the 'couponAmount' in a Session Variable inside the applyCoupon() method in Front/ProductsController.php --}}
                                Rs.{{ \Session::get('couponAmount') }}
                            @else
                                Rs.0
                            @endif
                        </span>
                    </td>
                </tr>
                {{-- <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-8">Shipping</h3>
                        <div class="calc-choice-text u-s-m-b-4">Flat Rate: Not Available</div>
                        <div class="calc-choice-text u-s-m-b-4">Free Shipping: Not Available</div>
                        <a data-toggle="collapse" href="#shipping-calculation" class="calc-anchor u-s-m-b-4">Calculate Shipping
                        </a>
                        <div class="collapse" id="shipping-calculation">
                            <form>
                                <div class="select-country-wrapper u-s-m-b-8">
                                    <div class="select-box-wrapper">
                                        <label class="sr-only" for="select-country">Choose your country
                                        </label>
                                        <select class="select-box" id="select-country">
                                            <option selected="selected" value="">Choose your country...
                                            </option>
                                            <option value="">United Kingdom (UK)</option>
                                            <option value="">United States (US)</option>
                                            <option value="">United Arab Emirates (UAE)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="select-state-wrapper u-s-m-b-8">
                                    <div class="select-box-wrapper">
                                        <label class="sr-only" for="select-state">Choose your state
                                        </label>
                                        <select class="select-box" id="select-state">
                                            <option selected="selected" value="">Choose your state...
                                            </option>
                                            <option value="">Alabama</option>
                                            <option value="">Alaska</option>
                                            <option value="">Arizona</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="town-city-div u-s-m-b-8">
                                    <label class="sr-only" for="town-city"></label>
                                    <input type="text" id="town-city" class="text-field" placeholder="Town / City">
                                </div>
                                <div class="postal-code-div u-s-m-b-8">
                                    <label class="sr-only" for="postal-code"></label>
                                    <input type="text" id="postal-code" class="text-field" placeholder="Postcode / Zip">
                                </div>
                                <div class="update-totals-div u-s-m-b-8">
                                    <button class="button button-outline-platinum">Update Totals</button>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0" id="tax-heading">Tax</h3>
                        <span> (estimated for your country)</span>
                    </td>
                    <td>
                        <span class="calc-text">$0.00</span>
                    </td>
                </tr> --}}
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">Grand Total</h3> {{-- Total Price after Coupon discounts (if any) --}}
                    </td>
                    <td>
                        <span class="calc-text grand_total">Rs.{{ $total_price - \Session::get('couponAmount') }}</span> {{-- We create the 'grand_total' CSS class to use it as a handle for AJAX inside    $('#applyCoupon').submit();    function in front/js/custom.js: https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149 --}} {{-- We stored the 'couponAmount' a Session Variable inside the applyCoupon() method in Front/ProductsController.php --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Billing /- -->