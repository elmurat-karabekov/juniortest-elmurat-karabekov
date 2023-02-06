<div class = "form-group row">
    <label for = "size" class = "col-sm-2 col-form-label text-nowrap" >Size(MB)</label>
    <div class = "col-sm-3">
        <input id = "size" name = "size" type = "number" min="1" value = "<?= $product['size']?>" class = "form-control <?php echo $errors['size'] ? 'is-invalid' : ''?>">
        <div class = "invalid-feedback">
            <?= $errors['size'] ?>
        </div>
        <p class="text-nowrap" style="font-size: 14px; padding-top: 5px;">Please provide the size of the DVD-disk in MB format.</p>
    </div>
</div>