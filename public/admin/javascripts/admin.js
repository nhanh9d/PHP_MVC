var jsAdmin = {
    init:()=>{
        $(document).ready(()=>{
            $('#btn-add').on('click',(e)=>{
                e.preventDefault();
                if (!$('div.form-group.has-success').hasClass('hidden')) {
                    $('div.form-group.has-success').addClass('hidden');
                }
                if (!$('div.form-group.has-error').hasClass('hidden')) {
                    $('div.form-group.has-error').addClass('hidden');
                }

                var message = '';
                var username = $('#add-username').val();
                var fullname = $('#add-fullname').val();
                var password = $('#add-password').val();
                var cfmpassword = $('#add-confirm-password').val();
                var status = $('#add-status').val();

                if (!username || !cfmname || !password) {
                    $('span.message.error').html('Không được để trống trường');
                    $('div.form-group.has-error').removeClass('hidden');
                }
                else{
                    $.ajax({
                        url:'/admin/registerAdmin',
                        data:{
                            username:username,
                            fullname:fullname,
                            password:password,
                            status:status
                        },
                        type:'POST'
                    }).done((data)=>{
                        $('span.message.success').html(data);
                        $('div.form-group.has-success').removeClass('hidden');
                    }).fail((messsageError)=>{
                        $('span.message.error').html(data);
                        $('div.form-group.has-error').removeClass('hidden');
                    });
                }
            });
        });
    },
};
jsAdmin.init();
