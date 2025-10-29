<?php

namespace App\Repositories;

use App\Models\Banner;

class BannerRepository
{
    /**
     * @var Banner 
     */
    protected $banner;

    /**
     * BannerRepository constructor
     * 
     * @param Banner $banner
     */

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Save Category
     *
     * @param $data
     * @return Banner
     */
    public function save($data)
    {
        $banner = new $this->banner;

        $banner->title = $data['title'];
        $banner->image = $data['image'];
        $banner->link_url = $data['link_url'];
        $banner->position = $data['position'];
        $banner->is_active = $data['is_active'];

        $banner->save();

        return $banner->fresh();
    }

    public function getAllBanner()
    {
        return $this->banner->get();
    }

    public function getById($id)
    {
        return $this->banner->where("id", $id)->get();
    }

    public function update($data, $id)
    {

        $banner = $this->banner->find($id);

        $banner->title = $data['title'];
        $banner->image = $data['image'];
        $banner->link_url = $data['link_url'];
        $banner->position = $data['position'];
        $banner->is_active = $data['is_active'];

        $banner->update();

        return $banner;
    }

    public function delete($id)
    {
        $banner = $this->banner->find($id);
        $banner->delete();

        return $banner;
    }
}
