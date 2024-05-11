<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserDetails\UserDetailsRepositoryInterface;

/**
 * Get list of user details
 */
class UserDetailsController extends Controller
{
    protected $userDetailsRepository;

    public function __construct(UserDetailsRepositoryInterface $userDetailsRepository)
    {
        $this->userDetailsRepository = $userDetailsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userDetails = $this->userDetailsRepository->All();
        return view('user_details.index', compact('userDetails'));
    }

}

