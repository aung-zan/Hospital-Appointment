$(document).ready(function() {

    // for logout function
    $('#logout').on('click', function(e) {
        e.preventDefault();
        $('#logoutForm').submit();
    });

    // open image upload wizard when click on image.
    $('#profileImage').on('click', function() {
        $('#profileImageUpload').trigger('click');
    });

    // for client activate and deactivate
    $('.clientAD').on('click', function(e) {
        e.preventDefault();

        $(this).next().submit();
    });

    // for logout function
    $('.deleteButton').on('click', function(e) {
        e.preventDefault();
        $('#deleteForm').submit();
    });
});