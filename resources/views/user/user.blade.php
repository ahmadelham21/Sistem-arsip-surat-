@extends('layout.main')

@section('subhead')
    <title>Sistem arsip | User</title>
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
            {{-- <!-- BEGIN: Content -->
            <div class="content">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 2xl:col-span-9">
                        <div class="grid grid-cols-12 gap-6">
                            <!-- BEGIN: General Report -->
                            @foreach ($user as $item)


                                <h1>{{ $item->name }}</h1><br>
                                <!-- END: General Report -->
                            @endforeach --}}
            <!-- BEGIN: Content -->
            <div class="content">
                <h2 class="intro-y text-lg font-medium mt-10">
                    Tampilan User
                </h2>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                        <div class="mr-auto">
                            <a href="{{ route('user.tambah') }}">
                                <button class="btn btn-primary shadow-md mr-2 mr-auto"> <i data-lucide="plus"
                                        class="w-4 h-4 mr-2"></i>tambah User</button>
                            </a>
                        </div>


                        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <div class="w-56 relative text-slate-500">
                                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN: Users Layout -->

                    @foreach ($user as $item)
                        <div class="intro-y col-span-12 md:col-span-6">
                            <div class="box">
                                <div class="flex flex-col lg:flex-row items-center p-5">
                                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                        <img alt="Foto Admin" class="rounded-full"
                                            src="{{ asset('storage/Photo/' . $item->photo) }}">
                                    </div>
                                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{ $item->name }}</a>
                                        <div class="text-slate-500 text-xs mt-0.5">{{ $item->level }}</div>
                                    </div>
                                    <div class="flex mt-4 lg:mt-0">
                                        <a href="{{ route('user.detail', $item->id) }}">
                                            <button class="btn btn-primary py-1 px-2 mr-2">detail</button>
                                        </a>
                                        <a href="{{ route('user.hapus', $item->id) }}">
                                            <button class="btn btn-danger py-1 px-2"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- BEGIN: Users Layout -->

                </div>
            </div>
            <!-- END: Content -->




        </div>



        <!-- END: Content -->
    </div>
    </div>
@endsection
