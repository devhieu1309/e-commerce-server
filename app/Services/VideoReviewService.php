<?php

namespace App\Services;

use App\Repositories\VideoReviewRepository;
use Illuminate\Support\Facades\Storage;
use Exception;

class VideoReviewService
{
    protected $repo;

    public function __construct(VideoReviewRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getList($filters)
    {
        return $this->repo->getAllWithFilters($filters);
    }

    public function create($request)
    {
        $data = $request->validated();

        if ($request->input('source_type') === 'upload' && $request->hasFile('video')) {
            $path = $request->file('video')->store('videos', 'public');
            $data['url'] = Storage::url($path);
        }

        return $this->repo->create($data);
    }

    public function update($request, $id)
    {
        $video = $this->repo->findById($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'source_type' => 'required|in:youtube,upload',
            'product_id' => 'required|exists:products,product_id',
            'url' => 'nullable|string',
            'video' => 'nullable|file|mimes:mp4,mov,avi,mkv|max:20480',
        ]);

        if ($data['source_type'] === 'youtube') {
            $this->deleteOldVideoFile($video);
            $data['url'] = $data['url'];
        } elseif ($data['source_type'] === 'upload' && $request->hasFile('video')) {
            $this->deleteOldVideoFile($video);
            $path = $request->file('video')->store('videos', 'public');
            $data['url'] = '/storage/' . $path;
        }

        return $this->repo->update($video, $data);
    }

    public function delete($id)
    {
        $video = $this->repo->findById($id);
        $this->deleteOldVideoFile(video: $video);
        return $this->repo->delete($video);
    }

    public function toggleVisibility($id)
    {
        $video = $this->repo->findById($id);
        $video->is_visible = !$video->is_visible;
        $video->save();
        return $video;
    }

    private function deleteOldVideoFile($video)
    {
        if ($video->source_type === 'upload' && $video->url && str_starts_with($video->url, '/storage/')) {
            $path = str_replace('/storage/', '', $video->url);
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }
    }
}
