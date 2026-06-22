<?php
namespace App\Repositories\Post;

use App\Models\PostAnalytics;

class PostAnalyticsRepository
{
    protected $model;

    public function __construct(PostAnalytics $model)
    {
        $this->model = $model;
    }

    public function create($postId, $type)
    {
        if (! in_array($type, ['views', 'clicks', 'impressions'])) {
            return false;
        }
        // Create if not exists
        $analytics = PostAnalytics::firstOrCreate(
            ['post_id' => $postId],
            ['views' => 0, 'clicks' => 0, 'impressions' => 0]
        );

        // Increment the selected column
        $analytics->increment($type);

        return true;
    }

    public function find(array $where)
    {
        return $this->model->where($where)->first();
    }

    public function exists(array $where)
    {
        return $this->model->where($where)->exists();
    }

    public function update(array $where, array $data)
    {
        return $this->model->where($where)->update($data);
    }

    public function delete(array $where)
    {
        return $this->model->where($where)->delete();
    }

    public function createOrUpdate($postId, $data)
    {
        return $this->model->updateOrCreate(
            ['post_id' => $postId],
            $data
        );
    }
}
