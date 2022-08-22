<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Star</title>
    <style>
        .hide {
            display: none;
            position: absolute;
        }
    </style>
</head>

<body class="register">
    <a href="/" class="btn btn-close">
        <img src="images/close.svg" alt="close">
    </a>
    <form class="form-signin" method="post" action="{{ route('register.store') }}">
        @csrf
        <div class="d-flex section__top">
            <h3 class="section__title">
                <img class="mr-2" src="images/user-dark.svg" alt="user" width="35" height="35" />
                Регистрация
            </h3>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <input style="color:#140050;" id="oz_phone_input" type="text" class="form-control" placeholder="8 (___)___-__-__" oninput="changePhone(this)" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="form-group">
            <input id="input_for_code" type="text" class="form-control" placeholder="Код подверждение" name="code">
        </div>
        <div class="form-group">
            <button id="btn_for_get_code" type="button" style="width:100%;" class="btn btn-dart">Получить код</button>
        </div>
        <div class="form-group">
            <input type="first_name" class="form-control" placeholder="Имя" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <input type="last_name" class="form-control" placeholder="Фамилия" name="last_name" value="{{ old('last_name') }}">
        </div>
        <div class="form-group">
            <input type="patronymic" class="form-control" placeholder="Отчество" name="patronymic" value="{{ old('patronymic') }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Дата рождение" onclick="changeType(this)" name="birthday" value="{{ old('birthday') }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Ссылка один из соц.сетей" name="soc_link" value="{{ old('soc_link') }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Адресс (необязательно)" name="adress" value="{{ old('adress') }}">
        </div>
        <div class="form-group">
            <textarea placeholder="О себя (необязательно)" style="width:100%;height:5rem" class="form-control" name="about">{{ old('about') }}</textarea>
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control" placeholder="Пароль" name="password" value="{{ old('password') }}">
            <a id="eye" href="javascript:void(0)">
                <img alt="eye" src="images/eye.svg">
            </a>
        </div>
        <div class="form-group">
            <input id="password2" type="password" class="form-control" placeholder="Введите пароль еще раз" name="password_confirmation" value="{{ old('password_confirmation') }}">
            <a id="eye2" href="javascript:void(0)">
                <img alt="eye" src="images/eye.svg">
            </a>
        </div>
        @if ($errors->any())
            <p style="color:red;font-size:14px;">{{ $errors->all()[0] }}</p>
        @endif
        <div class="d-flex justify-content-between mb-4">
            <button class="btn btn-dart" type="submit">Зарегистрироваться</button>
            <a href="{{ route('login.index') }}" class="btn btn-dart">Войти</a>
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
    <script>
        const btn_for_get_code = document.getElementById("btn_for_get_code");
        const input_for_code = document.getElementById("input_for_code");

        function changeType(target) {
            target.setAttribute('type', 'date');
        }
    </script>
    <script script script src="/js/script.js"></script>
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
    <script>
        function changePhone(target) {
            if (target.value.replace(/\D/g, '').length == 11) {
                // btn_for_get_code.classList.remove('hide');
                // btn_for_get_code.removeAttribute('disabled');

            } else {
                // btn_for_get_code.classList.add('hide');
                // input_for_code.classList.add('hide');
                // input_for_code.value = "";
                // btn_for_get_code.setAttribute('disabled', true);
            }
        }
        btn_for_get_code.addEventListener('click', function(e) {
            if (document.querySelector('#oz_phone_input').value.replace(/\D/g, '').length == 11) {
                input_for_code.classList.remove('hide');
                this.setAttribute('disabled', true);
                const body = {
                    phone: document.querySelector('#oz_phone_input').value
                }
                fetch('/sms/store', {
                        method: 'post',
                        body: JSON.stringify(body),
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json'
                        }
                    }).then(res => res.text())
                    .then(data => {
                        console.log(data)
                    })
            }

        });
    </script>
</body>

</html>
