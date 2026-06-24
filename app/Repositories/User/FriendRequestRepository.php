<?php

namespace App\Repositories\User;

use App\Models\Friendship;

class FriendRequestRepository
{
    protected $model;

    public function __construct(Friendship $model)
    {
        $this->model = $model;
    }

    public function send($data)
    {
        // return $this->model->firstOrCreate([
        //     'sender_id' => $senderId,
        //     'receiver_id' => $receiverId,
        // ]);
        return $this->model->firstOrCreate($data);
    }

    public function updateStatus($id, $status)
    {
        $req = $this->model->findOrFail($id);
        $req->update(['status' => $status]);
        return $req;
    }

    public function delete($data)
    {
        return $this->model->where($data)->delete();
    }
}