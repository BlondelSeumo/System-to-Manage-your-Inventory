<?php namespace app\Util\Modules\Invoices\base;

use App\Util\Modules\Repo\EloquentRepository;
use App\Models\Frontend\Invoice;

class InvoiceRepository extends EloquentRepository
{

    /**
     * @param $data
     *
     * @return static
     */
    public function add($data)
    {
        $this->model->creating(function ($invoice) use ($data) {

            $invoice->id = $this->generateInvoiceID();

        });

        $this->model->order()->associate(array_get($data, 'order'));

        return parent::add($data);
    }

    /**
     * @return int|number
     */
    public function generateInvoiceID()
    {
        return int_random(10000, 9999999, 5);
    }

    /**
     * Specify the Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Invoice::class;
    }
}