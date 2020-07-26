/**
 * Created by ubuntu on 1/18/17.
 */
Stripe.setPublishableKey('pk_test_GeQmsYiqnNx70uDgv5KcliW6');

// Grab the form:
    var $form = $('#payment-form');

    $form.submit(function (event) {
        $('#charge-error').addClass('hidden');
        $form.find('button').prop('disabled',true);

        Stripe.card.createToken({
            number: $('#card-number').val(),
            cvc: $('#card-cvc').val(),
            exp_month: $('#card-expiry-month').val(),
            exp_year: $('#card-expiry-year').val(),
            name: $('#card-holder-name').val()
        }, stripeResponseHandler);

        return false;
    })


function stripeResponseHandler(status, response) {
// Show the errors on the form
    if(response.error)
    {
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled',false);
    }else
    {
        var token = response.id;
        // alert(token);
        // return false;

        // Insert the token into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));

        // Submit the form:
        $form.get(0).submit();
    }
}
