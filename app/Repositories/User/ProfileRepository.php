<?php
namespace App\Repositories\User;

use App\Models\Profile;

class ProfileRepository
{
    protected $model;

    public function __construct(Profile $model)
    {
        $this->model = $model;
    }

    public function all($search = null)
    {
        return $search
            ? $this->model->where('name', 'like', "%{$search}%")->get()
            : $this->model->all();
    }

    public function find(array $where)
    {
        return $this->model->where($where)->first();
    }
    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($data, $where)
    {
        return $this->model->where($where)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
