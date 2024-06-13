<!-- Post card -->
<?php foreach ($data['posts'] as $posts): ?>
    <div class="mb-2 p-4 bg-white shadow-sm">
        <div>
            <img src="<?php echo URLROOT; ?>/public/img/profile.jpg" class="profile" />
            <div class="d-inline-block">
                <span><?php echo $posts->userName; ?></span><br />
                <span class="date text-muted"><?php echo $posts->postDate; ?></span>
            </div>
            <?php if ($posts->userId == $_SESSION['user_id']): ?>
                <span class="d-inline-block float-end dropdown">
                    <a href="#" id="dropdowneditdelete" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdowneditdelete">

                        <li><a class="dropdown-item"
                                href="<?php echo URLROOT; ?>/posts/edit/<?php echo $posts->postId; ?>">ویرایش</a></li>
                        <li>
                            <a class="dropdown-item text-danger" href="#">حذف</a>
                        </li>
                    </ul>
                </span>
            <?php endif; ?>
        </div>

        <div class="row mt-1">
            <a href="<?php echo URLROOT; ?>/posts/single/<?php echo $posts->postId; ?>">
                <p class="lead title">
                    <?php echo $posts->title; ?>
                </p>
            </a>

        </div>

        <div>
            <span class="badge bg-secondary"><i class="bi bi-hash"></i>php</span>
            <span class="badge bg-secondary"><i class="bi bi-hash"></i>laravel</span>
            <span class="badge bg-secondary"><i class="bi bi-hash"></i>mvc</span>
        </div>

        <div class="mt-2">
            <span><i class="bi bi-heart"></i><small>&nbsp;لایک</small></span>
            <span class="ms-2"><i class="bi bi-chat-left"></i>
                <small>&nbsp;دیدگاه</small></span>
            <span class="float-end">
                <i class="bi bi-bookmark"></i>
            </span>
            <span class="float-end me-2"><small class="text-muted"><?php echo $posts->postTime; ?></small></span>
        </div>
    </div>
<?php endforeach; ?>
<!-- Post card -->