<?php
    namespace App\Repositories;

    use App\Advertisement;
    use Illuminate\Support\Facades\Auth;

    class AdvertisementRepository {

        protected $model;

        /**
         * AdvertisementRepository constructor.
         * @param Advertisement $advertisement
         */
        public function __construct(Advertisement $advertisement)
        {
            $this->model = $advertisement;
        }

        /**
         * Get model
         * @return Advertisement
         */
        public function getModel() {
            return $this->model;
        }

        /**
         * @return mixed
         */
        public function paginate() {
            return $this->model->with('user')->orderBy('created_at', 'desc')->paginate(20);
        }

        /**
         * @param $data
         * @return mixed
         */
        public function create($data) {
            return $this->model->create(array_merge($data, array(
                'user_id' => Auth::user()->id
            )));
        }
    }