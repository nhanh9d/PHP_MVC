var jsBook = {
    init:()=>{
        $(document).ready(()=>{
            $('#add-book-form').on('submit', (e)=>{
                if (!$('div.form-group.has-success').hasClass('hidden')) {
                    $('div.form-group.has-success').addClass('hidden');
                }
                if (!$('div.form-group.has-error').hasClass('hidden')) {
                    $('div.form-group.has-error').addClass('hidden');
                }
                e.preventDefault();
                $.ajax({
                    url: "/book/addNewBook", // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: new FormData(e.currentTarget), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: (data) => {
                        debugger
                        data = JSON.parse(data);
                        if (data.isSuccess) {
                            $('span.message.success').html(data.message);
                            $('div.form-group.has-success').removeClass('hidden');
                        }
                        else{
                            $('span.message.error').html(data.message);
                            $('div.form-group.has-error').removeClass('hidden');
                        }
                    }
                });
            });
            $('#btn-add').on('click',(e)=>{
                e.preventDefault();
                $('#add-book-form').submit();
            });
        });
    },
};
jsBook.init();
