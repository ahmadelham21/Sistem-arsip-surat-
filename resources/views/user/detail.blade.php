@extends('layout.main')

@section('subhead')
    <title>Sistem arsip | Detail User</title>
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
                        Surat masuk
                    </h2>
                </div>
                <div class="grid grid-cols-30 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Input -->
                        <div class="intro-y box">

                            
                            <div
                                class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Detail surat masuk
                                </h2>
                            
                                <a href="{{ route('user.index') }}">
                                    <button class="tooltip btn btn-pending w-28 mr-2 mb-2" title="Kembali"> <i
                                            data-lucide="corner-up-left" class="w-4 h-4 mr-2"></i> Kembali </button> </a>
                            </div>
                            <div id="input" class="p-5">
                                <div class="form-inline"> <label for="horizontal-form-1" class="form-label sm:w-40">Nama
                                        </label> <input id="horizontal-form-1" type="text" class="form-control"
                                        value="{{ $user->name }}" readonly> </div>
                                <div class="form-inline mt-5"> <label for="horizontal-form-1"
                                        class="form-label sm:w-40">Username</label> <input id="horizontal-form-1"
                                        type="text" class="form-control" value="{{ $user->username }}"
                                        readonly> </div>
                               
                                <div class="form-inline mt-5"> <label for="horizontal-form-1"
                                        class="form-label sm:w-40">Photo</label> <div class="dropdown-toggle w-40 h-40 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                                        role="button" aria-expanded="false" data-tw-toggle="dropdown">
                                        <img alt="Foto Admin" src="{{ asset('storage/Photo/'.$user->photo)  }}">
                                    </div>
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
