@extends('layout.main')
@section('subhead')
    <title>Sistem arsip | surat keluar</title>
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
                                <a href="#" class="side-menu side-menu--active">
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
                                    Surat keluar
                                </h2>
                                <div class="intro-y box mt-5">

                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                                        <a href="{{ route('surat-keluar.tambah') }}">
                                            <button class="btn btn-primary mr-auto mb-2"> <i data-lucide="plus"
                                                    class="w-4 h-4 mr-2"></i> Tambah Data </button>
                                        </a>

                                        <div class="search hidden sm:block ml-auto">
                                            <form class="form" action="{{ route('surat-keluar.cari') }}" method="GET">
                                                <input type="text" class="search__input form-control border-transparent"
                                                    placeholder="Cari Kategori Surat..." name="cari" value="{{ old('cari') }}">
                                                
                                                
                                            </form>
                                        </div>
                                        
                                    </div>

                                    <div class="p-5" id="responsive-table">
                                        <div class="preview">
                                            <div class="overflow-x-auto">

                                                @if (session('success'))
                                                    <div class="alert alert-success-soft show flex items-center mb-2"
                                                        role="alert"> <i data-lucide="alert-triangle"
                                                            class="w-6 h-6 mr-2"></i> {{ session('success') }} <button
                                                            type="button" class="btn-close" data-tw-dismiss="alert"
                                                            aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i>
                                                        </button> </div>
                                                @endif
                                                
                                                <table class="table table-bordered">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="whitespace-nowrap">kode surat</th>
                                                            <th class="whitespace-nowrap">Kategori</th>
                                                            <th class="whitespace-nowrap">Kepada</th>
                                                            <th class="whitespace-nowrap">Perihal</th>
                                                            <th class="whitespace-nowrap text-center">Aksi</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($surat_keluar as $item)
                                                            <tr>
                                                                <td>{{ $item->kode_suratkeluar }}</td>
                                                                <td>{{ $item->tipe }}</td>
                                                                <td>{{ $item->kepada_suratkeluar }}</td>
                                                                <td>{{ $item->perihal_suratkeluar }}</td>
                                                                <td class="table-report__action w-20">
                                                                    <div class="flex justify-center items-center">
                                                                        <a class="tooltip flex items-center text-success mx-2"
                                                                            href="/storage/surat-keluar-file/{{ $item->file_suratkeluar }}"
                                                                            title="Download"> <i data-lucide="download"
                                                                                class="w-4 h-4 "></i></a>
                                                                        <a class="tooltip flex items-center mx-2"
                                                                            href="{{ route('surat-keluar.edit', $item->id_suratkeluar) }}"
                                                                            title="Edit"> <i data-lucide="check-square"
                                                                                class="w-4 h-4 "></i></a>
                                                                        <a class="tooltip flex items-center mx-2"
                                                                            href="{{ route('surat-keluar.detail', $item->id_suratkeluar) }}"
                                                                            title="Detail" data-tw-toggle="modal"
                                                                            data-tw-target="#delete-confirmation-modal"> <i
                                                                                data-lucide="file-text"
                                                                                class="w-4 h-4 "></i></a>
                                                                        <a class="tooltip flex items-center text-danger mx-2"
                                                                            href="{{ route('surat-keluar.hapus', $item->id_suratkeluar) }}"
                                                                            title="Hapus"
                                                                            onclick="return confirm('Apakah anda yakin ingin menghapus?')"
                                                                            data-tw-toggle="modal"
                                                                            data-tw-target="#delete-modal-preview"> <i
                                                                                data-lucide="trash-2"
                                                                                class="w-4 h-4"></i></a>
                                                                        <!-- Beginning: Modal Content-->
                                                                        {{-- <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-body p-0">
                                                                                        <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                                                            <div class="text-3xl mt-5">Are you sure?</div>
                                                                                            <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                                                                                        </div>
                                                                                        <div class="px-5 pb-8 text-center"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button> <button type="button" class="btn btn-danger w-24">Delete</button> </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>  --}}
                                                                        <!-- END: Modal Content -->
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                        {{ $surat_keluar->links() }}


                                                    </tbody>
                                                </table>
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
