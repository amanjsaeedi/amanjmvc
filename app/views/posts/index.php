<?php require APPROOT . '/views/inc/header.php' ?>
<div class="container">
    <div class="row mt-2">
        <?php require APPROOT . '/views/inc/leftbar.php' ?>
        <!-- main col -->
        <div class="col col-lg-8">
            <div class="mb-2 p-2 bg-white shadow-sm">
                <a class="btn btn-success" href="<?php echo URLROOT; ?>/posts/add">پست جدید</a>
            </div>
            <?php require APPROOT . '/views/inc/post.php' ?>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>