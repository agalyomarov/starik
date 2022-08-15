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
    <form class="form-signin">
        <div class="d-flex section__top">
            <h3 class="section__title">
                <img class="mr-2" src="images/user-dark.svg" alt="user" width="35" height="35" />
                Вход
            </h3>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group mb-0">
            <input id="password" type="password" class="form-control" placeholder="Пароль">
            <a id="eye" href="#">
                <img alt="eye" src="images/eye.svg">
            </a>
        </div>
        <p class="forget-wrap"><a class="forget" href="#">Забыли пароль?</a></p>
        <div class="d-flex justify-content-between">
            <button class="btn btn-gray" disabled>Войти</button>
            <a href="{{ route('register.index') }}" class="btn btn-dart">Зарегистрироваться</a>
        </div>
        <div class="btns__soc">
            <button class="btn btn-primary mb-2">
                <img src="images/facebook.svg" height="25" alt="facebook" class="mr-2">
                Sign in with Facebook
            </button>
            <button class="btn btn-light mb-2">
                <img src="images/google.svg" height="25" alt="google" class="mr-2">
                Sign in with Google
            </button>
            <button class="btn btn-black">
                <img src="images/apple.svg" height="25" alt="apple" class="mr-2">
                Sign in with Apple
            </button>
        </div>
    </form>
    <script src="/js/script.js"></script>
</body>

</html>
