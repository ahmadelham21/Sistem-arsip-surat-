<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    // fungsi untuk menampilkan surat masuk
    public function index()
    {
        //get posts
        $user = user::all();

        //render view with posts
        return view('user.user', compact('user'));
    }



    public function detail($id)
    {

        $user = user::findorfail($id);
        return view('user.detail', compact('user'));


    }

    public function create()
    {
        return view('user.tambah-user');
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
            'photo'     => 'required|file|mimes:png,jpg,jpeg,svg,|max:10000',
        ]);


        //upload file
        $file = $request->file('photo');
        $file->storeAs('public/Photo', $file->hashName());




        //create post
        user::create([
            'name'     => $request->name,
            'username' => $request->username,
            'level'    => $request->level,
            'photo'    => $file->hashName(),
            'password' => Hash::make($request->password),
        ]);

        //redirect to index
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function delete($id)
    {
        $user = user::find($id);
        $file = public_path('/storage/Photo/') . $user->photo;

        if (file_exists($file)) {

            @unlink($file);
        }

        //delete post
        $user->delete();

        //redirect to index
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
