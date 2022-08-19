<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //

    public function sections() {
        // $sections = \App\Models\Section::get(); // Eloquent Collection
        $sections = \App\Models\Section::get()->toArray(); // Plain PHP array
        // dd($sections);

        return view('admin.sections.sections')->with(compact('sections')); // is the aame as    return view('admin/sections/sections');
    }

    public function updateSectionStatus(Request $request) { // Update Section Status using AJAX in section.blade.php    // https://www.youtube.com/watch?v=1XJ7908SJcM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=34
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all();
            // dd($data); // THIS DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\Section::where('id', $data['section_id'])->update(['status' => $status]);
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
}
