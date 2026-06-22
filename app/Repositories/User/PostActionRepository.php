<?php
namespace App\Repositories\User;

use App\Models\PostBookmark;
use App\Models\PostLike;

class PostActionRepository
{
    protected $postLike;
    protected $postBookmark;

    public function __construct(PostLike $postLike, PostBookmark $postBookmark)
    {
        $this->postLike     = $postLike;
        $this->postBookmark = $postBookmark;
    }
    public function toggleLike($data)
    {
        $like = $this->postLike->where($data)->first();
        if ($like) {
            $like->delete();
            return false;
        }
        $this->postLike->create($data);
        return true;
    }

    public function toggleSave($data)
    {
        $save = $this->postBookmark->where($data)->first();
        if ($save) {
            $save->delete();
            return false;
        }
        $this->postBookmark->create($data);
        return true;
    }

    public function getPostLikes($userId)
    {
        return $this->postLike->query()
            ->where('user_id', $userId)
            ->with([
                'post' => function ($q) use ($userId) {
                    $q->with([
                        'user:id,username,slug',
                        'user.profile:id,user_id,first_name,last_name,image',
                        'media',
                    ])
                    ->withCount(['likes', 'comments'])
                    ->withExists([
                        // 'likes as is_liked'          => fn($q)          => $q->where('user_id', $userId),
                        'post_bookmarks as is_saved' => fn($q) => $q->where('user_id', $userId),
                    ]);
                },
            ])
        // ->with([
        //     'user:id,username,slug',
        //     'user.profile:id,user_id,first_name,last_name,image',
        // ])
            ->latest();
    }
    public function getSavedPosts($userId)
    {
        return $this->postBookmark->query()
            ->where('user_id', $userId)
            ->with([
                'post' => function ($q) use ($userId) {
                    $q->with([
                        'user:id,username,slug',
                        'user.profile:id,user_id,first_name,last_name,image',
                        'media',
                    ])
                        ->withCount(['likes', 'comments'])
                        ->withExists([
                            'likes as is_liked' => function ($q) use ($userId) {
                                $q->where('user_id', $userId);
                            },
                        ]);
                },
            ])
            ->latest();
    }
}
