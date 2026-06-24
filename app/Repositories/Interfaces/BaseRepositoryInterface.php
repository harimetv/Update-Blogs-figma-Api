<?php
namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function all($search = null);
    public function find(array $where);
    public function findById(int $id);
    public function create(array $data);
    public function update(array $where, array $data);
    public function delete($id);
    public function checkByColumn(array $where, $withTrashed);

}
