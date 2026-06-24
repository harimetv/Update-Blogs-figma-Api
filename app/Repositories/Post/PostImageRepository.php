<?php
namespace App\Repositories\Post;

use App\Models\PostImage;
use App\Models\PostMedia;

class PostImageRepository
{
    protected $model;
    public function __construct(PostMedia $model)
    {
        $this->model = $model;
    }
    public function create($data)
    {
        return $this->model->create($data);
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
