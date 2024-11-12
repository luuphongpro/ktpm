
var userlogin=JSON.parse(sessionStorage.getItem("currentLogin"));

$('#Login').click(() =>{
    $(".modal-login").css("display","flex")
    $('#Register').addClass('modal_content-header-item-default');
    $('#Login').removeClass('modal_content-header-item-default');
    $('.modal_content-login').css("display","block");
    $(".modal_content-register").css("display","none");
})
$("#Register").click(function(){
    $(".modal-login").css("display","flex")
    $("#Login").addClass("modal_content-header-item-default")
    $('#Register').removeClass('modal_content-header-item-default');
    $(".modal_content-register").css("display","block");
    $('.modal_content-login').css("display","none");
})
$(".btn-close").click(() =>{
    $(".modal-login").css("display","none")
})
//Bỏ thông báo sai đăng nhập
$('input').on("input",() =>{
    $(".error-login").hide()
})
Validator({
    form:'#form-dn',
    rules:[
    Validator.isRequired('#user-login'),
    Validator.isSDT('#user-login'),
    Validator.isRequired('#password-login'),
    Validator.isRequired('#password-login'),
    Validator.isMinLength('#password-login',6),
    ],
    errorElement:'.form-message',
    onSubmit: (value) =>{
        if(value){
            console.log(value)
            xhr=new XMLHttpRequest();
            xhr.open('POST','./backend/controllers/xldangnhap.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('user_login='+value.user_login+'&password_login='+value.password_login);
            xhr.onload = function () {
            //Đợi và xử lý phản hồi của server
            if (xhr.status >= 200 && xhr.status < 300) {
                var response=JSON.parse(xhr.responseText);
                if(response.flag){
                    $(".modal-login").css("display","flex")
                    window.location.href='index.php?chon&id=home';
                    sessionStorage.setItem('currentLogin',JSON.stringify(response));
                }
                else {
                    $(".error-login").show()
                }  
            } 
            else {
                console.error('Lỗi gửi dữ liệu:', xhr.statusText);
            }
            }
        }
        else {
            console.log("loi cmmm")
        }
    }
})
Validator({
    form:'#form-dk',
    rules:[
    Validator.isRequired('#SDT'),
    Validator.isSDT('#SDT'),
    Validator.isRequired('#MatKhau'),
    Validator.isMinLength('#MatKhau',6),
    Validator.isConfirmed('#confirm_password',function(){
        return $('#MatKhau').val();
    }),
    Validator.isRequired('#DiaChi'),
    Validator.isRequired('#UserName'),
    Validator.isMaxLength('#UserName',25),
    Validator.isMinLength("#UserName",6),

    ],
    errorElement:'.form-message',
    onSubmit: (value) =>{
        const data=JSON.stringify(value);
        xhr=new XMLHttpRequest();
        xhr.open('POST','./backend/controllers/taikhoan.php?them');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('dataJSON='+data);
        xhr.onload = function () {
        //Đợi và xử lý phản hồi của server
        if (xhr.status >= 200 && xhr.status < 300) {
            if(xhr.responseText=='success'){
                $(".modal-login").css("display","none")
                alert("Tạo tài khoản thành công, vui lòng đăng nhập để tiếp tục.");
                $("#form-dk").reset()
            }
            else {
                $(".error-login").show()
            }  
        } else {
            console.error('Lỗi gửi dữ liệu:', xhr.statusText);
        }
        };
    }
})
//Xử lý giao diện đăng nhập
if(userlogin?.flag){
    $(".name_login").text(userlogin.name)
    $(".user-dn").addClass("status")
    $(".name_login").removeClass("js_namelogin")
    LoginOption(userlogin.quyen)
    
}
else{
    $(".name_login").text("Đăng nhập")
    $(".user-dn").removeClass("status")
    $(".name_login").addClass("js_namelogin")
    $(".js_namelogin").click(function(){
        $(".modal-login").css("display", "flex");
        console.log(document.querySelector('.modal-login'))
        console.log("cmmm")
    })
}
//Xử lý logout
$(".user-logout").click(function(){
    userlogin.flag=false
    sessionStorage.setItem('currentLogin',JSON.stringify(userlogin));
})

function LoginOption(level){
    var html=`<li><a class="option-item">
    <i class="fa fa-user" aria-hidden="true"></i> Trang cá nhân</a></li>
    <li>
    `
    if(level=="Admin"){
        html+=`<a class="option-item" href='admin.html'><i class="fa fa-book" aria-hidden="true"></i>Trang phân quyền</a></li>`
        html+=`<a class="option-item" href='admin1.php'><i class="fa fa-book" aria-hidden="true"></i>Vào trang Admin</a></li>`
    }
    else if(level=="KH"){
        html+=`<a class="option-item"><i class="fa fa-book" aria-hidden="true"></i>Xem lại đơn hàng</a></li>`
    }
    else {
        html+=`<a class="option-item" href='admin1.php'><i class="fa fa-book" aria-hidden="true"></i>Vào trang Admin</a></li>`
    }
    html+=`<li><a class="user-logout option-item" href="index.php?chon&id=home"><i class="fa fa-sign-out" aria-hidden="true"></i> Thoát</a></li>`
    $(".option-dn").html(html)
}
function TangGioHang(){
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });
}

function increasingNumber(e) {
    let qty = e.parentNode.querySelector('.input-qty');
    if (parseInt(qty.value) < qty.max) {
        qty.value = parseInt(qty.value) + 1;
    } else {
        qty.value = qty.max;
    }
}

function decreasingNumber(e) {
    let qty = e.parentNode.querySelector('.input-qty');
    if (qty.value > qty.min) {
        qty.value = parseInt(qty.value) - 1;
    } else {
        qty.value = qty.min;
    }
}