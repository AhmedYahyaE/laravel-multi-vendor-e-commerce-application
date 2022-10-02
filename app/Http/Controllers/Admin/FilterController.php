<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    // Dynamic Filters (of products)    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83



    public function filters() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'filters');


        $filters = \App\Models\ProductsFilter::get()->toArray();
        // dd($filters);


        return view('admin.filters.filters')->with(compact('filters'));
    }

    public function updateFilterStatus(Request $request) { // Update Filter Status using AJAX in filters.blade.php    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all();
            // dd($data); // THIS DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\ProductsFilter::where('id', $data['filter_id'])->update(['status' => $status]); // $data['filter_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'     => $status,
                'filter_id'  => $data['filter_id']
            ]);
        }
    }

    public function updateFilterValueStatus(Request $request) { // Update Filter Value Status using AJAX in filters_values.blade.php    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all();
            // dd($data); // THIS DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\ProductsFiltersValue::where('id', $data['filter_id'])->update(['status' => $status]); // $data['filter_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses 
                'status'     => $status,
                'filter_id'  => $data['filter_id']
            ]);
        }
    }

    
    // public function deleteFilter($id) { // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
    //     \App\Models\ProductsFilter::where('id', $id)->delete(); // https://laravel.com/docs/9.x/queries#delete-statements
        
    //     $message = 'Filter has been deleted successfully!';
        
    //     return redirect()->back()->with('success_message', $message);
    // }

    public function filtersValues() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'filters');


        $filters_values = \App\Models\ProductsFiltersValue::get()->toArray();
        // dd($filters);


        return view('admin.filters.filters_values')->with(compact('filters_values'));
    }
}
