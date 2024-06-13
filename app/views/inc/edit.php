<div class="container">
    <?php flash('post_message'); ?>
    <div class="my-2 p-4 bg-white shadow-sm">
        <div class="mb-3">
            <a class="btn btn-danger" href="<?php echo URLROOT; ?>/posts/index">بازگشت</a>
        </div>
        <div class="bg-secondary text-white p-2 mb-3">
            نوشته شده توسط <?php echo $data['user']->username; ?> در تاریخ
            <?php echo $data['post']->date ?> ساعت <?php echo $data['post']->time; ?>
        </div>
        <h3 class="mb-2">ویرایش پست</h3>
        <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
            <div class="form-floating mb-2">
                <input type="text" class="form-control " placeholder="عنوان..." id="title" name="title"
                    value="<?php echo $data['post']->title; ?>" />
                <label for="title">عنوان</label>
            </div>

            <div class="form-floating mb-2">
                <textarea class="form-control " placeholder="توضیحات" id="descriptionLabel" style="height: 15rem"
                    name="description"><?php echo $data['post']->description; ?></textarea>
                <label for="descriptionLabel">توضیحات</label>
            </div>

            <div class="mb-2">
                <button type="submit" class="btn btn-warning d-block w-100">بروزرسانی</button>
            </div>
        </form>
    </div>
</div>