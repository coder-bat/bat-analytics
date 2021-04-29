(function($) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    // sample event tracking

    if (window.location.href.indexOf('home') > -1) {
        const webUrl = window.location.href;
        var option = 'came-to-home-page';
        $.ajax({
                type: 'POST',
                url: webUrl + 'wp-admin/admin-ajax.php',
                data: {
                    action: 'track-home-page',
                    option // your option variable
                    // new_value: $new_value // your new value variable
                },
                dataType: 'json'
            })
            .done(function(json) {
                console.log("Ajax call succeeded, let's see what the response was.");
                if (json.success) {
                    console.log("Function executed successfully and returned: " + json.message);
                } else if (!json.success) {
                    console.log("Function failed and returned: " + json.message);
                }
            }).fail(function() {
                console.log("The Ajax call itself failed.");
            })
    }
})(jQuery);