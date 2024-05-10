<?php

namespace App\Livewire\UserDetails;

use Livewire\Component;
use App\Models\UserDetails;

class Index extends Component
{
    public $userDetails, $UserBirthDate, $UserPhoneNumber, $UserCountry, $UserProvince, $UserRegency, $UserSubdistrict, $UserVillage, $UserAddress, $UserAddressDetails, $PostalCode, $User_id;
    public $isOpen = 0;
    public $editId;

    public function render()
    {
        $this->userDetails = UserDetails::whereHas('user', function ($query) {
            $query->where('username', auth()->user()->username);
        })->get();
        return view('livewire.user-details.index');
    }

    public function create()
    {
        if (UserDetails::where('User_id', auth()->user()->id)->exists()) {
            session()->flash('error', 'Data sudah ada, tidak dapat membuka modal lagi.');
        } else {
            $this->resetInputFields();
            $this->isOpen = true;
        }
    }


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

    public function delete($id)
    {
        UserDetails::find($id)->delete();
        session()->flash('message', 'User details deleted successfully.');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

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