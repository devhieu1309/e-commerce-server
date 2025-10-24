<?php
namespace App\Repositories;
use App\Models\ShippingMethod;
class ShippingMethodRepository{
    
    /**
     * @var ShippingMethod
     */
    protected $shippingMethod;
    /**
     * ShippingMethodRepository constructor
     * 
     * @param ShippingMethod $shippingMethod
     */

    public function __construct(ShippingMethod $shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;
    }

    // save a new shipping method to database
    public function save($data) {
        $shippingMethod = new $this->shippingMethod;

        $shippingMethod->shipping_method_name = $data['shipping_method_name'];
        $shippingMethod->shipping_method_price = $data['shipping_method_price'];

        $shippingMethod->save();
        return $shippingMethod->fresh(); //Trả về bản ghi mới nhất sau khi lưu
    }

    // lấy  danh sách phương thức vận chuyển
    public function getAllShippingMethod(){
        return $this->shippingMethod->get();
    }

    public function getById($id){
        return $this->shippingMethod->where('shipping_method_id', $id)->get();
    }

    public function update($data, $id) {
        $shippingMethod = $this->shippingMethod->find($id);

        $shippingMethod->shipping_method_name = $data['shipping_method_name'];
        $shippingMethod->shipping_method_price = $data['shipping_method_price'];

        $shippingMethod->update();
        return $shippingMethod;
    }

    public function delete($id){
        $shippingMethod = $this->shippingMethod->find($id);
        $shippingMethod->delete();
        return $shippingMethod;
    }
}
?>