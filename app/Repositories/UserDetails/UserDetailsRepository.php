<?php

namespace App\Repositories\UserDetails;

use App\Models\UserDetails;

class UserDetailsRepository implements UserDetailsRepositoryInterface
{
    protected $model;

    public function __construct(UserDetails $model)
    {
        $this->model = $model;
    }

    public function All()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $userDetails = $this->model->findOrFail($id);
        $userDetails->update($data);
        return $userDetails;
    }

    public function delete($id)
    {
        $userDetails = $this->model->findOrFail($id);
        $userDetails->delete();
        return $userDetails;
    }
}
