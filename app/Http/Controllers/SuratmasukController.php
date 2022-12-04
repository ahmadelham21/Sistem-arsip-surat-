<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\surat_masuk;
use Illuminate\Support\Facades\Storage;

class SuratmasukController extends Controller
{

    // fungsi untuk menampilkan surat masuk
    public function index()
    {
        //get posts
        $surat_masuk = surat_masuk::latest()->Paginate(10);

        //render view with posts
        return view('surat-masuk.surat-masuk', compact('surat_masuk'));
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
        $surat_masuk = surat_masuk::where('tipe', 'like', "%" . $cari . "%")
        ->paginate(10);
        return view('surat-masuk.surat-masuk', compact('surat_masuk'))->with('i', (request()->input('page', 1) - 1) * 5);
 	
 
	}


    public function detail($id)
    {
        $surat_masuk = surat_masuk::findorfail($id);
        return view('surat-masuk.detail', compact('surat_masuk'));
    }
    /**
     * create
     *
     * @return void
     */

    // fungsi untuk memunculkan tampilan untuk menambah surat
    public function create()
    {
        return view('surat-masuk.tambah-surat-masuk');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */

    // fungsi untuk menambahkan data ke dalam database  
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'file_suratmasuk'     => 'required|file|mimes:doc,docx,pdf|max:10000',
            'kode_suratmasuk'     => 'required',
            'tipe'     => 'required',
            'nomor_suratmasuk'     => 'required',
        ]);

        //upload file
        $file = $request->file('file_suratmasuk');
        $file->storeAs('public/surat-masuk-file', $file->hashName());

        //create post
        surat_masuk::create([

            'tanggalmasuk_suratmasuk'    => $request->tanggalmasuk_suratmasuk,
            'kode_suratmasuk'   => $request->kode_suratmasuk,
            'tipe'   => $request->tipe,
            'nomor_suratmasuk'   => $request->nomor_suratmasuk,
            'tanggalsurat_suratmasuk'   => $request->tanggalsurat_suratmasuk,
            'pengirim'   => $request->pengirim,
            'kepada_suratmasuk'   => $request->kepada_suratmasuk,
            'perihal_suratmasuk'   => $request->perihal_suratmasuk,
            'operator'   => $request->operator,
            'file_suratmasuk'     => $file->hashName()
        ]);

        //redirect to index
        return redirect()->route('surat-masuk.suratmasuk')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // fungsi untuk menampilkan halaman edit
    public function edit($id)
    {
        $surat_masuk = surat_masuk::findorfail($id);
        return view('surat-masuk.edit', compact('surat_masuk'));
    }


    public function update(Request $request,$id)
    {

        $this->validate($request, [
            'file_suratmasuk'     => 'required|file|mimes:doc,docx,pdf|max:10000',
        ]);

        $surat_masuk = surat_masuk::find($id);

        //check if image is uploaded
        if ($request->hasFile('file_suratmasuk')) {

            //upload new image
            $file = $request->file('file_suratmasuk');
            $file->storeAs('public/surat-masuk-file', $file->hashName());

            //delete old image
            Storage::delete('public/surat-masuk-file/' . $surat_masuk->file_suratmasuk);

            //update post with new image
            $surat_masuk->update([
                'tanggalmasuk_suratmasuk'    => $request->tanggalmasuk_suratmasuk,
                'kode_suratmasuk'   => $request->kode_suratmasuk,
                'tipe'   => $request->tipe,
                'nomor_suratmasuk'   => $request->nomor_suratmasuk,
                'tanggalsurat_suratmasuk'   => $request->tanggalsurat_suratmasuk,
                'pengirim'   => $request->pengirim,
                'kepada_suratmasuk'   => $request->kepada_suratmasuk,
                'perihal_suratmasuk'   => $request->perihal_suratmasuk,
                'operator'   => $request->operator,
                'file_suratmasuk'     => $file->hashName()
            ]);
        } else {

            //update post without image
            $surat_masuk->update([
                'tanggalmasuk_suratmasuk'    => $request->tanggalmasuk_suratmasuk,
                'kode_suratmasuk'   => $request->kode_suratmasuk,
                'tipe'   => $request->tipe,
                'nomor_suratmasuk'   => $request->nomor_suratmasuk,
                'tanggalsurat_suratmasuk'   => $request->tanggalsurat_suratmasuk,
                'pengirim'   => $request->pengirim,
                'kepada_suratmasuk'   => $request->kepada_suratmasuk,
                'perihal_suratmasuk'   => $request->perihal_suratmasuk,
                'operator'   => $request->operator
            ]);
        }

        //redirect to index
        return redirect()->route('surat-masuk.suratmasuk')->with(['success' => 'Data Berhasil Diubah!']);
    }



    // fungsi untuk menghapus surat masuk
    public function delete($id)
    {
        $surat_masuk = surat_masuk::find($id);
        $file = public_path('/storage/surat-masuk-file/') . $surat_masuk->file_suratmasuk;

        if (file_exists($file)) {

            @unlink($file);
        }

        //delete post
        $surat_masuk->delete();

        //redirect to index
        return redirect()->route('surat-masuk.suratmasuk')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
