<?php
namespace App\Repositories\User;

use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all($search = null)
    {
        return $search
            ? $this->model->where('name', 'like', "%{$search}%")->get()
            : $this->model->all();
    }

    public function find($where)
    {
        return $this->model->with(['profile', 'lifestyle', 'favorite', 'artist'])->where($where)->first();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update(array $where, array $data)
    {
        return $this->model->where($where)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
    public function exists($where)
    {
        return $this->model->where($where)->orderBy('id', 'desc')->exists();
    }

    public function checkByColumn($where, $withTrashed)
    {
        $query = $this->model->newQuery();
        if ($withTrashed && method_exists($this->model, 'withTrashed')) {
            $query->withTrashed();
        }
        return $query->where($where)->exists();
    }

    public function getUsers($authId)
    {
        return User::query()
            ->where('id', '!=', $authId)

            ->whereNotIn('id', function ($q) use ($authId) {
                $q->select('following_id')
                    ->from('followers')
                    ->where('follower_id', $authId);
            })

            ->whereNotIn('id', function ($q) use ($authId) {
                $q->select('receiver_id')
                    ->from('friendships')
                    ->where('sender_id', $authId)
                    ->whereIn('status', ['pending', 'accepted']);
            })

            ->with([
                'artist',
                'profile:id,user_id,first_name,last_name,image',
            ])

            ->select('id', 'username', 'slug')

            ->orderBy('id', 'desc'); // 🔥 important
    }

    /**
     * 🎭 ONLY ARTISTS
     */
    public function getArtists($authId)
    {
        return User::query()
            ->where('id', '!=', $authId)

        // ✅ only artist
            ->whereHas('artist')

        // ❌ already followed remove
            ->whereNotIn('id', function ($q) use ($authId) {
                $q->select('following_id')
                    ->from('followers')
                    ->where('follower_id', $authId);
            })

        // ❌ request sent remove
            ->whereNotIn('id', function ($q) use ($authId) {
                $q->select('receiver_id')
                    ->from('friendships')
                    ->where('sender_id', $authId)
                    ->whereIn('status', ['pending', 'accepted']);
            })
            ->whereNotNull('created_at') // ✅ fix
            ->with([
                'artist',
                'profile:id,user_id,first_name,last_name,image',
            ])

            ->orderBy('id', 'desc')
            ->select('id', 'username', 'slug');
        // ->latest();
        // ->cursorPaginate($limit);
    }
}
