<?php

namespace App\Repositories\Company;

use App\Models\CompanyProfile;

class CompanyProfileRepository
{
	protected $model;

	public function __construct()
	{
		$this->model = app(CompanyProfile::class);
	}

	public function find($where)
	{
		return $this->model->where($where)->first();
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
	
	public function update($data, $where)
	{
		return $this->model->where($where)->update($data);
	}
}
