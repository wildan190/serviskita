<?php

namespace App\Repositories\UserDetails;

use App\Models\UserDetails;

class UserDetailsRepository implements UserDetailsRepositoryInterface
{
    protected $model;

    /**
     * Constructs a new instance of the class.
     *
     * @param UserDetails $model The UserDetails model object.
     */
    public function __construct(UserDetails $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieves all user details.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function All()
    {
        $username = auth()->user()->username;

        return $this->model->whereHas('user', function ($query) use ($username) {
            $query->where('username', $username);
        })->get();
    }

    /**
     * Find a model instance by its ID.
     *
     * @param int $id The ID of the model to find.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the model is not found.
     * @return \Illuminate\Database\Eloquent\Model The found model instance.
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Create a new user details record.
     *
     * @param array $data The data to create the user details record.
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value The created user details model instance.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update a user details record by ID with the provided data.
     *
     * @param int $id The ID of the user details record to update.
     * @param array $data The data to update the user details record.
     * @return \Illuminate\Database\Eloquent\Model The updated user details model instance.
     */
    public function update($id, array $data)
    {
        $userDetails = $this->model->findOrFail($id);
        $userDetails->update($data);
        return $userDetails;
    }

    /**
     * Deletes a user detail by ID and returns the deleted user details.
     *
     * @param int $id The ID of the user detail to delete.
     * @return Some_Return_Value The deleted user details model instance.
     */
    public function delete($id)
    {
        $userDetails = $this->model->findOrFail($id);
        $userDetails->delete();
        return $userDetails;
    }
}
