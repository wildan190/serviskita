<?php

namespace App\Livewire\UserDetails;

use Livewire\Component;
use App\Models\UserDetails;

class Index extends Component
{
    public $userDetails, $UserBirthDate, $UserPhoneNumber, $UserCountry, $UserProvince, $UserRegency, $UserSubdistrict, $UserVillage, $UserAddress, $UserAddressDetails, $PostalCode, $User_id;
    public $isOpen = 0;
    public $editId;

    /**
     * Render the view for the user details index page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->userDetails = UserDetails::whereHas('user', function ($query) {
            $query->where('username', auth()->user()->username);
        })->get();
        return view('livewire.user-details.index');
    }

    /**
     * A function to create new user details.
     */
    public function create()
    {
        if (UserDetails::where('User_id', auth()->user()->id)->exists()) {
            session()->flash('error', 'Data sudah ada, tidak dapat membuka modal lagi.');
        } else {
            $this->resetInputFields();
            $this->isOpen = true;
        }
    }


    /**
     * Store the user details in the database.
     *
     * @return void
     */
    public function store()
    {
        $validatedData = $this->validate([
            'UserBirthDate' => 'required|date',
            'UserPhoneNumber' => 'required|string',
            'UserCountry' => 'required|string',
            'UserProvince' => 'required|string',
            'UserRegency' => 'required|string',
            'UserSubdistrict' => 'required|string',
            'UserVillage' => 'required|string',
            'UserAddress' => 'required|string',
            'UserAddressDetails' => 'nullable|string',
            'PostalCode' => 'required|string',
            'User_id' => 'required|integer|exists:users,id',
        ]);

        UserDetails::create($validatedData);

        session()->flash('message', 'User details created successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * Edit a user's details based on the provided ID.
     *
     * @param datatype $id description
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
     */
    public function edit($id)
    {
        $this->editId = $id;
        $userDetail = UserDetails::findOrFail($id);
        $this->UserBirthDate = $userDetail->UserBirthDate;
        $this->UserPhoneNumber = $userDetail->UserPhoneNumber;
        $this->UserCountry = $userDetail->UserCountry;
        $this->UserProvince = $userDetail->UserProvince;
        $this->UserRegency = $userDetail->UserRegency;
        $this->UserSubdistrict = $userDetail->UserSubdistrict;
        $this->UserVillage = $userDetail->UserVillage;
        $this->UserAddress = $userDetail->UserAddress;
        $this->UserAddressDetails = $userDetail->UserAddressDetails;
        $this->PostalCode = $userDetail->PostalCode;
        $this->User_id = $userDetail->User_id;

        $this->openModal();
    }

    /**
     * Update the user details with the given ID.
     *
     * @param datatype $paramname description
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
     */
    public function update()
    {
        $validatedData = $this->validate([
            'UserBirthDate' => 'required|date',
            'UserPhoneNumber' => 'required|string',
            'UserCountry' => 'required|string',
            'UserProvince' => 'required|string',
            'UserRegency' => 'required|string',
            'UserSubdistrict' => 'required|string',
            'UserVillage' => 'required|string',
            'UserAddress' => 'required|string',
            'UserAddressDetails' => 'nullable|string',
            'PostalCode' => 'required|string',
            'User_id' => 'required|integer|exists:users,id',
        ]);

        $userDetail = UserDetails::find($this->editId);
        $userDetail->update($validatedData);

        session()->flash('message', 'User details updated successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * Deletes a user detail by ID and flashes a success message.
     *
     * @param int $id The ID of the user detail to delete.
     * @return void
     */
    public function delete($id)
    {
        UserDetails::find($id)->delete();
        session()->flash('message', 'User details deleted successfully.');
    }

    /**
     * Opens the modal by setting the isOpen flag to true.
     *
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * Closes the modal by setting the isOpen flag to false.
     *
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * Reset all input fields to their initial values.
     *
     */
    private function resetInputFields()
    {
        $this->UserBirthDate = '';
        $this->UserPhoneNumber = '';
        $this->UserCountry = '';
        $this->UserProvince = '';
        $this->UserRegency = '';
        $this->UserSubdistrict = '';
        $this->UserVillage = '';
        $this->UserAddress = '';
        $this->UserAddressDetails = '';
        $this->PostalCode = '';
        $this->User_id = auth()->user()->id;
    }
}