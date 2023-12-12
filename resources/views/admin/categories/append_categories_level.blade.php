{{-- NOTE: THIS WHOLE PAGE IS INCLUDED IN add_edit_category.blade.php!!    (    <div id="appendCategoriesLevel">    ) --}}
{{-- Show Categories <select> <option> depending on the chosen selected Section (show the relevant categories of the chosen section) in append_categories_level.blade.php page using AJAX --}}
{{-- We created this <div> in a separate file in order for the appendCategoryLevel() method inside the CategoryController to be able to return the whole file as a response to the AJAX call in admin/js/custom.js to show the proper/relevant categories <select> box <option> depending on the chosen selected Section --}}



<div class="form-group">
    <label for="parent_id">Select Category Level</label> {{-- The relationship between a category and its parent category inside the same table i.e. `categories` table --}}
    <select name="parent_id" id="parent_id" class="form-control"  style="color: #000">
        <option value="0"  @if (isset($category['parent_id']) && $category['parent_id'] == 0) selected @endif >Main Category</option>
        @if (!empty($getCategories))



            {{-- Show the Categories --}}
            @foreach ($getCategories as $parentCategory) {{-- Show the Categories --}} {{-- $getCategories are all the parent categories, and their child categories --}}
                @php
                    // echo '<pre>', var_dump($getCategories), '</pre>';
                    // echo '<pre>', var_dump($parentCategory);
                    // echo '<pre>', var_dump($parentCategory['subCategories']);
                @endphp

                <option value="{{ $parentCategory['id'] }}"  @if (isset($category['parent_id']) && $category['parent_id'] == $parentCategory['id']) selected @endif >{{ $parentCategory['category_name'] }}</option>



                {{-- Show the Subcategories --}}
                @if (!empty($parentCategory['subCategories'])) {{-- Using the hasMany relationship in Category.php Model --}}
                    @foreach ($parentCategory['subCategories'] as $subcategory) {{-- Show the Subcategories --}}
                        <option value="{{ $subcategory['id'] }}"  @if (isset($subcategory['parent_id']) && $subcategory['parent_id'] == $subcategory['id']) selected @endif >&nbsp;&raquo;&nbsp;{{ $subcategory['category_name'] }}</option> {{-- https://www.w3schools.com/charsets/ref_html_entities_r.asp --}}
                    @endforeach
                @endif


            @endforeach


        @endif
    </select>
</div>