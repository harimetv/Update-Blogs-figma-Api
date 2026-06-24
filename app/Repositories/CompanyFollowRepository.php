<?php

namespace App\Repositories;

use App\Models\CompanyFollower;

class CompanyFollowRepository
{
	protected $model;

	public function __construct(CompanyFollower $model)
	{
		$this->model = $model;
	}

	public function create($data)
	{
		return $this->model->firstOrCreate($data);
	}

	public function delete($where)
	{
		return $this->model->where($where)->delete();
	}

	public function exists($where)
	{
		return $this->model->where($where)->exists();
	}

	public function getFollowers($companyId)
	{
		return $this->model->where('company_id', $companyId)->pluck('user_id');
	}

	public function getCompanies($userId)
	{
		return $this->model->where('user_id', $userId)->pluck('company_id');
	}
}
