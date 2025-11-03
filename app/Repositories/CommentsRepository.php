<?php

namespace App\Repositories;

use App\Models\Comments;
use Dom\Comment;

class CommentsRepository
{

    /**
     * @var Comments
     */
    protected $comments;
    /**
     * CommentsRepository constructor
     * 
     * @param Comments $comments
     */

    public function __construct(Comments $comments)
    {
        $this->comments = $comments;
    }

    // save a new warranty to database
    public function save($data)
    {
        $comments = new $this->comments;

        $comments->fullname = $data['fullname'];
        $comments->email = $data['email'];
        $comments->content = $data['content'];
        $comments->news_id = $data['news_id'];
        $comments->user_id = $data['user_id'] ?? null;

        $comments->save();
        return $comments->fresh(); //Trả về bản ghi mới nhất sau khi lưu
    }

    // lấy  danh sách cac binh luan
    public function getAllComments()
    {
        return $this->comments->get();
    }

    public function getById($id)
    {
        return $this->comments->where('comment_id', $id)->get();
    }

    public function update($data, $id)
    {
        $comments = $this->comments->find($id);

        $comments->fullname = $data['fullname'];
        $comments->email = $data['email'];
        $comments->content = $data['content'];
        $comments->news_id = $data['news_id'];
        $comments->user_id = $data['user_id'];

        $comments->update();
        return $comments;
    }

    public function delete($id)
    {
        $comments = $this->comments->find($id);
        $comments->delete();
        return $comments;
    }
}
