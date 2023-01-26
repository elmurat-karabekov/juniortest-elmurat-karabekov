<script>
    $(document).ready(function () {
        var content = {
            Def: ``,
            DVD: `<div class = "form-group row">
                        <label for = "size" class = "col-sm-2 col-form-label text-nowrap" >Size(MB)</label>
                        <div class = "col-sm-3">
                            <input id = "size" name = "size" type = "number" min="1" value = "<?= $product['size']?>" class = "form-control <?php echo $errors['size'] ? 'is-invalid' : ''?>">
                            <div class = "invalid-feedback">
                                <?= $errors['size'] ?>
                            </div>
                            <p class="text-nowrap" style="font-size: 14px; padding-top: 5px;">Please provide the size of the DVD-disk in MB format.</p>
                        </div>
                    </div>`,
            Furniture: `<div class = "form-group row">
                            <label for = "height" class = "col-sm-2 col-form-label" >Height(CM)</label>
                            <div class = "col-sm-3">
                                <input id = "height" name = "height" type = "number" min="1" value = "<?= $product['height']?>" class = "form-control <?php echo $errors['height'] ? 'is-invalid' : ''?>">
                                <div class = "invalid-feedback">
                                    <?= $errors['height'] ?>
                                </div>
                            </div>
                        </div>
                        <div class = "form-group row">
                            <label for = "width" class = "col-sm-2 col-form-label">Width(CM)</label>
                            <div class = "col-sm-3">
                                <input id = "width" name = "width" type = "number" min="1" value = "<?= $product['width']?>" class = "form-control <?php echo $errors['width'] ? 'is-invalid' : ''?>">
                                <div class = "invalid-feedback">
                                    <?= $errors['width'] ?>
                                </div>
                            </div>
                        </div>
                        <div class = "form-group row">
                            <label for = "length" class = "col-sm-2 col-form-label" >Length(CM)</label >
                            <div class = "col-sm-3">
                                <input id = "length" name = "length" type = "number" min="1" value = "<?= $product['length']?>" class = "form-control <?php echo $errors['length'] ? 'is-invalid' : ''?>">
                                <div class = "invalid-feedback">
                                    <?= $errors['length'] ?>
                                </div>
                                <p class="text-nowrap" style="font-size: 14px; padding-top: 5px;">Please provide the dimensions of the furniture in HxWxL format.</p>
                            </div>
                        </div>`,
            Book: `<div class = "form-group row">
                        <label for = "weight" class = "col-sm-2 col-form-label">Weight(KG)</label >
                        <div class = "col-sm-3">
                            <input id = "weight" name = "weight" type = "number" min="1" value = "<?= $product['weight']?>" class = "form-control <?php echo $errors['weight'] ? 'is-invalid' : ''?>">
                            <div class = "invalid-feedback" >
                                <?= $errors['weight'] ?>
                            </div >
                            <p class="text-nowrap" style="font-size: 14px; padding-top: 5px;">Please provide the weight of the book in Kg format.</p>
                        </div>
                    </div>`
            }
    
        let type = $('#productType').val();
    
        $('#specAttr').append(content[type]);
    
        $('#productType').change(function () {
            $('#specAttr').empty();
            $('#specAttr').append(content[this.value]);
        });
    
        $("#sku").keyup(function () {
            var val = $(this).val();
            $(this).val(val.toUpperCase());
        })
    })     
</script>