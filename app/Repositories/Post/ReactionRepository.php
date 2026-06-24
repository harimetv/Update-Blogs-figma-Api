<?php
namespace App\Repositories\Post;

use App\Models\Reaction;

class ReactionRepository
{
    protected $model;
    public function __construct(Reaction $model)
    {
        $this->model = $model;
    }
    public function create($data)
    {
        return $this->model->create($data);
    }

    public function list($where)
    {
        return $this->model->where($where)->orderBy('order')->get();
    }
    public function find($where)
    {
        return $this->model->where($where)->orderBy('id', 'desc')->first();
    }

    public function exists($where)
    {
        return $this->model->where($where)->orderBy('id', 'desc')->exists();
    }

    public function update($where, $data)
    {
        return $this->model->where($where)->update($data);
    }

    public function delete($where)
    {
        return $this->model->where($where)->delete();
    }
}
