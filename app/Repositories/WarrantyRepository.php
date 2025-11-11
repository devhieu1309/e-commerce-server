<?php

namespace App\Repositories;

use App\Models\Warranty;

class WarrantyRepository
{

    /**
     * @var Warranty
     */
    protected $warranty;
    /**
     * WarrantyRepository constructor
     * 
     * @param Warranty $warranty
     */

    public function __construct(Warranty $warranty)
    {
        $this->warranty = $warranty;
    }

    // save a new warranty to database
    public function save($data)
    {
        $warranty = new $this->warranty;

        $warranty->serial_number = $data['serial_number'];
        $warranty->warranty_status = $data['warranty_status'];
        $warranty->warranty_start = $data['warranty_start'];
        $warranty->warranty_expiry = $data['warranty_expiry'] ?? null;
        $warranty->branch = $data['branch'] ?? null;
        $warranty->description = $data['description'] ?? null;
        $warranty->product_id = $data['product_id'];

        $warranty->save();
        return $warranty->fresh(); //Trả về bản ghi mới nhất sau khi lưu
    }

    // lấy  danh sách chương trình khuyến mãi
    public function getAllWarranty()
    {
        return $this->warranty->get();
    }

    public function getById($id)
    {
        return $this->warranty->where('id', $id)->get();
    }

    public function update($data, $id)
    {
        $warranty = $this->warranty->find($id);

        $warranty->serial_number = $data['serial_number'];
        $warranty->warranty_status = $data['warranty_status'];
        $warranty->warranty_start = $data['warranty_start'];
        $warranty->warranty_expiry = $data['warranty_expiry'] ?? null;
        $warranty->branch = $data['branch'] ?? null;
        $warranty->description = $data['description'] ?? null;
        $warranty->product_id = $data['product_id'];

        $warranty->update();
        return $warranty;
    }

    public function delete($id)
    {
        $warranty = $this->warranty->find($id);
        $warranty->delete();
        return $warranty;
    }

    public function searchBySerialNumbel(string $serial)
    {
        $warranty = $this->warranty->where('serial_number', $serial)->first();
        return $warranty;
    }
}
