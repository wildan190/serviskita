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

}
