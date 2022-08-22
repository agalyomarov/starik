<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Star</title>
</head>

<body class="login">
    <a href="/" class="btn btn-close">
        <img src="images/close.svg" alt="close">
    </a>
    <form class="form-signin" method="post" action="{{ route('login.store') }}">
        @csrf
        <div class="d-flex section__top">
            <h3 class="section__title">
                <img class="mr-2" src="images/user-dark.svg" alt="user" width="35" height="35" />
                Вход
            </h3>
        </div>
        <div class="form-group">
            <input id="oz_phone_input" type="text" class="form-control" placeholder="8 (___)___-__-__" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="form-group mb-0">
            <input id="password" type="password" class="form-control" placeholder="Пароль" name="password" value="{{ old('password') }}">
            <a id="eye" href="#">
                <img alt="eye" src="images/eye.svg">
            </a>
        </div>
        <p class="forget-wrap"><a class="forget" href="#">Забыли пароль?</a></p>
        @if ($errors->any())
            <p style="color:red;font-size:14px;">{{ $errors->all()[0] }}</p>
        @endif
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-dart">Войти</button>
            <a href="{{ route('register.index') }}" class="btn btn-dart">Зарегистрироваться</a>
        </div>
        <div class="btns__soc">
            {{-- <button class="btn btn-primary">
                <img src="images/facebook.svg" height="25" alt="facebook" class="mr-2">
                Sign in with Facebook
            </button> --}}
            <button type="button" onclick="window.location.href='/google'" class="btn btn-black">
                <img src="images/google.svg" height="25" alt="google" class="mr-2">
                Войти с помощю Google
            </button>
            {{-- <button class="btn btn-black">
                <img src="images/apple.svg" height="25" alt="apple" class="mr-2">
                Sign in with Apple
            </button> --}}
        </div>
    </form>
    <script src="/js/script.js"></script>
    <script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.js') }}"></script>
    <script>
        $(function() {
            $('#oz_phone_input').inputmask({
                mask: "8 (999)999-99-99",
                definitions: {
                    'X': {
                        validator: "9",
                        placeholder: "9"
                    }
                }
            });
        });
    </script>
</body>

</html>
