<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return response()->json(['data' => $userDetails], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'UserBirthDate' => 'required|date',
            'UserPhoneNumber' => 'required|string',
            'UserCountry' => 'required|string',
            'UserProvince' => 'required|string',
            'UserRegency' => 'required|string',
            'UserSubdistrict' => 'required|string',
            'UserVillage' => 'required|string',
            'UserAddress' => 'required|string',
            'PostalCode' => 'required|string',
            'User_id' => 'required|integer|exists:users,id',
        ]);

        $userDetails = $this->userDetailsRepository->create($validatedData);
        return response()->json(['data' => $userDetails], 201);
    }

    public function show($id)
    {
        $userDetails = $this->userDetailsRepository->find($id);
        return response()->json(['data' => $userDetails], 200);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'UserBirthDate' => 'required|date',
            'UserPhoneNumber' => 'required|string',
            'UserCountry' => 'required|string',
            'UserProvince' => 'required|string',
            'UserRegency' => 'required|string',
            'UserSubdistrict' => 'required|string',
            'UserVillage' => 'required|string',
            'UserAddress' => 'required|string',
            'PostalCode' => 'required|string',
            'User_id' => 'required|integer|exists:users,id',
        ]);

        $userDetails = $this->userDetailsRepository->update($id, $validatedData);
        return response()->json(['data' => $userDetails], 200);
    }

    public function destroy($id)
    {
        $this->userDetailsRepository->delete($id);
        return response()->json(['message' => 'User details deleted successfully'], 200);
    }
}
