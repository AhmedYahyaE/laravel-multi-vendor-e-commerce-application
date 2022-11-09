{{-- https://www.youtube.com/watch?v=YErUqekh47E&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=67 --}}



@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        {{-- <h3 class="font-weight-bold">Catalogue Management</h3>
                        <h6 class="font-weight-normal mb-0">Banners</h6> --}}
                        <h4 class="card-title">Home Page Banners</h4>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $title }}</h4>


                        {{-- Our Bootstrap error code in case of wrong current password or the new password and confirm password are not matching: --}}
                        {{-- https://www.youtube.com/watch?v=oAZKXYrkcr4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=17 --}}
                        {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                        @if (Session::has('error_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif



                        {{-- Displaying Laravel Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    {{-- Check 17:38 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18 --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{-- <strong>Error:</strong> {{ Session::get('error_message') }} --}}

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif



                        {{-- Displaying The Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND https://laravel.com/docs/9.x/blade#validation-errors --}}
                        {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                        {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
                        {{-- https://www.youtube.com/watch?v=oAZKXYrkcr4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=17 --}}
                        @if (Session::has('success_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success:</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
              

                        {{-- https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18 --}}


                        {{-- https://www.youtube.com/watch?v=YqBzJmwrh8I&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=37 --}}
                        <form class="forms-sample"   @if (empty($banner['id'])) action="{{ url('admin/add-edit-banner') }}" @else action="{{ url('admin/add-edit-banner/' . $banner['id']) }}" @endif   method="post" enctype="multipart/form-data"> <!-- If the id is not passed in from the route, this measn 'Add a new Banner', but if the id is passed in from the route, this means 'Edit the Banner' --> <!-- Using the enctype="multipart/form-data" to allow uploading files (images). Check 2:39 in https://www.youtube.com/watch?v=dvVbp4poGfQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=19 -->
                            @csrf

                            <div class="form-group"> {{-- https://www.youtube.com/watch?v=GC_5WN0PeeM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=70 --}}
                                <label for="type">Banner Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="">Select</option>
                                    <option  @if (!empty($banner['type']) && $banner['type'] == 'Slider') selected @endif  value="Slider">Slider</option>
                                    <option  @if (!empty($banner['type']) && $banner['type'] == 'Fix')    selected @endif  value="Fix">Fix</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Banner Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                {{-- Show the admin image if exists: Check 14:34 in https://www.youtube.com/watch?v=dvVbp4poGfQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=19 --}}
                                {{-- @if (!empty(Auth::guard('admin')->user()->image))
                                    <a target="_blank" href="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}">View Image</a> <!-- We used    target="_blank"    to open the image in another separate page -->
                                    <input type="hidden" name="current_banner_image" value="{{ Auth::guard('admin')->user()->image }}"> <!-- to send the current admin image url all the time with all the requests -->
                                @endif --}}


                                {{-- Show the banner image, if any (if exits) --}}
                                @if (!empty($banner['image']))
                                    <a target="_blank" href="{{ url('front/images/banner_images/' . $banner['image']) }}">View Banner Image</a>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="link">Banner Link</label>
                                <input type="text" class="form-control" id="link" placeholder="Enter Banner Link" name="link" @if (!empty($banner['link'])) value="{{ $banner['link'] }}" @else value="{{ old('link') }}" @endif> <!-- Check 10:10 in https://www.youtube.com/watch?v=YqBzJmwrh8I&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=37 -->
                            </div>
                            <div class="form-group">
                                <label for="title">Banner Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Banner Title" name="title" @if (!empty($banner['title'])) value="{{ $banner['title'] }}" @else value="{{ old('title') }}" @endif> <!-- Check 10:10 in https://www.youtube.com/watch?v=YqBzJmwrh8I&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=37 -->
                            </div>
                            <div class="form-group">
                                <label for="alt">Banner Alternate Text (Alt for SEO)</label>
                                <input type="text" class="form-control" id="alt" placeholder="Enter Banner Alternate Text" name="alt" @if (!empty($banner['alt'])) value="{{ $banner['alt'] }}" @else value="{{ old('alt') }}" @endif> <!-- Check 10:10 in https://www.youtube.com/watch?v=YqBzJmwrh8I&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=37 -->
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset"  class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>
@endsection