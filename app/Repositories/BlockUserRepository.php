<?php
namespace App\Repositories;

use App\Models\Block;

class BlockUserRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app(Block::class);
    }

    public function create($data)
    {
        return $this->model->firstOrCreate($data);
    }

    public function delete($where)
    {
        return $this->model->where($where)->delete();
    }

    public function exists($where)
    {
        return $this->model->where($where)->exists();
    }
}
