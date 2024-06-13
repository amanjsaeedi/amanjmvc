<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.rtl.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css" />
    <title><?php echo SITENAME; ?></title>
</head>

<body class="bg-light">
    <header>
        <!-- navbar -->
        <div class="navbar navbar-expand-md bg-white shadow-sm">
            <div class="container">
                <a href="<?php echo URLROOT; ?>/posts/index" class="navbar-brand text-bg-dark rounded-2 p-1"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="شبکه اجتماعی برنامه نویسان">Programmer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <form action="#" class="d-flex ms-auto py-2 w-auto">
                        <input type="text" class="form-control me-1" placeholder="جستجو" />
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                    <div class="ms-auto">
                        <a class="h3">

                            <?php if (isset($_SESSION['user_id'])) { ?>
                                <div class="dropdown">
                                    <img src="<?php echo URLROOT; ?>/img/profile.jpg" class="avatar" />
                                    <a href="" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="bi bi-caret-down-fill"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownUser">
                                        <li><a class="dropdown-item" href="#"><?php echo $_SESSION['user_name']; ?></a>
                                        </li>
                                        <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">خروج</a>
                                        </li>
                                    </ul>
                                </div>
                            <?php } else { ?>
                                <div class="dropdown">
                                    <i class="bi bi-person-circle"></i>
                                    <a href="" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="bi bi-caret-down"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownUser">
                                        <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/users/login">ورود</a></li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>