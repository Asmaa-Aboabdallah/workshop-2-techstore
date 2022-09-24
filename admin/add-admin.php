<?php include("inc/header.php")  ?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Admin</h3>
                <div class="card">
                    <div class="card-body p-5">
                    <?php include(APATH ."inc/errors.php") ?>
                        <form method="POST" action="<?= AURL; ?>handlers/add-admin.php">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text"  name="name" class="form-control"> 
                            </div>

                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Super?</label>
                              <input type="radio" name="is_super" value="Yes" >Yes
                              <input type="radio" name="is_super" value="No" checked>No
                              
                            </div>


                              
                            <div class="text-center mt-5">
                                <button type="submit" name="Add" class="btn btn-primary">Add</button>
                                <a class="btn btn-dark" href="<?= AURL; ?>admins.php">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
 

<?php include("inc/footer.php")  ?>