$(document).ready(function () {
    $(".city").change(function () {
        var id=$(".city").val();
        $.post("district.php",{id: id},function (data) {
            $(".tinh").html(data);

        })

    });

});
//shipping
$(document).ready(function () {
    $(".city").change(function () {
        var id=$(".city").val();
        $.post("phiship.php",{id: id},function (data) {
            $(".ship").html(data);

        })

    });

});
//tongtien
$(document).ready(function () {
    $(".city").change(function () {
        var id=$(".city").val();
        $.post("tongtien.php",{id: id},function (data) {
            $(".tongtien").html(data);

        })

    });

});