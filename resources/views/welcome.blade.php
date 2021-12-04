<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Tahoma" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            margin: 0;
            font-size: 10pt;
            line-height: 20px;
            color: #333;
            background: url("{{ asset('img/pattern8.png') }}");
        }
    </style>
</head>
<body style="background-color:#efefef">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>SISTEM INFORMASI AKADEMIK</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required value="{{ old('username') }}">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Login Sebagai</h5>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary" id="student">Mahasiswa</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-success" id="lecture">Dosen</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-warning" id="admin">Admin</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('student').addEventListener('click', function(){
            document.getElementById('username').value = '41815120009';
            document.getElementById('password').value = 'mahasiswa';
        });

        document.getElementById('lecture').addEventListener('click', function(){
            document.getElementById('username').value = '2153422';
            document.getElementById('password').value = 'dosen';
        });

        document.getElementById('admin').addEventListener('click', function(){
            document.getElementById('username').value = 'admin';
            document.getElementById('password').value = 'admin';
        });
    </script>
</body>