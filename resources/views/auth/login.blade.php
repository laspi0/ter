@extends('layouts.loginBase')

@section('content')
<div class="loader-wrapper">
    <div class="lds-ring">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<div class="card card-authentication1 mx-auto my-5">
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
                <img src="assets/images/logo-icon.png" alt="logo icon">
            </div>
            <div class="card-title text-uppercase text-center py-3">Connexion</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername" class="sr-only">Email</label>
                    <div class="position-relative has-icon-right">
                        <input type="email" class="form-control input-shadow" placeholder="Entrer votre email" id="exampleInputUsername" name="email" value="{{ old('email') }}" required autofocus>
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword" class="sr-only">Mot de passe</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" name="password" id="exampleInputPassword" required class="form-control input-shadow" placeholder="Entrer le mot de passe">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>
               
                <button type="submit" class="btn btn-light btn-block">Connexion</button>
               

            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Vous n'avez pas de compte ? <a href="{{ route('register') }}"> Inscrivez-vous ici</a></p>
    </div>
</div>

<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->

<!--start color switcher-->
<div class="right-sidebar">
    <div class="switcher-icon">
        <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

        <p class="mb-0">Texture Gaussienne</p>
        <hr>

        <ul class="switcher">
            <li id="theme1"></li>
            <li id="theme2"></li>
            <li id="theme3"></li>
            <li id="theme4"></li>
            <li id="theme5"></li>
            <li id="theme6"></li>
        </ul>

        <p class="mb-0">Arrière-plan dégradé</p>
        <hr>

        <ul class="switcher">
            <li id="theme7"></li>
            <li id="theme8"></li>
            <li id="theme9"></li>
            <li id="theme10"></li>
            <li id="theme11"></li>
            <li id="theme12"></li>
            <li id="theme13"></li>
            <li id="theme14"></li>
            <li id="theme15"></li>
        </ul>

    </div>
</div>
<!--end color switcher-->

@endsection