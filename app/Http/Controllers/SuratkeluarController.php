<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\surat_keluar;
use Illuminate\Support\Facades\Storage;

class SuratkeluarController extends Controller
{
    public function index()
    {
        $surat_keluar = surat_keluar::latest()->paginate(10);
        return view('surat-keluar.surat-keluar',compact('surat_keluar'));
    }

    // Menampilkan detail informasi surat keluar
    public function detail($id)
    {
        $surat_keluar = surat_keluar::findorfail($id);
        return view('surat-keluar.detail', compact('surat_keluar'));
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
        $surat_keluar = surat_keluar::where('tipe', 'like', "%" . $cari . "%")
        ->paginate(10);
        return view('surat-keluar.surat-keluar', compact('surat_keluar'))->with('i', (request()->input('page', 1) - 1) * 5);
 	
 
	}

     /**
     * create
     *
     * @return void
     */

    // fungsi untuk memunculkan tampilan untuk menambah surat
    public function create()
    {
        return view('surat-keluar.tambah-surat-keluar');
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
            'file_suratkeluar'     => 'required|file|mimes:doc,docx,pdf|max:10000',
        ]);

        //upload file
        $file = $request->file('file_suratkeluar');
        $file->storeAs('public/surat-keluar-file', $file->hashName());

        //create post
        surat_keluar::create([

            'tanggalmasuk_suratkeluar'    => $request->tanggalmasuk_suratkeluar,
            'kode_suratkeluar'   => $request->kode_suratkeluar,
            'tipe'   => $request->tipe,
            'nomor_suratkeluar'   => $request->nomor_suratkeluar,
            'tanggalsurat_suratkeluar'   => $request->tanggalsurat_suratkeluar,
            'pengirim'   => $request->pengirim,
            'kepada_suratkeluar'   => $request->kepada_suratkeluar,
            'perihal_suratkeluar'   => $request->perihal_suratkeluar,
            'operator'   => $request->operator,
            'file_suratkeluar'     => $file->hashName()
        ]);

        //redirect to index
        return redirect()->route('surat-keluar.suratkeluar')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // fungsi untuk menampilkan halaman edit
    public function edit($id)
    {
        $surat_keluar = surat_keluar::findorfail($id);
        return view('surat-keluar.edit', compact('surat_keluar'));
    }


    public function update(Request $request,$id)
    {

        $this->validate($request, [
            'file_suratkeluar'     => 'required|file|mimes:doc,docx,pdf|max:10000',
        ]);

        $surat_keluar = surat_keluar::find($id);

        //check if image is uploaded
        if ($request->hasFile('file_suratkeluar')) {

            //upload new image
            $file = $request->file('file_suratkeluar');
            $file->storeAs('public/surat-keluar-file', $file->hashName());

            //delete old image
            Storage::delete('public/surat-keluar-file/' . $surat_keluar->file_suratkeluar);

            //update post with new image
            $surat_keluar->update([
                'tanggalmasuk_suratkeluar'    => $request->tanggalmasuk_suratkeluar,
                'kode_suratkeluar'   => $request->kode_suratkeluar,
                'tipe'   => $request->tipe,
                'nomor_suratkeluar'   => $request->nomor_suratkeluar,
                'tanggalsurat_suratkeluar'   => $request->tanggalsurat_suratkeluar,
                'pengirim'   => $request->pengirim,
                'kepada_suratkeluar'   => $request->kepada_suratkeluar,
                'perihal_suratkeluar'   => $request->perihal_suratkeluar,
                'operator'   => $request->operator,
                'file_suratkeluar'     => $file->hashName()
            ]);
        } else {

            //update post without image
            $surat_keluar->update([
                'tanggalmasuk_suratkeluar'    => $request->tanggalmasuk_suratkeluar,
                'kode_suratkeluar'   => $request->kode_suratkeluar,
                'tipe'   => $request->tipe,
                'nomor_suratkeluar'   => $request->nomor_suratkeluar,
                'tanggalsurat_suratkeluar'   => $request->tanggalsurat_suratkeluar,
                'pengirim'   => $request->pengirim,
                'kepada_suratkeluar'   => $request->kepada_suratkeluar,
                'perihal_suratkeluar'   => $request->perihal_suratkeluar,
                'operator'   => $request->operator
            ]);
        }

        //redirect to index
        return redirect()->route('surat-keluar.suratkeluar')->with(['success' => 'Data Berhasil Diubah!']);
    }












    // fungsi untuk menghapus surat masuk
    public function delete($id)
    {
        $surat_keluar = surat_keluar::find($id);
        $file = public_path('/storage/surat-keluar-file/') . $surat_keluar->file_suratkeluar;

        if (file_exists($file)) {

            @unlink($file);
        }

        //delete post
        $surat_keluar->delete();

        //redirect to index
        return redirect()->route('surat-keluar.suratkeluar')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}




