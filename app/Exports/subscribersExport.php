<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class subscribersExport implements FromCollection, \Maatwebsite\Excel\Concerns\WithHeadings // https://www.youtube.com/watch?v=HpFbynW2TCw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=217
{
    // We used the    "php artisan make:export subscribersExport"   command to create this Export Class    // We're using the Maatwebsite/Laravel Excel Package to export database tables as Excel files    // https://www.youtube.com/watch?v=HpFbynW2TCw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=217



    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Exporting `newsletter_subscribers` database table
        // return \App\Models\NewsletterSubscriber::all(); // Export everything in the database table




        // Exporting some specific database table columns, not all columns
        $subscriberData = \App\Models\NewsletterSubscriber::select('id', 'email', 'created_at')->where('status', 1)->orderBy('id', 'Desc')->get();
        return $subscriberData;
    }

    // Export `newsletter_subscribers` database table as an Excel file WITH THE TABLE HEADINGS    // https://www.youtube.com/watch?v=HpFbynW2TCw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=217
    public function headings(): array {
        return ['ID', 'EMAIL', 'SUBSCRIBED ON (date)']; // We create/name the table headings of the columns we are exporting/returning from the `newsletter_subscribers` table i.e. `id`, `email` and `created_at` columns
    }

}
