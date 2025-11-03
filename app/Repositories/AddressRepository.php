<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository
{

    /**
     * @var Address
     */
    protected $address;


    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function save($data)
    {
        $address = new $this->address;

        $address->detailed_address = $data['detailed_address'];
        $address->provinces_id = $data['provinces_id'];
        $address->wards_id = $data['wards_id'];

        $address->save();
        return $address->fresh(); //Trả về bản ghi mới nhất sau khi lưu
    }

    public function getAddress()
    {
        return $this->address->get();
    }

    public function getById($id)
    {
        return $this->address->where("address_id", $id)->get();
    }

    public function update($data, $id)
    {

        $address = $this->address->find($id);

        $address->detailed_address = $data['detailed_address'];
        $address->wards_id = $data['wards_id'];
        $address->provinces_id = $data['provinces_id'];

        $address->update();

        return $address;
    }

    public function delete($id)
    {
        $address = $this->address->find($id);
        $address->delete();

        return $address;
    }
}
