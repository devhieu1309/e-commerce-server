<?php

namespace App\Repositories;

use App\Models\VideoReview;

class VideoReviewRepository
{
    public function getAllWithFilters($filters)
    {
        $query = VideoReview::with('product')->orderByDesc('updated_at');


        if (!empty($filters['search'])) {
            $query->where('title', 'like', '%' . $filters['search'] . '%');
        }

        if (!empty($filters['product_id'])) {
            $query->where('product_id', $filters['product_id']);
        }

        if (isset($filters['is_visible'])) {
            $query->where('is_visible', (bool) $filters['is_visible']);
        }

        $limit = $filters['limit'] ?? 10;
        $page = $filters['page'] ?? 1;

        return $query->skip(($page - 1) * $limit)->take($limit)->get();
    }

    public function create(array $data)
    {
        return VideoReview::create($data);
    }

    public function findById($id)
    {
        return VideoReview::findOrFail($id);
    }

    public function update(VideoReview $video, array $data)
    {
        $video->update($data);
        return $video;
    }

    public function delete(VideoReview $video)
    {
        return $video->delete();
    }
}
