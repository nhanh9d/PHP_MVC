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

                if (!username || !cfmpassword || !password) {
                    $('span.message.error').html('Không được để trống trường');
                    $('div.form-group.has-error').removeClass('hidden');
                }
                else if(cfmpassword !== password){
                    $('span.message.error').html('Mật khẩu và nhắc lại mật khẩu không trùng khớp');
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
                        data = JSON.parse(data);
                        if (data.isSuccess) {
                            $('span.message.success').html(data.message);
                            $('div.form-group.has-success').removeClass('hidden');
                        }
                        else{
                            $('span.message.error').html(data.message);
                            $('div.form-group.has-error').removeClass('hidden');
                        }
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
