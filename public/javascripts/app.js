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
  }
}

app.init();
