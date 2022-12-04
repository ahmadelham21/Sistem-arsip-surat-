@extends('layout.main')

@section('subhead')
    <title>Sistem arsip | surat masuk</title>
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
                                <a href="/surat-masuk" class="side-menu side-menu--active">
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
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Surat Masuk
                                </h2>
                                <div class="intro-y box mt-5">

                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                                        <a href="{{ route('surat-masuk.tambah') }}">
                                            <button class="btn btn-primary mr-auto mb-2"> <i data-lucide="plus"
                                                    class="w-4 h-4 mr-2"></i> Tambah Data </button>
                                        </a>

                                        <div class="search hidden sm:block ml-auto">
                                            <form class="form" action="{{ route('surat-masuk.cari') }}" method="GET">
                                                <input type="text" class="search__input form-control border-transparent"
                                                    placeholder="Cari Kategori Surat..." name="cari" value="{{ old('cari') }}">
                                                
                                                
                                            </form>
                                        </div>
                                        
                                    </div>
                                    <div class="p-5" id="responsive-table">
                                        <div class="preview">
                                            <div class="overflow-x-auto">

                                                @if (session('success'))
                                                    <div class="alert alert-success show flex items-center mb-2"
                                                        role="alert"> <i data-lucide="alert-triangle"
                                                            class="w-6 h-6 mr-2"></i> {{ session('success') }} <button
                                                            type="button" class="btn-close" data-tw-dismiss="alert"
                                                            aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i>
                                                        </button> </div>
                                                @endif



                                                <table class="table table-bordered">
                                                    <thead class="table-light ">
                                                        <tr>
                                                            <th class="whitespace-nowrap">kode surat</th>
                                                            <th class="whitespace-nowrap">Kategori</th>
                                                            <th class="whitespace-nowrap">Pengirim</th>
                                                            <th class="whitespace-normal">Perihal</th>
                                                            <th class="whitespace-nowrap text-center">Aksi</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($surat_masuk as $item)
                                                            <tr>
                                                                <td>{{ $item->kode_suratmasuk }}</td>
                                                                <td>{{ $item->tipe }}</td>
                                                                <td>{{ $item->pengirim }}</td>
                                                                <td class="whitespace-normal">
                                                                    {{ $item->perihal_suratmasuk }}</td>
                                                                <td class="whitespace-nowrap">
                                                                    <div class="flex justify-center items-center ">
                                                                        <a class="tooltip flex items-center text-success mx-2"
                                                                            href="/storage/surat-masuk-file/{{ $item->file_suratmasuk }}"
                                                                            title="Download"> <i data-lucide="download"
                                                                                class="w-4 h-4 "></i></a>
                                                                        <a class="tooltip flex items-center mx-2"
                                                                            href="/edit-surat-masuk/{{ $item->id_suratmasuk }}"
                                                                            title="Edit"> <i data-lucide="check-square"
                                                                                class="w-4 h-4 "></i></a>
                                                                        <a class="tooltip flex items-center mx-2"
                                                                            href="{{ route('surat-masuk.detail', $item->id_suratmasuk) }}"
                                                                            title="Detail" data-tw-toggle="modal"
                                                                            data-tw-target="#delete-confirmation-modal"> <i
                                                                                data-lucide="file-text"
                                                                                class="w-4 h-4 "></i></a>
                                                                        <a class="tooltip flex items-center text-danger mx-2"
                                                                            href="{{ route('surat-masuk.hapus', $item->id_suratmasuk) }}" title="Hapus"
                                                                            onclick="return confirm('Apakah anda yakin ingin menghapus?')" data-tw-toggle="modal"
                                                                            data-tw-target="#delete-modal-preview"> <i
                                                                                data-lucide="trash-2"
                                                                                class="w-4 h-4"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach



                                                





                                                    </tbody>
                                                </table>


                                                <div class="mt-3">

                                                    <div>
                                                        {{ $surat_masuk->links('pagination::simple-tailwind') }}
                                                    </div>



                                                </div>





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
