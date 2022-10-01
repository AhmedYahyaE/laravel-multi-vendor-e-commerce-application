// Using jQuery for the website FRONT section:
$(document).ready(function() {
    // Sorting Filter WITHOUT AJAX (using HTML <form> and jQuery) in front/products/listing.blade.php
    $('#sort').on('change', function() {
        // console.log(this);
        // console.log(this.form); // this.form means the containing form element    // https://stackoverflow.com/questions/11042214/difference-between-this-form-and-document-forms
        this.form.submit();
    });
});