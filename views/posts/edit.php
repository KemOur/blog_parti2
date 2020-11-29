<?php $this->layout('layouts/default', ['title' => 'My blog']) ?>

<h2>Update an article</h2>

<?php if (!empty($_SESSION['error'])) : ?>
    <div class="error"><?= $_SESSION['error'] ?></div>
<?php endif ?>

<form action="<?= "/edit?id=" . $_GET['id'] ?>" method="post">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="form-row">
                        <?php require __DIR__ . "/_form.php" ?>
                        <button type="submit" class="btn btn-info" style="color: white" >Update</button>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</form>