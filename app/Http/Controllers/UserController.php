<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function store(Request $request){
        $this -> userModel -> create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->to('/user');
    }

    public function create(){
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas
        ];

        return view('create_user', $data);
    }

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);

    }

    public function edit($id){
        $user = $this->userModel->getUserById($id);
        if (!$user) {
            return redirect()->to('/user');
        }

        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ];

        return view('edit_user', $data);
    }

    public function update(Request $request, $id){
        $updated = $this->userModel->updateUser($id, [
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        if ($updated) {
            return redirect()->to('/user')->with('success', 'Data user berhasil diperbarui.');
        }

        return redirect()->to('/user')->with('error', 'Gagal memperbarui data user.');
    }

    public function destroy($id){
        $deleted = $this->userModel->deleteUser($id);

        if ($deleted) {
            return redirect()->to('/user')->with('success', 'Data user berhasil dihapus.');
        }

        return redirect()->to('/user')->with('error', 'Gagal menghapus data user.');
    }
}