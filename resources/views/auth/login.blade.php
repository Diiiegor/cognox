<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/global.css')}}">


    <title>Cognox bank</title>
</head>
<body>


<div class="fondo">
    <div class="login-box">
        <div class="form-box">
            <form action="{{route('authenticate')}}" id="loginForm" method="POST">
                @csrf
                <p class="subtitle">Cognox</p>
                <p class="title">Iniciar sesion</p>
                <input value="{{old('identificacion')}}" type="text" required name="identificacion" id="identificacion"
                       class="input mt-10"
                       placeholder=" &#xF2C2;   Número de identificación"
                       style="font-family: Nunito,FontAwesome">
                <input value="{{old('clave')}}" type="password" required name="clave" id="clave" maxlength="4"
                       minlength="4" class="input mt-10"
                       placeholder=" &#xf09c;   * * * *"
                       style="font-family: Nunito,FontAwesome">
                <button class="btn mt-10 btn-primary"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
            </form>
        </div>

        @if($errors->any())
            <div class="error-box">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</div>

<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/messages_es.js')}}"></script>
<script src="{{asset('assets/js/login.js')}}"></script>


</body>
</html>
