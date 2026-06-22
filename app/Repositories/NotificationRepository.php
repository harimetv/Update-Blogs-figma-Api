<?php

namespace App\Repositories;

use App\Models\Notification;

class NotificationRepository
{
    protected $model;

    public function __construct(Notification $model)
    {
        $this->model = $model;
    }

    public function list($search = null)
    {
        return $search
            ? $this->model->where('name', 'like', "%{$search}%")->get()
            : $this->model->all();
    }

    public function find(array $where)
    {
        return $this->model->where($where)->first();
    }
   
    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update(array $where, array $data)
    {
        return $this->model->where($where)->update($data);
    }

    public function delete($data)
    {
        return $this->model->where($data);
    }
}
