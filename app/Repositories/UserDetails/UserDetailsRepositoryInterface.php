<?php

namespace App\Repositories\UserDetails;

interface UserDetailsRepositoryInterface
{
    public function All();

    public function find($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
