@extends('layout.main')

@section('subhead')
    <title>Sistem arsip | detail surat keluar</title>
@endsection

@section('content')
    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <ul>
                    <li>
                        <a href="/dashboard" class="side-menu side-menu">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="side-menu__title">
                                Arsip
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="side-menu__sub-open">
                            <li>
                                <a href="/surat-masuk" class="side-menu ">
                                    <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                                    <div class="side-menu__title">Surat masuk </div>
                                </a>
                            </li>
                            <li>
                                <a href="/surat-keluar" class="side-menu side-menu--active">
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
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Surat keluar
                    </h2>
                </div>
                <div class="grid grid-cols-30 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Input -->
                        <div class="intro-y box">

                            <div
                                class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Detail surat keluar
                                </h2>
                                <a href="{{ route('surat-keluar.edit',$surat_keluar->id_suratkeluar) }}">
                                <button class="tooltip btn btn-primary w-28 mr-2 mb-2" title="Edit data"> <i
                                        data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit Data </button></a>
                                <a href="{{ route('surat-keluar.suratkeluar') }}">
                                    <button class="tooltip btn btn-pending w-28 mr-2 mb-2" title="Kembali"> <i
                                            data-lucide="corner-up-left" class="w-4 h-4 mr-2"></i> Kembali </button> </a>
                            </div>
                            <div id="input" class="p-5">
                                <div class="form-inline"> <label for="horizontal-form-1" class="form-label sm:w-40">Tanggal
                                        Masuk</label> <input id="horizontal-form-1" type="text" class="form-control"
                                        value="{{ $surat_keluar->tanggalmasuk_suratkeluar }}" readonly> </div>
                                <div class="form-inline mt-5"> <label for="horizontal-form-1"
                                        class="form-label sm:w-40">Kode Surat</label> <input id="horizontal-form-1"
                                        type="text" class="form-control" value="{{ $surat_keluar->kode_suratkeluar }}"
                                        readonly> </div>
                                <div class="form-inline mt-5"> <label for="horizontal-form-1"
                                        class="form-label sm:w-40">Ketegori Surat</label> <input id="horizontal-form-1"
                                        type="text" class="form-control" value="{{ $surat_keluar->tipe }}" readonly>
                                </div>
                                <div class="form-inline mt-5"> <label for="horizontal-form-1"
                                        class="form-label sm:w-40">Nomor Surat</label> <input id="horizontal-form-1"
                                        type="text" class="form-control" value="{{ $surat_keluar->nomor_suratkeluar }}"
                                        readonly> </div>
                                <div class="form-inline mt-5"> <label for="horizontal-form-1"
                                        class="form-label sm:w-40">Tanggal Surat</label> <input id="horizontal-form-1"
                                        type="text" class="form-control"
                                        value="{{ $surat_keluar->tanggalsurat_suratkeluar }}" readonly> </div>
                                <div class="form-inline mt-5"> <label for="horizontal-form-1"
                                        class="form-label sm:w-40">Pengirim</label> <input id="horizontal-form-1"
                                        type="text" class="form-control"
                                        value="{{ $surat_keluar->pengirim }}" readonly> </div>
                                <div class="form-inline mt-5"> <label for="horizontal-form-1"
                                        class="form-label sm:w-40">Kepada</label> <input id="horizontal-form-1"
                                        type="text" class="form-control"
                                        value="{{ $surat_keluar->kepada_suratkeluar }}" readonly> </div>
                                <div class="form-inline mt-5"> <label for="horizontal-form-1"
                                        class="form-label sm:w-40">Perihal</label>
                                    <textarea id="horizontal-form-1" class="form-control" readonly> {{ $surat_keluar->perihal_suratkeluar }} </textarea>
                                </div>
                                <div class="form-inline mt-5"> <label for="horizontal-form-1"
                                        class="form-label sm:w-40">Operator</label> <input id="horizontal-form-1"
                                        type="text" class="form-control"
                                        value="{{ $surat_keluar->operator }}" readonly> </div>
                                <div class="form-inline mt-5"> <label for="horizontal-form-1"
                                        class="form-label sm:w-40">File</label> <a href="/storage/surat-keluar-file/{{ $surat_keluar->file_suratkeluar }}">
                                            <button class="btn btn-primary w-28 mr-2 mb-2"><i
                                                data-lucide="download" class="w-4 h-4 mr-2"></i>Unduh file</button>
                                        </a> </div>

                            </div>
                            <!-- END: File Upload -->



                        </div>
                    </div>
                </div>
                <!-- END: Input -->


            </div>
        </div>
    </div>
    <!-- END: Content -->
    </div>
    </div>
@endsection
