$(document).ready(function () {
    var fields = {
        def: '',
        dvd: $('#dvdAttrs').clone(),
        furniture: $('#furnitureAttrs').clone(),
        book: $('#bookAttrs').clone()
    }

    $('#specAttrs').empty();

    let type = $('#productType').val().toLowerCase();

    console.log(type);
    
    $('#specAttrs').append(fields[type]);

    $('#productType').change(function () {
        $('#specAttrs').empty();
        $('#specAttrs').append(fields[this.value.toLowerCase()]);
    });

    $("#sku").keyup(function () {
        var val = $(this).val();
        $(this).val(val.toUpperCase());
    })
})  