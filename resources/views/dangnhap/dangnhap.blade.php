<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dang nhap</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('public/fonts/flaticon.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/animate.min.css') }}">
</head>
<body>
<section class="vh-100">
    <div class="container py-5 py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem; background-color: #f0f1f3; margin-top: 45px">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Đăng nhập</h3>
                        <form action="{{URL::to('/dang-nhap/login')}}" method="post">
                            @include('components.errors')
                            @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Email</label>
                            <input type="email" id="username" name="username" class="form-control form-control-lg" value="{{old('username')}}"/>
                            @if ($errors->has('email'))
                                <p class="text-danger font-italic">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg" />
                            @if ($errors->has('password'))
                                <p class="text-danger font-italic">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-start mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                            <label class="form-check-label" for="form1Example3"> Remember password </label>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                        </form>
                        <hr class="my-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- jquery-->
<script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
</body>
</html>
