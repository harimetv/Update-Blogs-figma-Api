<?php
namespace App\Repositories;

use App\Models\DeviceDetails;

class DeviceDetailsRepository
{
    protected $model;

    public function __construct(DeviceDetails $model)
    {
        $this->model = $model;
    }

    public function get($where)
    {
        return $this->model->where($where)->get();
    }

    public function find($where)
    {
        return $this->model->where($where)->first();
    }

    public function create($data)
    {
        return $this->model->create($data);
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
