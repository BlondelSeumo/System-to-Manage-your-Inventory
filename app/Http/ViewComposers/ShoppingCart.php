<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 1/15/18
 * Time: 7:15 PM
 */

namespace App\Http\ViewComposers;


use app\Util\Modules\Composers\ViewComposer;
use app\Util\Modules\ShoppingCart\Base\Main\Basket as ShoppingCartEntity;
use Illuminate\View\View;

class ShoppingCart extends ViewComposer
{

    /**
     * output variable name
     *
     * @var string
     */
    protected $outputVariable = 'cart';

    /**
     * @param ShoppingCartEntity $entity
     */
    public function __construct(ShoppingCartEntity $entity)
    {
        $this->dataSource = $entity;
    }

    /**
     * compose the view
     *
     * @param View $view
     *
     * @return mixed
     */
    public function compose(View $view)
    {

        return $view->with($this->outputVariable, $this->getData());
    }

    /**
     * Gets the data to display in the view
     *
     * @return mixed
     */
    public function getData()
    {
        $data = $this->dataSource->displayShoppingCart();

        return $data;

    }
}