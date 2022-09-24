<?php include("inc/header.php")  ?>

<?php

use TeachStore\Classes\Models\Product;
use TeachStore\Classes\Models\Cat;
$c = new Cat;
$cats = $c->selectAll('id , name');


if ($request->getHas('id')){
    $id = $request->get('id');
}else{
    $id = 1;
}

$pr = new Product;
$prod = $pr->selectId($id ,"products.id AS prodId,  products.name AS prodName , `desc` , cat_id , cats.name AS catName, 
    img ,pieces_no , price");




?>



    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Product : 
                    <?php if (! empty($prod)):  ?>
                         <?= $prod['prodName']; ?>
                    <?php endif;?>
                </h3>

                <div class="card">
                    <div class="card-body p-5">
                        <?php include(APATH ."inc/errors.php") ?>
                        <form method="POST" action="<?= AURL . "handlers/edit-product.php?id=". $id;?>" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" value="<?php if (! empty($prod)){ echo $prod['prodName']; } ?>" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="cat_id">
                                <?php if (! empty($prod)):  ?>
                                    <?php foreach($cats as $cat): ?>
                                            <option value="<?= $cat['id']; ?>" <?php if($cat['id'] == $prod['cat_id']) {echo "selected";} ?>> <?= $cat['name']?> </option>
                                    <?php endforeach; ?>
                                <?php endif;?>
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" value="<?= $prod['price']; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Pieces</label>
                                <input type="number" name="pieces_no" value="<?= $prod['pieces_no']; ?>" class="form-control">
                            </div>
  
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="desc" rows="3"><?php if (! empty($prod)):  ?><?= $prod['desc']; ?><?php endif;  ?></textarea>
                            </div>
                            

                            <?php if (! empty($prod)):  ?>
                                <div class="mb-4 d-flex justify-content-center">
                                    <img src="<?= URL . "uploads/" . $prod['img']; ?>" height="100px" alt="" class="src">
                                </div>
                            <?php endif; ?>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="img">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div>
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                                <a class="btn btn-dark" href="<?= AURL; ?>products.php">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
 
<?php include("inc/footer.php");  ?>