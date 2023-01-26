<?php
    include 'components/validation.php';
    include 'components/header.php';
?>

<nav class="container">
    <div class="row mt-3">
        <div id="title" class="col">Product List</div>
        <div class="col-md-auto">
            <button type="submit" form="product_form" class="btn btn-success mr-3">Save</button>
            <button type="submit" class="btn btn-danger" onclick='document.location.href="/"'>Cancel</button>
        </div>             
    </div>
</nav>
<main  class="container">
    <div id="form" class="mt-3 pl-3">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" id="product_form">
            <div class="form-group row">
                <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                <div class="col-sm-3">
                    <input id="sku" name="sku" type="text" value="<?= $product['sku']?>" class="form-control <?php echo $errors['sku'] ? 'is-invalid' : ''?>">
                    <div class="invalid-feedback  text-nowrap">
                        <?= $errors['sku'] ?>
                    </div>
                </div>  
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-3">
                    <input id="name" name="name" type="text" value="<?= $product['name']?>" class="form-control <?php echo $errors['name'] ? 'is-invalid' : ''?>">
                    <div class="invalid-feedback text-nowrap">
                        <?= $errors['name'] ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
                <div class="col-sm-3">
                    <input id="price" name="price" type="number" step="0.01" min="0.01" value="<?= $product['price']?>" class="form-control <?php echo $errors['price'] ? 'is-invalid' : ''?>">
                    <div class="invalid-feedback">
                        <?= $errors['price'] ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="productType" class="col-sm-2 col-form-label">Type Switcher</label>
                <div class="col-sm-auto">
                    <select id="productType"  name='productType' class="form-control">
                            <option <?php if (isset($type) && $type == "Def") {
                                echo "selected";
                                    }?> value="Def">Type Switcher</option>
                            <option id="DVD" <?php if (isset($type) && $type == "DVD") {
                                echo "selected";
                                    }?> value="DVD">DVD</option>
                            <option id="Furniture" <?php if (isset($type) && $type == "Furniture") {
                                echo "selected";
                                    }?> value="Furniture">Furniture</option>
                            <option id="Book" <?php if (isset($type) && $type == "Book") {
                                echo "selected";
                                    }?> value="Book">Book</option>
                    </select>
                </div>
            </div>
            <div id="specAttr"></div>  
        </form>
    </div>    
</main>
 
<?php include 'components/footer.php'?>

<?php include 'components/addFields.php'?>
