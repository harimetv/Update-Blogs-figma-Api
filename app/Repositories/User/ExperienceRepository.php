<?php

namespace App\Repositories\User;

use App\Models\Education;
use App\Models\Experience;
use Illuminate\Support\Facades\Log;

class ExperienceRepository
{
    protected $model;

    public function __construct(Experience $model)
    {
        $this->model = $model;
    }

    public function all($search = null)
    {
        return $search
            ? $this->model->where('name', 'like', "%{$search}%")->get()
            : $this->model->all();
    }
    public function list($where)
    {
        return $this->model->with('user')->where($where)->orderBy('id', 'desc')->get();
    }

    public function find($where)
    {
        return $this->model->with('user')->where($where)->first();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($where, $data)
    {
        return $this->model->where($where)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
