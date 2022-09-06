<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // https://www.youtube.com/watch?v=wMJH5FrP1G8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=21
        // Note: Check DatabaseSeeder.php
        $vendorsBankDetailsRecords = [
            [
                'id'                  => 1,
                'vendor_id'           => 1,
                'account_holder_name' => 'John Cena',
                'bank_name'           => 'ICICI',
                'account_number'      => '021546545454541545454',
                'bank_ifsc_code'      => '36546655',
            ],
        ];
        // Note: Check DatabaseSeeder.php
        \App\Models\VendorsBankDetail::insert($vendorsBankDetailsRecords);
    }
}
