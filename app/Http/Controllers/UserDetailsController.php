<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserDetails\UserDetailsRepositoryInterface;

class UserDetailsController extends Controller
{
    protected $userDetailsRepository;

    public function __construct(UserDetailsRepositoryInterface $userDetailsRepository)
    {
        $this->userDetailsRepository = $userDetailsRepository;
    }

    public function index()
    {
        $userDetails = $this->userDetailsRepository->All();
        return view('user_details.index', compact('userDetails'));
    }

    public function create()
    {
        // Tampilkan form untuk menambahkan data baru
        return view('user_details.create');
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan
        ]);

        // Buat data baru menggunakan repository
        $this->userDetailsRepository->create($request->all());

        // Redirect ke halaman yang sesuai
        return redirect()->route('user_details.index')->with('success', 'User details created successfully.');
    }

    public function edit($id)
    {
        // Ambil data yang akan diedit menggunakan repository
        $userDetails = $this->userDetailsRepository->find($id);
        return view('user_details.edit', compact('userDetails'));
    }

    public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan
        ]);

        // Perbarui data menggunakan repository
        $this->userDetailsRepository->update($id, $request->all());

        // Redirect ke halaman yang sesuai
        return redirect()->route('user_details.index')->with('success', 'User details updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus data menggunakan repository
        $this->userDetailsRepository->delete($id);

        // Redirect ke halaman yang sesuai
        return redirect()->route('user_details.index')->with('success', 'User details deleted successfully.');
    }
}
