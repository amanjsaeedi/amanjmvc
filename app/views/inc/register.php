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
    <div class="container">
        <div class="vh-100 d-flex align-items-center justify-content-center">
            <div class="row w-50 text-bg-light shadow-lg rounded-5">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a id="sabtenam" class="nav-link" data-bs-toggle="tab" href="#signup">ثبت نام</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">

                    <div class="tab-pane container active p-3" id="signup">
                        <!-- sign up form -->
                        <form action="<?php echo URLROOT ?>/users/register" method="post">

                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : '' ?>"
                                    name="name" id="floatingInput" placeholder="name@example.com" />
                                <label for="floatingInput">نام و نام خانوادگی</label>
                                <div class="invalid-feedback"><?php echo $data['name_err']; ?></div>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="email"
                                    class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>"
                                    value="<?php $data['email']; ?>" name="email" id="floatingInput"
                                    placeholder="name@example.com" />
                                <label for="floatingInput">آدرس ایمیل</label>
                                <div class="invalid-feedback"><?php echo $data['email_err']; ?></div>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="password"
                                    class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>"
                                    name="password" value="<?php $data['password']; ?>" id="floatingPassword"
                                    placeholder="Password" />
                                <label for="floatingPassword">رمز عبور</label>
                                <div class="invalid-feedback"><?php echo $data['password_err']; ?></div>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="password"
                                    class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : '' ?>"
                                    name="confirm_password" value="<?php $data['confirm_password']; ?>"
                                    id="floatingPassword" placeholder="Password" />
                                <label for="floatingPassword">تکرار عبور</label>
                                <div class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></div>
                            </div>
                            <div>
                                <p class="lead text-muted">
                                    قبلا ثبت نام کرده اید؟
                                    <a href="<?php echo URLROOT; ?>/users/login">کلیک کنید</a>
                                </p>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block w-100">
                                    ثبت نام
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
                        <!-- sign up form -->
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