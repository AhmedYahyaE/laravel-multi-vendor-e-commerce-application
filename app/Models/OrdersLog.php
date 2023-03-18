<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersLog extends Model
{
    use HasFactory;



    // We'll use this relationship to show if the order status previewed in "Update Order Status" Section in admin/orders/order_details.blade.php is whether updated from "Update Item Status" Section (in case the `order_item_id` column is NOT zero 0) or from "Update Order Status" Section    // Check 15:22 in https://www.youtube.com/watch?v=WNCFYaSv-N4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=173
    // Relationship of an Order Log `orders_logs` table with Order_Products `orders_products` table (every Order Log has many Order_Products) (`order_item_id` column in `orders_logs` table is the foreign key to the `id` column in `orders_products` table)    // https://www.youtube.com/watch?v=4d_Hq33jihY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=164
    public function orders_products() { // vendor() in the SINGULAR!    // A Product `products` belongs to a Vendor `vendors`, and the Foreign Key of the Relationship is the `vendor_id` column
        return $this->hasMany('App\Models\OrdersProduct', 'id', 'order_item_id'); // 'order_id' (column of `orders_products` table) is the Foreign Key of the Relationship
    }

    
    // Check 21:48 in https://www.youtube.com/watch?v=WNCFYaSv-N4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=173
    public static function getItemDetails($order_item_id) {
        $getItemDetails = \App\Models\OrdersProduct::where('id', $order_item_id)->first()->toArray();


        return $getItemDetails;
    }

}
