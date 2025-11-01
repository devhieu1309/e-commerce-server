<?php

namespace App\Services;

use App\Repositories\CommentsRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class CommentsService
{
    /**
     * @var CommentsRepository
     */
    protected $commentsRepository;

    public function __construct(CommentsRepository $commentsRepository)
    {
        $this->commentsRepository = $commentsRepository;
    }

    // hàm lưu dữ liệu
    public function saveCommentsData($data)
    {
        $result = $this->commentsRepository->save($data);
        return $result;
    }

    public function getAll()
    {
        return $this->commentsRepository->getAllComments();
    }

    public function getById($id)
    {
        return $this->commentsRepository->getById($id);
    }

    public function updateComment($data, $id)
    {
        DB::beginTransaction();
        try {
            $comment = $this->commentsRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to update Comments.");
        }

        DB::commit();

        return $comment;
    }


    public function deleteById($id)
    {
        DB::beginTransaction();
        try {
            $comment = $this->commentsRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to delete comment.");
        }

        DB::commit();

        return $comment;
    }
}
