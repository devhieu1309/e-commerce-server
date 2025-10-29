<?php
namespace App\Repositories;
use App\Models\StoreBranch;
class StoreBranchRepository{
    
    /**
     * @var StoreBranch
     */
    protected $storeBranch;
    /**
     * StoreBranchRepository constructor
     * 
     * @param StoreBranch $storeBranch
     */

    public function __construct(StoreBranch $storeBranch)
    {
        $this->storeBranch = $storeBranch;
    }

    // save a new store branch to database
    public function save($data) {
        $storeBranch = new $this->storeBranch;

        $storeBranch->name = $data['name'];
        $storeBranch->phone_number = $data['phone_number'];
        $storeBranch->email = $data['email'];
        $storeBranch->opening_hours = $data['opening_hours'];
        $storeBranch->address_id = $data['address_id'];
        $storeBranch->map_link = $data['map_link'];

        $storeBranch->save();
        return $storeBranch->fresh(); //Trả về bản ghi mới nhất sau khi lưu
    }

    // lấy  danh sách chi nhánh
    public function getAllStoreBranch(){
        return $this->storeBranch->get();
    }

    public function getById($id){
        return $this->storeBranch->where('store_branch_id', $id)->get();
    }

    public function update($data, $id) {
        $storeBranch = $this->storeBranch->find($id);

        $storeBranch->name = $data['name'];
        $storeBranch->phone_number = $data['phone_number'];
        $storeBranch->email = $data['email'];
        $storeBranch->opening_hours = $data['opening_hours'];
        $storeBranch->address_id = $data['address_id'];
        $storeBranch->map_link = $data['map_link'];

        $storeBranch->update();
        return $storeBranch;
    }

    public function delete($id){
        $storeBranch = $this->storeBranch->find($id);
        $storeBranch->delete();
        return $storeBranch;
    }
}
?>