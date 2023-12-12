<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\ProductsFilter;
use App\Models\ProductsFiltersValue;

class FilterController extends Controller
{
    // Dynamic Filters in the Admin Panel (of products)    



    public function filters() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'filters');


        $filters = ProductsFilter::get()->toArray();
        // dd($filters);


        return view('admin.filters.filters')->with(compact('filters'));
    }

    public function updateFilterStatus(Request $request) { // Update Filter Status using AJAX in filters.blade.php    
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            ProductsFilter::where('id', $data['filter_id'])->update(['status' => $status]); // $data['filter_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'    => $status,
                'filter_id' => $data['filter_id']
            ]);
        }
    }

    public function updateFilterValueStatus(Request $request) { // Update Filter Value Status using AJAX in filters_values.blade.php    
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            ProductsFiltersValue::where('id', $data['filter_id'])->update(['status' => $status]); // $data['filter_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses 
                'status'    => $status,
                'filter_id' => $data['filter_id']
            ]);
        }
    }

    public function filtersValues() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'filters');


        $filters_values = ProductsFiltersValue::get()->toArray();
        // dd($filters);


        return view('admin.filters.filters_values')->with(compact('filters_values'));
    }

    public function addEditFilter(Request $request, $id = null) { // If the $id is not passed, this means 'Add a Filter', but if it's passed, this means 'Edit the Filter'    
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'filters');


        // FIRSTLY, IF THE REQUEST METHOS IS 'GET', THEN RENDER THE add_edit_filter.blade.php PAGE:
        if ($id == '') { // if there's no $id passed in the route/URL parameters, this means 'Add a new Filter'
            $title   = 'Add Filter Columns';
            $filter  = new ProductsFilter;
            $message = 'Filter added successfully!';
        } else { // if the $id is passed in the route/URL parameter, this means Edit (Update) the Filter
            $title   = 'Edit Filter Columns';
            $filter  = ProductsFilter::find($id);
            $message = 'Filter updated successfully!';
        }


        // SECONDLY, IF THE REQUEST METHOS IS 'POST', THEN SUBMIT THE HTML <form> IN add_edit_filter.blade.php PAGE (WHETHER ADD OR UPDATE A BANNER):
        if ($request->isMethod('post')) { // WHETHER Add or Update <form> submission!!
            $data = $request->all();
            // dd($data);

            $cat_ids = implode(',', $request['cat_ids']); // implode() converts array to string (to be able to store data as a string in `cat_ids` column of the `products_filters` database table)    // Note:    $request['cat_ids']    comes form the <select>s box "value" HTML attributes (Select Category) (using the "multiple" HTML attribute in the <select>) in add_edit_filter.blade.php


            // Important Note: A DATABASE TRANSACTION!: We'll save the inserted data (whether Add or Update a Filter) in `products_filters` database table, and then save the inserted `filter_column` value as a new column in `products` database table after `description` column    // Database Transactions: https://laravel.com/docs/9.x/database#database-transactions
            // Firstly: Save inserted data (whether Add or Update a Filter) in `products_filters` database table
            $filter->cat_ids       = $cat_ids;
            $filter->filter_name   = $data['filter_name'];
            $filter->filter_column = $data['filter_column'];
            $filter->status        = 1;

            $filter->save(); // save inserted data (whether Add or Update a Filter) in `products_filters` database table


            // Secondly: Save inserted `filter_column` as a new column in `products` database table after `description` column
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE `products` ADD ' . $data['filter_column'] . ' VARCHAR(255) AFTER `description`'); // Running A General Statement: https://laravel.com/docs/9.x/database#running-a-general-statement


            return redirect('admin/filters')->with('success_message', $message); // $message was defined in the first if-else statement (in case Add or Update cases)
        }


        // Note: Dynamic Filters are applied to `categories` (parent categories and subcategories (child categories)), and not `sections`!
        // Get ALL the Sections with their Categories and Subcategories (Get all sections with its categories and subcategories) to select them while adding or updating a filter (to select the fitler's respective categories)    // $categories are ALL the `sections` with their related 'parent' categories (if any (if exist)) and their subcategories or 'child' categories (if any (if exist))    
        $categories = \App\Models\Section::with('categories')->get()->toArray(); // with('categories') is the relationship method name in the Section.php Model
        // dd($categories);


        return view('admin.filters.add_edit_filter')->with(compact('title', 'categories', 'filter'));
    }

    public function addEditFilterValue(Request $request, $id = null) { // If the $id is not passed, this means 'Add Filter Value', but if it's passed, this means 'Edit the Filter Value'    
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'filters');


        // FIRSTLY, IF THE REQUEST METHOS IS 'GET', THEN RENDER THE add_edit_filter_value.blade.php PAGE:
        if ($id == '') { // if there's no $id passed in the route/URL parameters, this means 'Add a new Filter'
            $title   = 'Add Filter Value';
            $filter  = new ProductsFiltersValue;
            $message = 'Filter Value added successfully!';
        } else { // if the $id is passed in the route/URL parameter, this means Edit (Update) the Filter
            $title   = 'Edit Filter Value';
            $filter  = ProductsFiltersValue::find($id);
            $message = 'Filter Value updated successfully!';
        }


        // SECONDLY, IF THE REQUEST METHOS IS 'POST', THEN SUBMIT THE HTML <form> IN add_edit_filter_value.blade.php PAGE (WHETHER ADD OR UPDATE A BANNER):
        if ($request->isMethod('post')) { // WHETHER Add or Update <form> submission!!
            $data = $request->all();
            // dd($data);


            // Save inserted data (whether Add or Update a Filter Value) in `products_filters_values` database table
            $filter->filter_id    = $data['filter_id'];
            $filter->filter_value = $data['filter_value'];
            $filter->status       = 1;

            $filter->save(); // save (persist) inserted data (whether Add or Update a Filter Value) in `products_filters_values` database table


            return redirect('admin/filters-values')->with('success_message', $message); // $message was defined in the first if-else statement (in case Add or Update cases)
        }


        // Get ALL the enabled (active) filters (from `products_filters` table)
        $filters = ProductsFilter::where('status', 1)->get()->toArray();
        // dd($filters);


        return view('admin.filters.add_edit_filter_value')->with(compact('title', 'filter', 'filters'));
    }

    public function categoryFilters(Request $request) { // Show the related filters depending on the selected category <select> in category_filters.blade.php (which in turn is included by add_edit_product.php) using AJAX. Check admin/js/custom.js    
        if ($request->ajax()) {
            $data = $request->all();
            // dd($data);


            $category_id = $data['category_id']; // ['category_id'] comes from the AJAX call in admin/js/custom.js page from the 'data' object inside $.ajax() method


            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'view' => (String) \Illuminate\Support\Facades\View::make('admin.filters.category_filters')->with(compact('category_id')) // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
            ]);
        }
    }

}