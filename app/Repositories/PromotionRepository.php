<?php
namespace App\Repositories;
use App\Models\Promotion;
class PromotionRepository{
    
    /**
     * @var Promotion
     */
    protected $promotion;
    /**
     * PromotionRepository constructor
     * 
     * @param Promotion $promotion
     */

    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    // save a new shipping method to database
    public function save($data) {
        $promotion = new $this->promotion;

        $promotion->promotion_name = $data['promotion_name'];
        $promotion->description = $data['description'] ?? null;
        $promotion->discount_rate = $data['discount_rate'];
        $promotion->start_date = $data['start_date'];
        $promotion->end_date = $data['end_date'] ?? null;

        $promotion->save();
        return $promotion->fresh(); //Trả về bản ghi mới nhất sau khi lưu
    }

    // lấy  danh sách chương trình khuyến mãi
    public function getAllPromotion(){
        return $this->promotion->get();
    }

    public function getById($id){
        return $this->promotion->where('promotion_id', $id)->get();
    }

    public function update($data, $id) {
        $promotion = $this->promotion->find($id);

        $promotion->promotion_name = $data['promotion_name'];
        $promotion->description = $data['description'];
        $promotion->discount_rate = $data['discount_rate'];
        $promotion->start_date = $data['start_date'];
        $promotion->end_date = $data['end_date'];

        $promotion->update();
        return $promotion;
    }

    public function delete($id){
        $promotion = $this->promotion->find($id);
        $promotion->delete();
        return $promotion;
    }
}
?>