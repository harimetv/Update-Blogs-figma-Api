<?php

namespace App\Repositories\User;

use App\Models\Follower;
use App\Models\User;

class FollowRepository
{
    protected $model;

    public function __construct(Follower $model)
    {
        $this->model = $model;
    }
    // public function follow($userId, $followedUserId)
    // {
    //     $user = User::findOrFail($userId);
    //     if (!$user->following->contains($followedUserId)) {
    //         $user->following()->attach($followedUserId);
    //     }
    // }

    // public function unfollow($userId, $followedUserId)
    // {
    //     $user = User::findOrFail($userId);
    //     $user->following()->detach($followedUserId);
    // }

    public function isFollowing($userId, $followedUserId): bool
    {
        return User::findOrFail($userId)->following->contains($followedUserId);
    }

    public function follow($data)
    {
        // return $this->model->firstOrCreate([
        //     'follower_id' => $followerId,
        //     'following_id' => $followingId,
        // ]);
        return $this->model->firstOrCreate($data);
    }

    public function unfollow($data)
    {
        return $this->model->where($data)->delete();
    }
}
