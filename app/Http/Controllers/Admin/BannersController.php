<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function banners() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'banners');

        $banners = \App\Models\Banner::get()->toArray();
        // dd($banners);

        
        return view('admin.banners.banners')->with(compact('banners'));
    }

    public function updateBannerStatus(Request $request) { // Update Banner Status using AJAX in banners.blade.php    // https://www.youtube.com/watch?v=R5_4PoNxnVQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=66
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';
            // exit;

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\Banner::where('id', $data['banner_id'])->update(['status' => $status]); // $data['banner_id'] comes from the 'data' object inside the $.ajax() method in admin/js/custom.js
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'      => $status,
                'banner_id' => $data['banner_id']
            ]);
        }
    }

    public function deleteBanner($id) { // Delete banner using AJAX from BOTH SERVER (FILESYSTEM) and database table    // https://www.youtube.com/watch?v=R5_4PoNxnVQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=67
        // Get banner image record in `banners` database table
        $bannerImage = \App\Models\Banner::where('id', $id)->first();

        // Get banner image path on server (filesystem)
        $banner_image_path = 'front/images/banner_images/';

        // Delete the physical image from server (filesystem)
        if (file_exists($banner_image_path . $bannerImage->image)) {
            unlink($banner_image_path . $bannerImage->image);
        }

        // Delete banner record from `banners` database table
        \App\Models\Banner::where('id', $id)->delete(); // https://laravel.com/docs/9.x/queries#delete-statements
        
        $message = 'Banner deleted successfully!';
        
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditBanner(Request $request, $id = null) { // If the $id is not passed, this means 'Add a Banner', but if it's passed, this means 'Edit the Banner'    // https://www.youtube.com/watch?v=YErUqekh47E&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=67
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'banners');



        // FIRSTLY, IF THE REQUEST METHOS IS 'GET', THEN RENDER THE add_edit_banner.blade.php PAGE:
        if ($id == '') { // if there's no $id passed in the route/URL parameters, this means 'Add a new Banner'
            $banner = new \App\Models\Banner;
            $title = 'Add Banner Image';
            $message = 'Banner added successfully!';
        } else { // if the $id is passed in the route/URL parameter, this means Edit (Update) the Banner
            $banner = \App\Models\Banner::find($id);
            // dd($banner);
            $title = 'Edit Banner Image';
            $message = 'Banner updated successfully!';
        }

        // SECONDLY, IF THE REQUEST METHOS IS 'POST', THEN SUBMIT THE HTML <form> IN add_edit_banner.blade.php PAGE (WHETHER ADD OR UPDATE A BANNER):
        if ($request->isMethod('post')) { // WHETHER Add or Update <form> submission!!
            $data = $request->all();
            // dd($data);

            $banner->type   = $data['type'];
            $banner->link   = $data['link'];
            $banner->title  = $data['title'];
            $banner->alt    = $data['alt'];
            $banner->status = 1;

            // Check 10:42 in https://www.youtube.com/watch?v=GC_5WN0PeeM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=70
            if ($data['type'] == 'Slider') {
                $width  = '1920';
                $height = '720';
            } else if ($data['type'] == 'Fix') {
                $width  = '1920';
                $height = '450';
            }

            // Uploading Banner Image    // Check 5:08 in https://www.youtube.com/watch?v=dvVbp4poGfQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=19
            // Retrieving Uploaded Files: https://laravel.com/docs/9.x/requests#retrieving-uploaded-files
            // Using the Intervention package for uploading images
            if ($request->hasFile('image')) { // the HTML name attribute    name="admin_name"    in update_admin_details.blade.php
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Get the image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    // Generate a random name for the uploaded image (to avoid that the image might get overwritten if its name is repeated)
                    $imageName = rand(111, 99999) . '.' . $extension;

                    // Assigning the uploaded images path inside the 'public' folder
                    $imagePath = 'front/images/banner_images/' . $imageName;

                    // Upload the image using the 'Intervention' package and save it in our path inside the 'public' folder
                    // \Image::make($image_tmp)->resize(1920, 720)->save($imagePath); // '\Image' is the Intervention package
                    \Image::make($image_tmp)->resize($width, $height)->save($imagePath); // '\Image' is the Intervention package

                    // Insert the image name in the database table
                    $banner->image = $imageName; // Check 31:58 in https://www.youtube.com/watch?v=1G21b3-9cPo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=39
                }
            } /* else { // In case the admins updates other fields but doesn't update the image itself (doesn't upload a new image), and originally there wasn't any image uploaded in the first place
                $banner->image = ''; // Check 31:58 in https://www.youtube.com/watch?v=1G21b3-9cPo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=39
            } */

            $banner->save(); // save inserted data (whether add or update a Brand)

            return redirect('admin/banners')->with('success_message', $message); // $message was defined in the first if-else statement (in case Add or Update cases)
        }


        return view('admin.banners.add_edit_banner')->with(compact('banner', 'title'));
    }
}
