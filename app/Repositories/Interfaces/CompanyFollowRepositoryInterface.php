<?php

namespace App\Repositories\Interfaces;

interface CompanyFollowRepositoryInterface
{
    public function follow($userId, $companyId);
    public function unfollow($userId, $companyId);
    public function isFollowing($userId, $companyId): bool;
}
