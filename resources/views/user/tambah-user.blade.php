@extends('layout.main')

@section('subhead')
    <title>Sistem arsip | Tambah User</title>
@endsection

@section('content')
    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <ul>
                    <li>
                        <a href="/dashboard" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="side-menu__title">
                                Arsip
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="/surat-masuk" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title">Surat masuk </div>
                                </a>
                            </li>
                            <li>
                                <a href="/surat-keluar" class="side-menu">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title">Surat keluar </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="side-nav__devider my-6"></li>
                    <li>
                        <a href="{{ route('user.index') }}" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title">
                                User
                            </div>
                        </a>
                    </li>

                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->
            
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        User
                    </h2>
                </div>
                <div class="grid grid-cols-30 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Input -->
                        <div class="intro-y box">

                            <div
                                class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Detail User
                                </h2>
                            </div>
                            <div id="input" class="p-5">
                                <form action="{{ route('user.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-bold ">Nama</label>
                                        <input type="text"
                                            class="form-control mt-1 @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}"
                                            placeholder="Masukkan Nama Anda">

                                        <!-- error message untuk title -->
                                        @error('name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-4">
                                        <label class="font-weight-bold ">Username</label>
                                        <input type="text"
                                            class="form-control mt-1 @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}"
                                            placeholder="Masukkan Username">

                                        <!-- error message untuk title -->
                                        @error('username')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-4">
                                        <label class="font-weight-bold ">Password</label>
                                        <input type="text"
                                            class="form-control mt-1 @error('password') is-invalid @enderror"
                                            name="password" value="{{ old('password') }}"
                                            placeholder="Masukkan Password anda" >

                                        <!-- error message untuk title -->
                                        @error('password')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="font-weight-bold mt-3">Level</label>
                                        <select name="level" aria-label="Default select example"
                                            class="tom-select mt-1 w-full">
                                            <option selected >admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label class="font-weight-bold mt-3">Upload Foto</label>
                                        <input type="file"
                                            class="form-control mt-1 @error('photo') is-invalid @enderror"
                                            name="photo">

                                        <!-- error message untuk title -->
                                        @error('photo')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4">Simpan</button>

                                    


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Content -->




        </div>



        <!-- END: Content -->
    </div>
    </div>
@endsection
