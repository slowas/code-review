<?php
    namespace App\Services;

    use App\Repositories\AdvertisementRepository;

    class AdvertisementService {

        public $advertisement;

        /**
         * AdvertisementService constructor.
         * @param AdvertisementRepository $advertisement
         */
        public function __construct(AdvertisementRepository $advertisement)
        {
            $this->advertisement = $advertisement;
        }

        /**
         * @return mixed
         */
        public function paginate() {
            return $this->advertisement->paginate(20);
        }

        /**
         * @param $request
         * @return mixed
         */
        public function create($request)
        {
            return $this->advertisement->create($request->only($this->advertisement->getModel()->fillable));
        }
    }