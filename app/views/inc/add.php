<div class="container">
    <?php flash('post_message'); ?>
    <div class="my-2 p-4 bg-white shadow-sm">
        <div class="mb-3">
            <a class="btn btn-light" href="<?php echo URLROOT; ?>/posts/index">بازگشت</a>
        </div>
        <h3 class="mb-2">اضافه کردن پست جدید</h3>
        <form action="<?php echo URLROOT; ?>/posts/add" method="post">
            <div class="form-floating mb-2">
                <input type="text" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '' ?>"
                    placeholder="عنوان..." id="title" name="title" />
                <label for="title">عنوان</label>
                <div class="invalid-feedback"><?php echo $data['title_err']; ?></div>
            </div>

            <div class="form-floating mb-2">
                <textarea class="form-control <?php echo (!empty($data['desc_err'])) ? 'is-invalid' : '' ?>"
                    placeholder="توضیحات" id="descriptionLabel" style="height: 15rem" name="description"></textarea>
                <label for="descriptionLabel">توضیحات</label>
                <div class="invalid-feedback"><?php echo $data['desc_err']; ?></div>
            </div>

            <div class="mb-2">
                <button type="submit" class="btn btn-success d-block w-100">ذخیره کردن</button>
            </div>
        </form>
    </div>
</div>