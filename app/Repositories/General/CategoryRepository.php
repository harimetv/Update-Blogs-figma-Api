<?php
namespace App\Repositories\General;

use App\Models\Category;

class CategoryRepository
{
    protected $model;
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
    public function create($data)
    {
        return $this->model->create($data);
    }

    public function list($where = [], $order_by = [])
    {
        $query = $this->model->select(['id', 'name', 'slug', 'description', 'image']);
        if(!empty($where)){
            $query->where($where);
        }
        if(!empty($order_by)){
            $query->orderBy($order_by);
        }
        return $query->get();
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
