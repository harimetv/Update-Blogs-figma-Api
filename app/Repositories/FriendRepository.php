<?php
namespace App\Repositories;

use App\Models\Friendship;

class FriendRepository
{
    protected $model;
    public function __construct(Friendship $model)
    {
        $this->model = $model;
    }
    public function create($data)
    {
        return $this->model->firstOrCreate($data);
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
