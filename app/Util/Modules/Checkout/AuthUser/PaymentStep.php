<?php namespace app\UtilModules\Checkout\AuthUser;


use App\Models\Cart;
use app\Util\Modules\Checkout\AbstractCheckoutProcessor;
use app\Util\Modules\ShoppingCart\Base\ShoppingCartReconciler;
use app\Util\Modules\ShoppingCart\Base\ShoppingCartRepository;
use app\Util\Modules\ShoppingCart\Traits\SessionCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Payments;
use Session;

class PaymentStep extends AbstractCheckoutProcessor
{
    const STEP_ID = 3;

use ShoppingCartReconciler, SessionCache;

    protected $session;

    /**
     * @return Collection|null
     */
    public function getProducts()
    {
        $this->session = app('session');
        return $this->productsAreCached() ? $this->getCachedProducts() : null;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function displayPaymentForm()
    {

        //$this->updateCheckoutCookie(static::STEP_ID, $this->getCookieData());

        return view('frontend.english.checkout.payment');
    }

    /**
     * process the current step in the checkout process
     *
     * @param $data
     *
     * @return mixed
     */
    public function processCurrentStep($data)
    {

//        dd($data);
        return redirect()->route('u.checkout.viewInvoice');

        $amount = $this->getGrandTotal(false);

        $oldCard = Session::get('basket');


        Stripe::setApiKey('sk_test_17YCeJExi4wuKFxYPqVTxCbl');

        if (!isset($_POST['stripeToken'])) throw new \Exception("The Stripe Token was not generated correctly");

        $token = $_POST['stripeToken'];



        try{
            $charge = Charge::create(array(
                "amount" => $amount * 100,
                "currency" => "usd",
                "source" => $token, // obtained with Stripe.js
                "description" => "Test Charge"
            ));

            $payment = new Payments();
            $payment->user_id = 1;
            if(is_null(Auth::guard('user')->user()))
            {
                $payment->type = 'G';
            }

            else
            {
                $payment->type = 'U';
            }


            $payment->order_id = 1;
            $payment->name = $data['card-holder-name'];
            $payment->payment_id = $charge->id;
            $payment->amount = $amount;
            $payment->status = true;

            $payment->save();


        }catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        // TODO: Implement processCurrentStep() method.
    }
}