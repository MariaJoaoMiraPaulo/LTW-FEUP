$(document).ready(function (e) {
    $('#submit').click(function() {
        var file_data = $("#fileToUpload").prop('files')[0];
        var form_data = new FormData();
        form_data.append('fileToUpload', file_data);

        $.ajax({
            url: "../dbActions/uploadReviewPhoto.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false        // To send DOMDocument or non processed data file it is set to false
        });

    });
});
