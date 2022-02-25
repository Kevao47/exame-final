<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faça o seu Login</title>
    <link rel="stylesheet" href="'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
</head>

<body class="bg03">
    <div class="container text-normal">
        <div class="row tm-mt-big">
            <div class="col-12 mx-auto tm-login-col">
                <div class="layer1  tm-block">
                    <div class="row">
                        <div class="col-12 text-center">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon text-center"></i>
                            <h2 class="tm-block-title mt-3 text-emphasis ">Login</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <form method="post" class="tm-login-form">
                                @csrf
                                @if (old('error'))
                                    <p class='d-flex flex-column align-items-center'>{{old('error')}}</p>
                                @endif
                                <div class="input-group">

                                    <x-DefaultInput name="username" label="Username" class='layer2 text-empashis' style="color: white;"/>

                                </div>
                                <div class="input-group mt-3">

                                    <x-DefaultInput type="password" name="password" label="Senha" class='layer2 text-empashis' style="color: white;"/>

                                </div>
                                <div class="input-group mt-3 d-flex flex-column align-items-center">
                                    <button type="submit" class="btn btn-primary d-inline-block mx-auto text-emphasis ">Login</button>
                                    <a class='mt-3' href="{{ route('criar-conta') }}">Criar Conta</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>