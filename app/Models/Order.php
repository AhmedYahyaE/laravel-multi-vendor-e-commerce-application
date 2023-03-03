<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Note: For the Orders module, we created two database tables: orders and orders_products tables. The first one holds/stores the main information about the orders of a user (e.g. delivery address, coupon code, shipping, payment method, ...etc), and the second one holds/stores the detailed information about the order (the items/products that are bought by the order and product name, code, color, size, price, ...etc). There is a one-to-many relationship between the two tables where one order can have many order products.



    // Relationship of an Order `orders` table with Order_Products `orders_products` table (every Order has many Order_Products)    // https://www.youtube.com/watch?v=4d_Hq33jihY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=164
    public function orders_products() { // vendor() in the SINGULAR!    // A Product `products` belongs to a Vendor `vendors`, and the Foreign Key of the Relationship is the `vendor_id` column
        return $this->hasMany('App\Models\OrdersProduct', 'order_id'); // 'order_id' (column of `orders_products` table) is the Foreign Key of the Relationship
    }
}
