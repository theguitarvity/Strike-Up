<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class AbstractRepository implements AbstractRepositoryInterface
{
    protected $modelName;

    /**
     * AbstractRepository constructor.
     * @param string $modelName
     */
    public function __construct(string $modelName)
    {
        $this->modelName = $modelName;
    }

    public function find($id): ?Model
    {
        return $this->modelName::find($id);
    }

    public function all(): Collection
    {
        return $this->modelName::all();
    }

    public function update(array $data, $id)
    {
        $model = $this->modelName::find($id);
        if($model->update($data)) {
            $model->fill($data);
            return $model;
        }

        return null;
    }

    public function create(array $data)
    {
        $model = new $this->modelName();
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function delete(array $ids): bool
    {
        return $this->modelName::destroy($ids);
    }
}