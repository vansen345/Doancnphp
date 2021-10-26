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

function addCart(id) {
    num= parseInt($("#quanlity").val());
    $.post("addCart.php",{'id':id,'num':num},function (data,status) {
        //location.reload();
        item=data.split("-");
        $("#numcart").text(item[0]);

        //$("#listcart").load("cart.php #listcart");
        
    });
    
}
function update(id) {
    num=$("#num_"+id).val();
    $.post('updatecart.php',{'id':id,'num':num},function (data) {
        location.reload();
        //$("#listcart").load("cart.php #listcart");
    });

}
function xoahang(id) {
    $.post('updatecart.php',{'id':id,'num':0},function (data) {
       location.reload();

    });

}

