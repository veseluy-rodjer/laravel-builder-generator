<?php

namespace VeseluyRodjer\BuilderGenerator\Builder;

use Illuminate\Database\Eloquent\Builder;

class BaseBuilder extends Builder
{
    public function getAll(): self
    {
        $this->select();

        return $this;
    }

    public function findModel(int $id): self
    {
        $this->findOrFail($id);

        return $this;
    }

    public function filter(string $attr, string|int $val): self
    {
        $this->where($attr, $val);

        return $this;
    }

    public function filterIn(string $attr, array $data): self
    {
        $this->whereIn($attr, $data);

        return $this;
    }

    public function modelWith(string|array $relationship, int $id): self
    {
        $this->with($relationship)->where('id', $id);

        return $this;
    }

    public function allWith(string|array $relationship): self
    {
        $this->with($relationship);

        return $this;
    }

    public function statusFilter(int $status): self
    {
        $this->where('status', $status);

        return $this;
    }

    public function filterByCompare(string $attr, string $compare, string|int $val): self
    {
        $this->where($attr, $compare, $val);

        return $this;
    }

    public function sort(string $attr, string $direction = 'asc'): self
    {
        $this->orderBy($attr, $direction);

        return $this;
    }
}
