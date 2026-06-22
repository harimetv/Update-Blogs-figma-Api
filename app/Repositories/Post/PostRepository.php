<?php
namespace App\Repositories\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Log;

class PostRepository
{
    protected $model;
    protected $defaultWith = ['user', 'user.profile'];
    public function __construct(Post $model)
    {
        $this->model = $model;
    }
    public function create($data)
    {
        $post = $this->model->create($data);
        return $post->load(['user.profile']);
    }

    public function find($where)
    {
        return $this->model->with($this->defaultWith)->where($where)->orderBy('id', 'desc')->first();
    }

    public function getData($where, $userId)
    {
        // dd($where, $userId);
        return Post::query()
            ->where($where)
            ->with([
                'user:id,username,slug',
                'user.profile:id,user_id,first_name,last_name',
                'media',
                'comments' => function ($q) {
                    $q->latest()->limit(2)->with('user:id,name,profile_image');
                },
            ])
            ->withCount(['likes', 'comments'])
            ->withExists([
                'likes as is_liked' => function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                },
            ])

            ->withExists([
                'post_bookmarks as is_saved' => function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                },
            ])

            // ->latest()
            ->first();
    }

    public function exists($where)
    {
        return $this->model->where($where)->orderBy('id', 'desc')->exists();
    }

    public function update($where, $data)
    {
        return $this->model->where($where)->update($data);
    }

    public function delete($where)
    {
        Log::info('PostRepository');
        // $post = $this->model->where($where);
        // Force delete
        // $post->forceDelete();
        return $this->model->where($where)->delete();
    }

    public function getFeed($userId)
    {
        return Post::query()
            ->with([
                'user:id,username,slug',
                'user.profile:id,user_id,first_name,last_name',
                'media',
                'comments' => function ($q) {
                    $q->latest()->limit(2)->with('user:id,name,profile_image');
                },
            ])
            ->withCount(['likes', 'comments'])
            ->withExists([
                'likes as is_liked' => function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                },
            ])

            ->withExists([
                'post_bookmarks as is_saved' => function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                },
            ])

            ->latest();
            // ->orderBy('id', 'desc');
            // ->cursorPaginate($request->get('limit', 10));
    }
}
