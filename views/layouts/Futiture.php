<div class = "form-group row">
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
</div>