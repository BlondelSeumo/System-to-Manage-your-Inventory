<?php namespace app\Util\Modules\Guests;

use App\Models\Frontend\Guest;
use app\Util\Modules\Repo\EloquentRepository;

class GuestRepository extends EloquentRepository
{

    /**
     * @param $data
     * @param null $id
     *
     * @return EloquentRepository|\Illuminate\Database\Eloquent\Model
     */
    public function addGuest($data, $id = null)
    {
        return parent::addIfNotExist($id, $data);
    }

    /**
     * Specify the Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Guest::class;
    }
}