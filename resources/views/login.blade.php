<!DOCTYPE html>
<!--
Template Name: Icewall - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo-white.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Login - Sistem manajemen arsip</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">

                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3"> Sistem Manajemen Arsip </span>
                </a>
                <div class="my-auto ">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-60 -mt-16"
                        src="{{ asset('dist/images/logo-white.png') }}">
                    <div class="-intro-x text-white font-medium text-3xl leading-tight mt-10">
                        SMP Muhammadiyah 5 Samarinda

                    </div>
                    <div class="-intro-x text-white font-medium text-2xl leading-tight mt-3 ">
                        Sekolah Berkemajuan
                    </div>
                    <div class="-intro-x text-lg text-white text-opacity-70 dark:text-slate-400">Beriman, Berilmu,
                        Berakhlaq Mulia</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Masuk
                    </h2>
                    <form action="{{ url('proses_login') }}" method="POST" id="logForm">
                        @csrf

                        <div class="intro-x mt-8">
                            <div class="form-group">
                                @error('login_gagal')
                                    {{-- <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span> --}}
                                    <div class="alert alert-danger alert-dismissible show flex items-center mb-2"
                                        role="alert"> <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i>
                                        {{ $message }} <button type="button" class="btn-close" data-tw-dismiss="alert"
                                            aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button> </div>

                                @enderror

                                <input type="text" class="intro-x login__input form-control py-3 px-4 block"
                                    id="inputEmailAddress" name="username" placeholder="Masukkan Username" required />
                                @if ($errors->has('username'))
                                    <span class="error">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-group">

                                <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4"
                                    id="inputPassword" name="password" placeholder="Masukkan Password" required />
                                @if ($errors->has('password'))
                                    <span class="error">{{ $errors->first('password') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>

                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Masuk</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>

    <!-- BEGIN: JS Assets-->
    <script src="dist/js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>
