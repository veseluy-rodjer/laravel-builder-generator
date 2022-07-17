<?php

namespace VeseluyRodjer\BuilderGenerator\Builder;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BaseBuilder extends Builder
{
    public function getAll(): Builder
    {
        return $this->model->select();
    }

    public function findOrFail(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function where(string $attr, string|int $val): Builder
    {
        return $this->model->where($attr, $val);
    }

    public function statusFilter(int $status): Builder
    {
        return $this->model->where('status', $status);
    }
}
