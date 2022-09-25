<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function banners() {
        $banners = \App\Models\Banner::get()->toArray();
        // dd($banners);

        
        return view('admin.banners.banners')->with(compact('banners'));
    }

    public function updateBannerStatus(Request $request) { // Update Banner Status using AJAX in banners.blade.php    // https://www.youtube.com/watch?v=R5_4PoNxnVQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=66
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all();
            // dd($data); // THIS DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\Banner::where('id', $data['banner_id'])->update(['status' => $status]); // $data['banner_id'] comes from the 'data' object inside the $.ajax() method in custom.js
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([
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
}
