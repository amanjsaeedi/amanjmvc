<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/bootstrap.rtl.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/style.css" />
    <title>ورود</title>
</head>

<body class="bg-body-secondary">

    <?php flash('register_success') ?>


    <div class="container">
        <div class="vh-100 d-flex align-items-center justify-content-center">
            <div class="row w-50 text-bg-light shadow-lg rounded-5">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a id="voroud" class="nav-link active" data-bs-toggle="tab" href="#login">ورود</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active p-3" id="login">
                        <!-- login form -->
                        <form action="<?php echo URLROOT ?>/users/login" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" name="username"
                                    class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : '' ?>"
                                    value="<?php $data['username']; ?>" id="floatingInput" />
                                <label for="floatingInput">نام کاربری</label>
                                <div class="invalid-feedback"><?php echo $data['username_err']; ?></div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="password"
                                    class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>"
                                    value="<?php $data['password']; ?>" id="floatingPassword" placeholder="Password" />
                                <label for="floatingPassword">رمز عبور</label>
                                <div class="invalid-feedback"><?php echo $data['password_err']; ?></div>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault">
                                    فراموشی رمز عبور
                                </label>
                            </div>

                            <div>
                                <p class="lead text-muted">
                                    حساب کاربری ندارید؟
                                    <a href="<?php echo URLROOT; ?>/users/register">کلیک کنید</a>
                                </p>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block w-100">
                                    ورود
                                </button>
                            </div>

                            <hr class="d-block w-50 mx-auto w-50 mb-3" />
                            <div class="mb-3">
                                <button class="btn btn-danger btn-block w-100">
                                    <i class="bi bi-google text-white d-inline-block me-1"></i>
                                    ورود با حساب گوگل
                                </button>
                            </div>
                        </form>
                        <!-- login form -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- scripts -->
    <script src="<?php echo URLROOT ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URLROOT ?>js/main.js"></script>
</body>

</html>