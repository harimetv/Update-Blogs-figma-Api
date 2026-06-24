<?php

namespace App\Repositories;

use App\Models\Subscriber;

class SubscriberRepository
{
    protected $model;

	public function __construct(Subscriber $model)
	{
		$this->model = $model;
	}

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($where, $data)
    {
        return $this->model->where($where)->update($data);
    }
}
