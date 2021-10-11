function DoiMatKhau(tendangnhap,matkhaucu,matkhaumoi) {
    $.ajax({
        url:"ajax/DoiMatKhauAjax.php",
        type:"POST",
        data:{
            tendangnhap:tendangnhap,
            matkhaucu:matkhaucu,
            matkhaumoi:matkhaumoi
        },
        success:function (giatri) {
            $('#mk_thongbao').text(giatri);

        }
    });
}