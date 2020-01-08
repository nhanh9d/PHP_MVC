var jsBorrowBook= {
    init:()=>{
        $(document).ready(()=>{
            $('a.btn-accept-request').on('click',(e)=>{
                e.preventDefault();
                var requestId = $(e.currentTarget).attr('data-request-id');
                var title = $(e.currentTarget).attr('data-title');
                $.ajax({
                    url:'/requestbook/acceptBookRequest',
                    data:{
                        requestId:requestId,
                        title:title
                    },
                    type:'POST'
                }).done((data)=>{
                    $(`a.btn-accept-request[data-request-id='${requestId}']`).addClass('disabled');
                    $(`a.btn-accept-request[data-request-id='${requestId}']`).html('Đã thêm');
                    $(`a.btn-decline-request[data-request-id='${requestId}']`).addClass('hidden');
                }).fail((messsageError)=>{
                });
            });
            $('a.btn-decline-request').on('click',(e)=>{
                e.preventDefault();
                var requestId = $(e.currentTarget).attr('data-request-id');
                $.ajax({
                    url:'/requestbook/declineBookRequest',
                    data:{
                        requestId:requestId
                    },
                    type:'POST'
                }).done((data)=>{
                    $(`a.btn-decline-request[data-request-id='${requestId}']`).addClass('disabled');
                    $(`a.btn-decline-request[data-request-id='${requestId}']`).html('Đã từ chối');
                    $(`a.btn-accept-request[data-request-id='${requestId}']`).addClass('hidden');
                }).fail((messsageError)=>{
                });
            });
        });
    },
};
jsBorrowBook.init();
