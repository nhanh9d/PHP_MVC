var app = {
  init : ()=>{
    app.initFunction();
  },
  initFunction: ()=>{
    var searchBtn = document.getElementById("search-btn");
    searchBtn.onclick = (sender,e) => {
      sender.srcElement.classList.add("search-open");
    }

    $('#form-login .close').on('click',()=>{
        $('#form-login').removeClass('show');
        $('.overlay').removeClass('show');
    });

    $('#btn-login').on('click', ()=>{
        $('#form-login').addClass('show');
        $('.overlay').addClass('show');
    });

    $('#form-register .close').on('click',()=>{
        $('#form-register').removeClass('show');
        $('.overlay').removeClass('show');
    });

    $('#btn-register').on('click', ()=>{
        $('#form-register').addClass('show');
        $('.overlay').addClass('show');
    });

    $('#btn-feedback').on('click', (e)=>{
        $('#form-feedback').addClass('show');
        $('.overlay').addClass('show');
        e.preventDefault();
    });

    $('#form-feedback .close').on('click',()=>{
        $('#form-feedback').removeClass('show');
        $('.overlay').removeClass('show');
    });

    $('#btn_register_form').on('click', ()=>{
        var message = '';
        var reg_password = $('#reg_password').val();
        var reg_password_confirm = $('#reg_password_confirm').val();
        var reg_username= $('#reg_username').val();
        if (reg_password === reg_password_confirm) {
            $.ajax({
                url:'login/register',
                data:{username:reg_username,password:reg_password},
                type:'POST'
            })
            .done((data)=>{
              message = data;
              $('#register .message.register').html(message);
              }
            )
            .fail((errorMessage)=>{
              message = errorMessage;
              $('#register .message.register').html(message);
            })
        }
        else{
            message = 'Mật khẩu và nhắc lại mật khẩu không trùng khớp';
            $('#register .message.register').html(message);
        }
        //default remove submit action
        return false;
    });
  }
}

app.init();
