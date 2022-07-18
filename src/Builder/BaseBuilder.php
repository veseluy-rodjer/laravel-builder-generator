<?php

namespace VeseluyRodjer\BuilderGenerator\Builder;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BaseBuilder extends Builder
{
    public function getAll(): Builder
    {
        $this->select();

        return $this;
    }

    public function findModel(int $id): Builder
    {
        $this->findOrFail($id);

        return $this;
    }

    public function filter(string $attr, string|int $val): Builder
    {
        $this->where($attr, $val);

        return $this;
    }

    public function statusFilter(int $status): Builder
    {
        $this->where('status', $status);

        return $this;
    }
}
