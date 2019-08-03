<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface AbstractRepositoryInterface
{
    public function find($id):?Model;

    public function all():Collection;

    public function update(array $data, $id);

    public function delete(array $ids):bool;

    public function create(array $data);
}