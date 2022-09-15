<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.index', ['user' => $user]);
    }

    public function simpan(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'password' => 'required|min:4',
            ],
            [
                'name.required' => 'nama tidak boleh kosong', // custom message
                'username.required' => 'username tidak boleh kosong', // custom message
                'password.required' => ':attribute tidak boleh kosong', // custom message

            ]
        );;

        // $request->merge(['password' => bcrypt($request->get('password'))]);

        $simpanData = new User();
        $simpanData->username = $request->username;
        $simpanData->name = $request->name;
        $simpanData->password = bcrypt($request->get('password'));

        $simpanData->save();

        return redirect('/data-user')->with('info', 'Sukses Menyimpan Data');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/data-user')->with('error', 'Sukses Menyimpan Data');
    }

    public function update()
    {
        $data = User::find($_POST['data_id']);
        $data->name = $_POST['nama_edit'];
        $data->username = $_POST['username'];
        $data->save();

        return redirect('/data-user')->with('info', 'Sukses Mengupdate Data');
    }
}
