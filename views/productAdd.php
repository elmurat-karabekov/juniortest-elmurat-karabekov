    <title>Add Product</title>
</head>
<body>
    <nav class="container">
        <div class="row mt-3">
            <div id="title" class="col">Add Product</div>
            <div class="col-md-auto">
                <button type="submit" form="product_form" class="btn btn-success mr-3">Save</button>
                <button type="submit" class="btn btn-danger" onclick='document.location.href="/"'>Cancel</button>
            </div>             
        </div>
    </nav>
    <main  class="container">
            <div id="form" class="mt-3 pl-3">
                <form action="/add-product" method="post" id="product_form">
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
                                    <option <?php if (isset($type) && $type == "Def") {echo "selected";}?> 
                                        value="Def">Type Switcher</option>
                                    <option id="DVD" <?php if (isset($type) && $type == "DVD") {echo "selected";}?> 
                                        value="DVD">DVD</option>
                                    <option id="Furniture" <?php if (isset($type) && $type == "Furniture") {echo "selected";}?> 
                                        value="Furniture">Furniture</option>
                                    <option id="Book" <?php if (isset($type) && $type == "Book") {echo "selected";}?> 
                                        value="Book">Book</option>
                            </select>
                        </div>
                    </div>
                    <div id="specAttrs">
                        <div id="dvdAttrs">
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
                        </div>
                        <div id="furnitureAttrs">
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
                        </div>
                        <div id="bookAttrs">
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
                        </div>
                    </div>
                </form>
            </div>    
        </div>
    </main>
    <script src="fields.js"></script>
