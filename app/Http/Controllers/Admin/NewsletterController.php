<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    // https://www.youtube.com/watch?v=SZ9NBHi6IQo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=214



    // Render admin/subscribers/subscribers.blade.php page (Show all Newsletter subscribers in the Admin Panel)    // https://www.youtube.com/watch?v=SZ9NBHi6IQo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=214
    public function subscribers() {
        // Highlight the 'Subscribers' tab in the 'Users Management' module in the Sidebar (admin/layout/sidebar.blade.php) on the left in the Admin Panel. Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'subscribers');


        $subscribers = \App\Models\NewsletterSubscriber::get()->toArray();
        // dd($subscribers);


        return view('admin.subscribers.subscribers')->with(compact('subscribers'));
    }

    // Update Subscriber Status (active/inactive) via AJAX in admin/subscribers/subscribers.blade.php, check admin/js/custom.js    // https://www.youtube.com/watch?v=SZ9NBHi6IQo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=214
    public function updateSubscriberStatus(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';
            // exit;

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\NewsletterSubscriber::where('id', $data['subscriber_id'])->update(['status' => $status]); // $data['subscriber_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'        => $status,
                'subscriber_id' => $data['subscriber_id']
            ]);
        }
    }

    // Delete a Subscriber via AJAX in admin/subscribers/subscribers.blade.php, check admin/js/custom.js    // https://www.youtube.com/watch?v=SZ9NBHi6IQo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=214
    public function deleteSubscriber($id) { // Route Parameters: Required Parameters: https://laravel.com/docs/9.x/routing#required-parameters
        \App\Models\NewsletterSubscriber::where('id', $id)->delete(); // https://laravel.com/docs/9.x/queries#delete-statements

        $message = 'Subscriber has been deleted successfully!';
        

        return redirect()->back()->with('success_message', $message);
    }

    // Export subscribers (`newsletter_subscribers` database table) as an Excel file using Maatwebsite/Laravel Excel Package in admin/subscribers/subscribers.blade.php    // https://www.youtube.com/watch?v=HpFbynW2TCw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=217
    // Note: For creating/naming of the table headings i.e. the column names of the `newsletter_subscribers` table, check headings() method in app/Exports/subscribersExport
    public function exportSubscribers() {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\subscribersExport, 'subscribers.xlsx'); //    'subscribers.xlsx'    is the exported Excel file name
    }
}
