<?php

namespace App\Services;

use App\Repositories\BannerRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

use function Pest\Laravel\call;

class BannerService
{

    /**
     * @var \App\Repositories\BannerRepository
     */
    protected $bannerRepository;

    /**
     * bannerRepository contructor.
     * 
     * @param BannerRepository $bannerRepository
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Validate post data.
     * Store to DB if there are no error.
     * 
     * @param array $data
     *  @return \App\Models\Bannner
     */
    public function saveBannerData($data)
    {
        $result = $this->bannerRepository->save($data);

        return $result;
    }

    public function getAll()
    {
        return $this->bannerRepository->getAllBanner();
    }

    public function getById($id)
    {
        return $this->bannerRepository->getById($id);
    }

    public function updateBanner($data, $id)
    {
        DB::beginTransaction();
        try {
            $banner = $this->bannerRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to update category.");
        }

        DB::commit();

        return $banner;
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $banner = $this->bannerRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Unable to delete Banner data.");
        }

        DB::commit();

        return $banner;
    }
}
