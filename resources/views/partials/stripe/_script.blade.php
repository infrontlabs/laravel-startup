<style>
    .StripeElement {
        border: solid 1px #ccc;
        border-radius: 4px;
        padding: 4px 8px 4px 8px;
    }
</style>
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
    var stripe = Stripe("{{config('services.stripe.key')}}");

    // Create an instance of Elements.
    var elements = stripe.elements({
        fonts: [
            {
                cssSrc: 'https://fonts.googleapis.com/css?family=Roboto',
            },
        ],
    });

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            border: 'solid 1px #eee',
            lineHeight: '28px',
            fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', { style: style });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        var sourceData = {
            name: document.querySelector('input[name="billing_name"]').value,
        };

        stripe.createToken(card, sourceData).then(function (result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                document.getElementById('stripe_token').value = result.token.id;
                //alert(result.token.id);
                form.submit();
            }
        });
    });
</script>
