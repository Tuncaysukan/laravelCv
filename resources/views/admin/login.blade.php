<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tncy Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <!-- End layout styles -->
    <!-- Swetalert layout-->
    <link rel="stylesheet" href="{{asset('admin/assets/dist/sweetalert2.css')}}">
    <!-- Swetalert layout-->

    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}"/>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">

                        <form action="" method="post" id="loginForm">
                            @csrf
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" class="form-control p_input" id="email" name="email"
                                       value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <label for="password">Şifre *</label>
                                <input type="password" class="form-control p_input" name="password" id="password">
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <a href="#" class="forgot-pass">Forgot password</a>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block enter-btn " id="btnLogin">Login
                                </button>
                            </div>
                            <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/assets/js/misc.js')}}"></script>
<script src="{{asset('admin/assets/js/settings.js')}}"></script>
<script src="{{asset('admin/assets/js/todolist.js')}}"></script>
<script src="{{asset('admin/assets/dist/sweetalert2.all.js')}}"></script>

<script>
    $('#btnLogin').click(function () {
        event.preventDefault();
            let email = document.querySelector('#email').value;
            let password = document.querySelector('#password').value;
            if (email.trim() === '') {
                Swal.fire({
                    icon: 'danger',
                    title: 'Birşeyler Ters  Gitti...',
                    text: 'Email Boş Olamaz !',
                    confirmButtonText: 'Tamam'

                })
            } else if (!emailControl(email)) {
                alert('Geçerli  Bir Email  Girin');
            } else if (password.trim() === '') {
                alert('Geçerli Bir Şifre Girin')
            } else {
                $('#loginForm').submit();
            }
        }
    );

    function emailControl(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);

    }

</script>
<!-- endinject -->
</body>
</html>
