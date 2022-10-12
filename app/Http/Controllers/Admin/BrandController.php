<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    // https://www.youtube.com/watch?v=ICe1NOaPB8w&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42

    public function brands() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'brands');


        // $brands = \App\Models\Brand::get(); // Eloquent Collection
        $brands = \App\Models\Brand::get()->toArray(); // Plain PHP array
        // dd($brands);

        return view('admin.brands.brands')->with(compact('brands')); // is the aame as    return view('admin/brands/brands');
    }

    public function updateBrandStatus(Request $request) { // Update Brand Status using AJAX in brands.blade.php    // https://www.youtube.com/watch?v=1XJ7908SJcM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=34
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all();
            // dd($data); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\Brand::where('id', $data['brand_id'])->update(['status' => $status]); // $data['brand_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'     => $status,
                'brand_id' => $data['brand_id']
            ]);
        }
    }

    
    public function deleteBrand($id) {
        \App\Models\Brand::where('id', $id)->delete(); // https://laravel.com/docs/9.x/queries#delete-statements
        
        $message = 'Brand has been deleted successfully!';
        
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditBrand(Request $request, $id = null) { // If the $id is not passed, this means Add a Brand, if not, this means Edit the Brand    // https://www.youtube.com/watch?v=YqBzJmwrh8I&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'brands');


        if ($id == '') { // if there's no $id is passed in the route/URL parameters, this means Add a new brand
            $title = 'Add Brand';
            $brand = new \App\Models\Brand();
            // dd($brand);
            $message = 'Brand added successfully!';
        } else { // if the $id is passed in the route/URL parameters, this means Edit the Brand
            $title = 'Edit Brand';
            $brand = \App\Models\Brand::find($id);
            // dd($brand);
            $message = 'Brand updated successfully!';
        }


        if ($request->isMethod('post')) { // WHETHER Add or Update <form> submission!!
            $data = $request->all();
            // dd($data);

            // Laravel's Validation    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
            // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
            $rules = [
                'brand_name' => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
            ];
            $customMessages = [
                'brand_name.required' => 'Brand Name is required',
                'brand_name.regex'    => 'Valid Brand Name is required',
            ];
            $this->validate($request, $rules, $customMessages);

            
            // Saving inserted/updated data    // Inserting & Updating Models: https://laravel.com/docs/9.x/eloquent#inserts AND https://laravel.com/docs/9.x/eloquent#updates
            $brand->name   = $data['brand_name']; // WHETHER ADDING or UPDATING
            $brand->status = 1;  // WHETHER ADDING or UPDATING
            $brand->save(); // Save all data in the database


            return redirect('admin/brands')->with('success_message', $message);
        }


        return view('admin.brands.add_edit_brand')->with(compact('title', 'brand'));
    }
}
