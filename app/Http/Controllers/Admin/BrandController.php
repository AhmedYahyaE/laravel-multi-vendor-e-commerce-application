<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Brand;


class BrandController extends Controller
{
    public function brands() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'brands');


        $brands = Brand::get()->toArray(); // Plain PHP array
        // dd($brands);

        return view('admin.brands.brands')->with(compact('brands'));
    }

    public function updateBrandStatus(Request $request) { // Update Brand Status using AJAX in brands.blade.php    
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            Brand::where('id', $data['brand_id'])->update(['status' => $status]); // $data['brand_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'   => $status,
                'brand_id' => $data['brand_id']
            ]);
        }
    }

    
    public function deleteBrand($id) {
        Brand::where('id', $id)->delete();
        
        $message = 'Brand has been deleted successfully!';
        
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditBrand(Request $request, $id = null) { // If the $id is not passed, this means Add a Brand, if not, this means Edit the Brand    
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'brands');


        if ($id == '') { // if there's no $id is passed in the route/URL parameters, this means Add a new brand
            $title = 'Add Brand';
            $brand = new Brand();
            // dd($brand);
            $message = 'Brand added successfully!';
        } else { // if the $id is passed in the route/URL parameters, this means Edit the Brand
            $title = 'Edit Brand';
            $brand = Brand::find($id);
            // dd($brand);
            $message = 'Brand updated successfully!';
        }


        if ($request->isMethod('post')) { // WHETHER Add or Update <form> submission!!
            $data = $request->all();
            // dd($data);

            // Laravel's Validation    // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules
            $rules = [
                'brand_name' => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
            ];

            $customMessages = [ // Specifying A Custom Message For A Given Attribute: https://laravel.com/docs/9.x/validation#specifying-a-custom-message-for-a-given-attribute
                'brand_name.required' => 'Brand Name is required',
                'brand_name.regex'    => 'Valid Brand Name is required',
            ];

            $this->validate($request, $rules, $customMessages);

            
            // Saving inserted/updated data
            $brand->name   = $data['brand_name']; // WHETHER ADDING or UPDATING
            $brand->status = 1;  // WHETHER ADDING or UPDATING
            $brand->save(); // Save all data in the database


            return redirect('admin/brands')->with('success_message', $message);
        }


        return view('admin.brands.add_edit_brand')->with(compact('title', 'brand'));
    }
}