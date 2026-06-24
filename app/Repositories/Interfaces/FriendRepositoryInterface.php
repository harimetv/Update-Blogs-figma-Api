<?php

namespace App\Repositories\Interfaces;

interface FriendRepositoryInterface
{
    public function sendRequest($senderId, $receiverId);
    public function acceptRequest($receiverId, $senderId);
    public function rejectRequest($receiverId, $senderId);
    public function cancelRequest($senderId, $receiverId);
    public function getFriendship($userId1, $userId2);
}
