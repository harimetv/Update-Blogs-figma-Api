<?php
namespace App\Services\User;

use App\Repositories\User\ProfileRepository;

class ProfileService
{
    protected $repo;
    protected $imageProvider;

    public function __construct(ProfileRepository $repo)
    {
        $this->repo          = $repo;
        $this->imageProvider = "local"; // or config
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
            $image         = uploadImage($data['image'], 'images', $this->imageProvider);
            $data['image'] = $image;
        }
        if (isset($data['banner']) && ! empty($data['banner'])) {
            $banner         = uploadImage($data['banner'], 'banners', $this->imageProvider);
            $data['banner'] = $banner;
        }

        // Check if profile exists, update or create
        if ($this->repo->find(['user_id' => $userId])) {
            $this->repo->update($data, ['user_id' => $userId]);
        } else {
            $data['user_id'] = $userId;
            $this->repo->create($data);
        }

        return $this->repo->find(['user_id' => $userId]);
    }

    public function getUserProfile()
    {
        return authUser();
    }
}
