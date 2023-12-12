<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

use App\Models\Banner;

class BannersController extends Controller
{
    public function banners() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'banners');

        $banners = Banner::get()->toArray();
        // dd($banners);

        
        return view('admin.banners.banners')->with(compact('banners'));
    }

    public function updateBannerStatus(Request $request) { // Update Banner Status using AJAX in banners.blade.php    
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            Banner::where('id', $data['banner_id'])->update(['status' => $status]); // $data['banner_id'] comes from the 'data' object inside the $.ajax() method in admin/js/custom.js
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'    => $status,
                'banner_id' => $data['banner_id']
            ]);
        }
    }

    public function deleteBanner($id) { // Delete banner using AJAX from BOTH SERVER (FILESYSTEM) and database table    
        // Get banner image record in `banners` database table
        $bannerImage = Banner::where('id', $id)->first();

        // Get banner image path on server (filesystem)
        $banner_image_path = 'front/images/banner_images/';

        // Delete the actual physical image from server (filesystem)
        if (file_exists($banner_image_path . $bannerImage->image)) {
            unlink($banner_image_path . $bannerImage->image);
        }

        // Delete banner record from `banners` database table
        Banner::where('id', $id)->delete();
        
        $message = 'Banner deleted successfully!';
        
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditBanner(Request $request, $id = null) { // If the $id is not passed, this means 'Add a Banner', but if it's passed, this means 'Edit the Banner'    
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'banners');


        // FIRSTLY, IF THE REQUEST METHOS IS 'GET', THEN RENDER THE add_edit_banner.blade.php PAGE:
        if ($id == '') { // if there's no $id passed in the route/URL parameters, this means 'Add a new Banner'
            $banner = new Banner;
            $title = 'Add Banner Image';
            $message = 'Banner added successfully!';
        } else { // if the $id is passed in the route/URL parameter, this means Edit (Update) the Banner
            $banner = Banner::find($id);
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

            
            if ($data['type'] == 'Slider') {
                $width  = '1920';
                $height = '720';
            } else if ($data['type'] == 'Fix') {
                $width  = '1920';
                $height = '450';
            }

            // Uploading Banner Image    // Using the Intervention package for uploading images
            if ($request->hasFile('image')) { // the HTML name attribute    name="admin_name"    in update_admin_details.blade.php
                $image_tmp = $request->file('image'); // Retrieving Uploaded Files: https://laravel.com/docs/9.x/requests#retrieving-uploaded-files
                if ($image_tmp->isValid()) {
                    // Get the image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    // Generate a random name for the uploaded image (to avoid that the image might get overwritten if its name is repeated)
                    $imageName = rand(111, 99999) . '.' . $extension;

                    // Assigning the uploaded images path inside the 'public' folder
                    $imagePath = 'front/images/banner_images/' . $imageName;

                    // Upload the image using the 'Intervention' package and save it in our path inside the 'public' folder
                    // Image::make($image_tmp)->resize(1920, 720)->save($imagePath); // '\Image' is the Intervention package
                    Image::make($image_tmp)->resize($width, $height)->save($imagePath); // '\Image' is the Intervention package

                    // Insert the image name in the database table
                    $banner->image = $imageName;
                }
            }

            $banner->save(); // save inserted data (whether add or update a Brand)

            return redirect('admin/banners')->with('success_message', $message); // $message was defined in the first if-else statement (in case Add or Update cases)
        }


        return view('admin.banners.add_edit_banner')->with(compact('banner', 'title'));
    }
}