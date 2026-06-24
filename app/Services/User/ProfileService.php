<?php

namespace App\Services\User;
use App\Repositories\User\ProfileRepository;
class ProfileService
{
    protected $repo;
    protected $imageProvider;
    protected $userRepository;

    public function __construct(ProfileRepository $repo)
    {
        $this->repo           = $repo;
        $this->imageProvider  = "local"; // imagekit
        // $this->userRepository = app(UserRepository::class);
    }

    public function createProfile(array $data)
    {
        return $this->repo->create($data);
    }
    public function findById(int $id)
    {
        return $this->repo->findById($id);
    }
    public function find($where)
    {
        return $this->repo->find($where);
    }
    public function profileUpdate($data, $userId)
    {
        if (isset($data['image']) && ! empty($data['image'])) {
            $image = uploadImage($data['image'], 'images', $this->imageProvider);
            // Fire delete event
            // if ($user->profile->image && $image) {
            //     event(new ImageUpdated($user, $this->imageProvider, 'image', $image));
            // }
            $data['image'] = $image;
        }
        if (isset($data['banner']) && ! empty($data['banner'])) {
            $banner         = uploadImage($data['banner'], 'banners', $this->imageProvider);
            $data['banner'] = $banner;
        }
        if($this->repo->find(['user_id' => $userId])) {
            $this->repo->update($data, ['user_id' => $userId]);
        } else {
            $data['user_id'] = $userId;
            $this->repo->create($data);
        }
        // $this->repo->update($data, ['user_id' => $userId]);
        return $this->repo->find(['user_id' => $userId]);
        // return $this->userRepository->find(['id' => $userId]);
    }
}