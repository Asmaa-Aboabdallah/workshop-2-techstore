<?php include("inc/header.php")  ?>

<?php

use TeachStore\Classes\Models\Admin;

$ad = new Admin;
$admins = $ad->selectAll("id , name,email, is_super");
//print_r($admins);

?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Admins</h3>
                    <a href=<?= AURL . "add-admin.php"?> class="btn btn-success">
                        Add Admin
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Super</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($admins as $index => $admin): ?>
                      <tr>
                        <th scope="row"><?= $index + 1; ?></th>
                        <td><?= $admin['name']; ?></td>
                        <td><?= $admin['email']; ?></td>
                        <td><?= $admin['is_super']; ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="<?= AURL ."handlers/delete-admin.php?id=". $admin['id']; ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
<?php include("inc/footer.php")  ?>