<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cognox bank</title>
    @yield('styles')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
</head>
<body>

<div class="main_container">

    <p class="subtitle">{{auth()->user()->str_name}}</p>
    <div class="flex">
        <p class="title">{{auth()->user()->str_email}} - </p>
        <p class="subtitle">{{auth()->user()->int_identificacion}}</p>
    </div>

    <header class="header">
        <ul class="header_list">
            <li><a class="nav_link" href="{{route('home')}}"> <i class="fas fa-home"></i> &nbsp; Inicio</a></li>
            <li><a class="nav_link" href="{{route('transacciones.home')}}"> <i class="fas fa-compress-alt"></i> &nbsp;
                    Transacciones bancarias</a></li>
            <li><a class="nav_link" href=""><i class="fas fa-tachometer-alt"></i> &nbsp; Estado de cuenta</a></li>
            <li>
                <a class="nav_link" href=""
                   onclick="cerrarSesion(event)"><i
                        class="fas fa-sign-out-alt"></i> &nbsp; Salir</a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </header>


    <section>
        @yield('content')
        <div id="ajaxScreens">

        </div>
    </section>

</div>
<script src="https://kit.fontawesome.com/336ef094a4.js" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/messages_es.js')}}"></script>
<script src="{{asset('assets/js/global.js')}}"></script>
@yield('scripts')
</body>
</html>
