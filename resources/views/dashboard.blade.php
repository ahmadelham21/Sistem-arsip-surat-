@extends('layout.main')
@section('subhead')
    <title>Sistem arsip | Dashboard</title>
@endsection

@section('content')
    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <ul>
                    <li>
                        <a href="#" class="side-menu side-menu--active">
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
                        <a href="{{ route('user.index') }}" class="side-menu side-menu">
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
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 2xl:col-span-9">
                        <div class="grid grid-cols-12 gap-6">
                            <!-- BEGIN: General Report -->
                            <div class="col-span-12 mt-8">
                                <div class="intro-y flex items-center h-10">
                                    <div class="-intro-x text-dark font-medium text-2xl leading-tight mt-3">
                                        Selamat Datang, {{ Auth::user()->name }}!
                                    </div>
                                    <a href="" class="ml-auto flex items-center text-primary"> <i
                                            data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                                </div>


                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <a href="{{ route('surat-masuk.suratmasuk') }}">
                                                    <div class="flex">
                                                        <i data-lucide="archive" class="report-box__icon text-success"></i>
                                                    </div>
                                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $surat_masuk }}
                                                    </div>
                                                    <div class="text-base text-slate-500 mt-1">Total Surat Masuk</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <a href="{{ route('surat-keluar.suratkeluar') }}">
                                                    <div class="flex">
                                                        <i data-lucide="archive" class="report-box__icon text-danger"></i>

                                                    </div>
                                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $surat_keluar }}
                                                    </div>
                                                    <div class="text-base text-slate-500 mt-1">Total Surat Keluar</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <a href="{{ route('user.index') }}">
                                                    <div class="flex">
                                                        <i data-lucide="users" class="report-box__icon text-success"></i>
                                                    </div>
                                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $user }}
                                                    </div>
                                                    <div class="text-base text-slate-500 mt-1">Total Admin</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- END: General Report -->





                        </div>


                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
    </div>
@endsection
