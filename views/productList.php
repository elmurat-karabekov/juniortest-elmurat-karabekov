    <title>Product List</title>
</head>
<body>
    <nav class="container ">
        <div class="row mt-3">
            <div id="title" class="col">Product List</div>
            <div class="col-md-auto">
                <a class="btn btn-success mr-3" href="/add-product">ADD</a>
                <button id='delete-product-btn' class="btn btn-danger" type="submit" form="form1" name="mass-delete">MASS DELETE</button>
            </div>
                        
        </div>
    </nav>
    <main class="container">
        <form action="/" method="POST" id="form1">
            <div id="list">
                <div class="container-fluid container-list">
                    <div class="row">                    
                        <?php foreach ($products as $product) : ?>
                            <div class="col-3 mb-3">
                                <div class="item rounded pt-3">
                                    <input class='delete-checkbox ml-3' type="checkbox" name="delete[]" value="<?= $product->getId() ?>">
                                    <div class="text-center pt-1">
                                        <?= $product->getSku() ?>
                                        <br>
                                        <?= $product->getName() ?>
                                        <br>
                                        <?= $product->getPrice() . " $"?>
                                        <br>
                                        <?= $product->getSpecAttrs() ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>  
                <div>
            </div> 
        </form>
    </main>
