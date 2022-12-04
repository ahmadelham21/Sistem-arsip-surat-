@extends('layout.main')

@section('subhead')
    <title>Sistem arsip | tambah surat keluar</title>
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
                                    Input surat keluar
                                </h2>
                            </div>
                            <div id="input" class="p-5">
                                <form action="{{ route('surat-keluar.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label class="font-weight-bold mt-4">Tanggal keluar</label>
                                    
                                        <div class="relative mx-auto mt-1">
                                            <div
                                                class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                            </div>
                                            <input type="datetime-local"
                                                class="form-control pl-12 @error('tanggalmasuk_suratkeluar') is-invalid @enderror"
                                                name="tanggalmasuk_suratkeluar"
                                                value="{{ now()->timezone('Asia/Singapore') }}" readonly>

                                            <!-- error message untuk title -->
                                            @error('title')
                                                <div class="alert alert-danger mt-3">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="form-group mt-4">
                                            <label class="font-weight-bold mt-3">Kode Surat</label>
                                            <input type="text"
                                                class="form-control mt-1 @error('kode_suratkeluar') is-invalid @enderror"
                                                name="kode_suratkeluar" value="{{ old('kode_suratkeluar') }}"
                                                placeholder="Masukkan kode surat..." required>

                                            <!-- error message untuk title -->
                                            @error('title')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-4">
                                            <label class="font-weight-bold mt-3">Kategori Surat</label>
                                            <select name="tipe" aria-label="Default select example"
                                                class="tom-select mt-1 w-full" placeholder="Pilih kategori surat" required>
                                                <option selected ></option>
                                                <option value="Majelis">Majelis</option>
                                                <option value="Dinas">Dinas</option>
                                                <option value="Mutasi">Mutasi</option>
                                                <option value="Umum">Umum</option>
                                            </select>

                                        </div>
                                        <div class="form-group mt-4">
                                            <label class="font-weight-bold mt-3">Nomor Surat Keluar</label>
                                            <input type="text"
                                                class="form-control mt-1 @error('nomor_suratkeluar') is-invalid @enderror"
                                                name="nomor_suratkeluar" value="{{ old('nomor_suratkeluar') }}"
                                                placeholder="Masukkan Nomor surat..." required>

                                            <!-- error message untuk title -->
                                            @error('nomor_suratkeluar')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-group relative mt-4 mx-auto">
                                            <label class="font-weight-bold mt-3">Tanggal surat </label>

                                            <div class="relative mx-auto mt-1">
                                                <div
                                                    class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                                    <i data-lucide="calendar" class="w-4 h-4"></i>
                                                </div> <input type="date" class="form-control pl-12 
                                                    @error('tanggalsurat_suratkeluar') is-invalid @enderror"
                                                    name="tanggalsurat_suratkeluar"
                                                    value="{{ old('tanggalsurat_suratkeluar') }}" required>

                                                <!-- error message untuk title -->
                                                @error('tanggalsurat_suratkeluar')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="font-weight-bold mt-3">Pengirim</label>
                                                <input type="text"
                                                    class="form-control mt-1 @error('pengirim') is-invalid @enderror"
                                                    name="pengirim" value="{{ old('pengirim') }}"
                                                    placeholder="Masukkan pengirim surat..." required>

                                                <!-- error message untuk title -->
                                                @error('title')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="font-weight-bold mt-3">Kepada</label>
                                                <input type="text"
                                                    class="form-control mt-1 @error('kepada_suratkeluar') is-invalid @enderror"
                                                    name="kepada_suratkeluar" value="{{ old('kepada_suratkeluar') }}"
                                                    placeholder="masukkan tujuan surat..." required>

                                                <!-- error message untuk title -->
                                                @error('kepada_suratkeluar')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="font-weight-bold mt-3">perihal</label>
                                                <textarea class="form-control mt-1 @error('perihal_suratkeluar') is-invalid @enderror" name="perihal_suratkeluar"
                                                    value="{{ old('perihal_suratkeluar') }}" placeholder="masukkan perihal surat...">{{ old('perihal_suratkeluar') }}</textarea>

                                                <!-- error message untuk title -->
                                                @error('title')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-3">
                                                <label class="font-weight-bold mt-3">operator</label>
                                                <input type="text"
                                                    class="form-control mt-1 @error('operator') is-invalid @enderror"
                                                    name="operator" value="Admin" readonly>

                                                <!-- error message untuk title -->
                                                @error('title')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>



                                            <div class="form-group mt-4">
                                                <label class="font-weight-bold mt-3">file</label>
                                                <input type="file"
                                                    class="form-control mt-1 @error('file_suratkeluar') is-invalid @enderror"
                                                    name="file_suratkeluar" required>

                                                <!-- error message untuk title -->
                                                @error('file_suratkeluar')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            

                                            
                                            <div class="flex flex-row-reverse mt-2">
                                                <button type="submit"
                                                    class="btn btn-md btn-primary place-self-end">SIMPAN</button>
                                            </div>
                                </form>

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
