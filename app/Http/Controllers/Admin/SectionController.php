<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //

    public function sections() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'sections');


        // $sections = \App\Models\Section::get(); // Eloquent Collection
        $sections = \App\Models\Section::get()->toArray(); // Plain PHP array
        // dd($sections);

        return view('admin.sections.sections')->with(compact('sections')); // is the aame as    return view('admin/sections/sections');
    }

    public function updateSectionStatus(Request $request) { // Update Section Status using AJAX in sections.blade.php    // https://www.youtube.com/watch?v=1XJ7908SJcM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=34
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all();
            // dd($data); // THIS DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\Section::where('id', $data['section_id'])->update(['status' => $status]); // $data['section_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([
                'status'     => $status,
                'section_id' => $data['section_id']
            ]);
        }
    }

    public function deleteSection($id) { // https://www.youtube.com/watch?v=6TfdD5w-kls&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=33
        \App\Models\Section::where('id', $id)->delete(); // https://laravel.com/docs/9.x/queries#delete-statements
        
        $message = 'Section has been deleted successfully!';
        
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditSection(Request $request, $id = null) { // If the $id is not passed, this means Add a Section, if not, this means Edit the Section    // https://www.youtube.com/watch?v=YqBzJmwrh8I&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'sections');


        if ($id == '') { // if there's no $id is passed in the route/URL parameters, this means Add a new section
            $title = 'Add Section';
            $section = new \App\Models\Section();
            // dd($section);
            $message = 'Section added successfully!';
        } else { // if the $id is passed in the route/URL parameters, this means Edit the Section
            $title = 'Edit Section';
            $section = \App\Models\Section::find($id);
            // dd($section);
            $message = 'Section updated successfully!';
        }

        if ($request->isMethod('post')) { // WHETHER Add or Update <form> submission!!
            $data = $request->all();
            // dd($data);

            // Laravel's Validation    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
            // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
            $rules = [
                'section_name' => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
            ];
            $customMessages = [
                'section_name.required' => 'Section Name is required',
                'section_name.regex'    => 'Valid Section Name is required',
            ];
            $this->validate($request, $rules, $customMessages);

            
            // Saving inserted/updated data    // Inserting & Updating Models: https://laravel.com/docs/9.x/eloquent#inserts AND https://laravel.com/docs/9.x/eloquent#updates
            $section->name   = $data['section_name']; // WHETHER ADDING or UPDATING
            $section->status = 1;  // WHETHER ADDING or UPDATING
            $section->save(); // Save all data in the database


            return redirect('admin/products')->with('success_message', $message);
        }


        return view('admin.sections.add_edit_section')->with(compact('title', 'section'));
    }
}
