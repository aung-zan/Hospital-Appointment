$(document).ready(function() {

    $('#logout').on('click', function(e) {
        e.preventDefault();

        $('#logoutForm').submit();
    });

    $('#profileImage').on('click', function() {
        $('#profileImageUpload').trigger('click');
    });
});