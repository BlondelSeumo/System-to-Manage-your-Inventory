<?php

namespace App\Http\Controllers\Frontend\Checkout;

use app\Util\Modules\Checkout\AuthUser\ShippingStep;
use app\UtilModules\Checkout\AuthUser\PaymentStep;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthUserCheckoutController extends Controller
{
    /**
     * @var ShippingStep
     */
    private $shippingStep;

    private $paymentStep;



    /**
     * @param ShippingStep $shippingStep
     */
    public function __construct(ShippingStep $shippingStep, PaymentStep $paymentStep)
    {

        $this->shippingStep = $shippingStep;

        $this->paymentStep = $paymentStep;
    }

    /**
     * Displays the shipping info edit form
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $user = $this->shippingStep->retrieveUserDetails();

        return view('frontend.english.checkout.shipping', compact('user'));
    }

    /**
     * This will process user shipping details, if they decide to edit them
     *
     * @param updateShippingInfo $request
     *
     * @return mixed
     */
    public function shipping(updateShippingInfo $request)
    {
        return $this->shippingStep->processCurrentStep($request->all())->getStepDoneResponse($request);
    }

    /**
     * Displays the payment form
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function payment()
    {
        return view('frontend.english.checkout.payment');
    }

    public function postPayment(Request $request)
    {
        // process user payment details
        return redirect()->route('u.checkout.viewInvoice');

//        $this->paymentStep->processCurrentStep($request->all());

//        return redirect()->route('checkout.step4');

//        return redirect()->route('u.checkout.viewInvoice');
    }

    /**
     * Displays the order review form
     *
     * @return \Illuminate\View\View
     */
    public function reviewOrder()
    {

        return view('frontend.english.checkout.reviewOrder');
    }
}
