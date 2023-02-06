<div class = "form-group row">
    <label for = "weight" class = "col-sm-2 col-form-label">Weight(KG)</label >
    <div class = "col-sm-3">
        <input id = "weight" name = "weight" type = "number" min="1" value = "<?= $product['weight']?>" class = "form-control <?php echo $errors['weight'] ? 'is-invalid' : ''?>">
        <div class = "invalid-feedback" >
            <?= $errors['weight'] ?>
        </div >
        <p class="text-nowrap" style="font-size: 14px; padding-top: 5px;">Please provide the weight of the book in Kg format.</p>
    </div>
</div>