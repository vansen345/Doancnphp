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

function EditCommnent(mabinhluan,masanpham,noidung) {
    $.ajax({
        url:"ajax/EditComment.php",
        type:"POST",
        data:{
            mabinhluan:mabinhluan,
            noidung:noidung
        },
        success:function (giatri) {
            alert(giatri);
            window.location="product-details-default.php?Masp="+masanpham;
        }
    });

}

function XoaBinhLuan(mabinhluan,masanpham) {
    $.ajax({
        url:"ajax/XoaBinhLuan.php",
        type:"POST",
        data:{
           mabinhluan:mabinhluan
        },
        success:function (giatri) {
            alert(giatri);
            window.location="product-details-default.php?Masp="+masanpham;
        }
    });

}

function DanhGiaSP(masanpham,tendangnhap,noidung) {
    $.ajax({
        url:"ajax/DanhGiaSP.php",
        type:"POST",
        data:{
           masanpham:masanpham,
            tendangnhap:tendangnhap,
            noidung:noidung
        },
        success:function (giatri) {
            alert(giatri);
            window.location="product-details-default.php?Masp="+masanpham;

        }
    });
}

function TimKiemGia(gia){
    $.ajax({
        url:"ajax/TimKiemGia.php",
        type:"POST",
        data:{
            gia:gia
        },
        success:function (giatri) {
            $('#loadgia').text(giatri);

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
        // location.reload();
        $("#listcart").load("cart.php #listcart");
    });

}
function xoahang(id) {
    $.post('updatecart.php',{'id':id,'num':0},function (data) {
       location.reload();

    });

}




