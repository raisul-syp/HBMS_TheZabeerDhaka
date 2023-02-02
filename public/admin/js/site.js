window.addEventListener('close-modal', event => {
    $('#deleteModal').modal('hide');
});

$(document).ready(function() {
    feather.replace();

    $('.js-basic-single').select2();

    $('[data-toggle="tooltip"]').tooltip();

    $('#long_description').summernote({
        height: 200,
        focus: true,
        placeholder: 'Add Long Description...',
    });

    $('#date_of_birth').datepicker({
        dateFormat: 'yyyy-mm-dd',
    });

    $('.dropify').dropify();
});

$(function() {
    $("#has_discount").click(function() {
        if ($(this).is(":checked")) {
            $("#discount_rate").removeAttr("readonly");
        } else {
            $("#discount_rate").attr("readonly", "readonly");
        }
    });
});

$(document).on("change keyup blur", "#discount_rate", function() {
    var actualPrice = $('#price').val();
    var discountRate = $('#discount_rate').val();
    var discont = (actualPrice * discountRate) / 100;
    var discount_price = actualPrice - discont;
    $('#discount_price').val(discount_price);
});

$(function () {
    thisyear = new Date().getFullYear();
    $('.copyright-year').text(thisyear);
});


