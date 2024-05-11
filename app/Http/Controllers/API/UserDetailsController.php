<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserDetails\UserDetailsRepositoryInterface;
use App\Models\UserDetails;

class UserDetailsController extends Controller
{
    protected $userDetailsRepository;

    /**
     * Constructor for the class.
     *
     * @param UserDetailsRepositoryInterface $userDetailsRepository The user details repository instance.
     */
    public function __construct(UserDetailsRepositoryInterface $userDetailsRepository)
    {
        $this->userDetailsRepository = $userDetailsRepository;
    }

    /**
     * Retrieves all user details and returns them as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse The JSON response containing the user details.
     */
    public function index()
    {
        $userDetails = $this->userDetailsRepository->All();
        return response()->json(['data' => $userDetails], 200);
    }

    /**
     * Stores user details if they do not already exist and returns the created user details.
     *
     * @param Request $request The HTTP request object containing the user details to store.
     * @throws \Illuminate\Validation\ValidationException when validation fails.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the created user details, or an error message if the user details already exist.
     */
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

        // Check if user details already exists
        $existingUserDetails = UserDetails::where('UserPhoneNumber', $request->UserPhoneNumber)
            ->where('User_id', $request->User_id)
            ->first();

        if ($existingUserDetails) {
            return response()->json(['error' => 'User details already exist for this user.'], 400);
        }

        $userDetails = $this->userDetailsRepository->create($validatedData);
        return response()->json(['data' => $userDetails], 201);
    }

    /**
     * Retrieves and returns the user details with the specified ID.
     *
     * @param int $id The ID of the user details to retrieve.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the user details.
     */
    public function show($id)
    {
        $userDetails = $this->userDetailsRepository->find($id);
        return response()->json(['data' => $userDetails], 200);
    }

    /**
     * Update the user details with the given ID.
     *
     * @param Request $request The HTTP request object containing the updated user details.
     * @param int $id The ID of the user details to update.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the updated user details, or an error message if the user details already exist.
     */
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

        // Check if user details already exists
        $existingUserDetails = UserDetails::where('UserPhoneNumber', $request->UserPhoneNumber)
            ->where('User_id', $request->User_id)
            ->where('id', '!=', $id)
            ->first();

        if ($existingUserDetails) {
            return response()->json(['error' => 'User details already exist for this user.'], 400);
        }

        $userDetails = $this->userDetailsRepository->update($id, $validatedData);
        return response()->json(['data' => $userDetails], 200);
    }

    /**
     * Deletes user details by ID.
     *
     * @param int $id The ID of the user details to delete.
     * @return \Illuminate\Http\JsonResponse The JSON response with a success message.
     */
    public function destroy($id)
    {
        $this->userDetailsRepository->delete($id);
        return response()->json(['message' => 'User details deleted successfully'], 200);
    }
}
