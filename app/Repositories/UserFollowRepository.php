<?php

namespace App\Repositories;

use App\Models\Follow;

class UserFollowRepository
{
	protected $model;

	public function __construct(Follow $model)
	{
		$this->model = $model;
	}

	public function create($data)
	{
		return $this->model->firstOrCreate($data);
	}

	public function delete($data)
	{
		return $this->model->where($data)->delete();
	}

	public function exists($data)
	{
		return $this->model->where($data)->exists();
	}

	public function getFollowers($userId)
	{
		return $this->model->where('following_id', $userId)->pluck('follower_id');
	}

	public function getFollowing($userId)
	{
		return $this->model->where('follower_id', $userId)->pluck('following_id');
	}
}
