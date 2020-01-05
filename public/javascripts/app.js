var app = {
  init : ()=>{
    app.initFunction();
  },
  initFunction: ()=>{
    // var searchBtn = document.getElementById("search-btn");
    // searchBtn.onclick = (sender,e) => {
    //   sender.srcElement.classList.add("search-open");
    // }

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

    $('a.btn-borrow-book').on('click', (e)=>{
      var bookId = $(e.currentTarget).attr('data-book-id');
      $('#borrow-book_book-id').val(bookId);
      $('#form-borrow-book').addClass('show');
      $('.overlay').addClass('show');
      e.preventDefault();
    });

    $('#form-borrow-book .close').on('click',()=>{
      $('#form-borrow-book').removeClass('show');
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
        })
        .fail((errorMessage)=>{
          $('#register .message.register').html('Có lỗi xảy ra');
        })
      }
      else{
        message = 'Mật khẩu và nhắc lại mật khẩu không trùng khớp';
        $('#register .message.register').html(message);
      }
      //default remove submit action
      return false;
    });

    $('#btn-borrow-book-form').on('click',()=>{
      var message = '';

      var startDate = $('#borrow-book_start-date').val();
      var endDate = $('#borrow-book_end-date').val();
      var bookId = $('#borrow-book_book-id').val();
      var obj = {
        startDate:startDate,
        endDate:endDate,
        bookId:bookId
      };
      $.ajax({
        url:'BorrowBook/BorrowNewBook',
        data:obj,
        type:'POST'
      }).done((data)=>{
        $('.message.borrow-book').html(data);
      }).fail((message)=>{
        $('.message.borrow-book').html('Có lỗi xảy ra');
      });

      return false;
    });

    $('#btn-login-form').on('click',()=>{
      var message = '';

      var username = $('#username').val();
      var password = $('#password').val();
      var obj = {
        username:username,
        password:password
      };
      $.ajax({
        url:'Login/Log_In',
        data:obj,
        type:'POST'
      }).done((result)=>{
        if (result === "1") {
          location.reload();
        }
        else{
          $('.message.login').html('Tài khoản không tồn tại');
        }
      }).fail((message)=>{
        $('.message.borrow-book').html('Có lỗi xảy ra');
      });

      return false;
    });
  }
}

app.init();
