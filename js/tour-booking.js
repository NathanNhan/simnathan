jQuery(function ($) {
    $('#tour-booking-form').on('submit', function (e) {
        e.preventDefault();
        // Handle form submission logic here
        var formData = $(this).serialize(); // Serialize form data
        console.log(formData); // For debugging, log the form data to the console
        $.ajax({
            url: tour_booking.ajax_url, // Use the localized ajax_url
            type: 'POST',
            data: {
                action: 'tour_booking', // Action name for the AJAX request
                product_id: $('input[name="product_id"]').val(),
                departure_date: $('input[name="departure_date"]').val(),
                guest_count: $('select[name="guest_count"]').val()
            },
            success: function (response) {
                // Handle the response from the server
                if (response.success) {
                    window.location.href = response.data.redirect_url; // Redirect to the provided URL
                } else {
                    alert(response.data.message); // Show an error message (you can customize this)
                }

            }
        })
    })
})