@extends('frontend.frontend_master')
@section('title')
    Pay Now
@endsection
<style>
    /* Style for the section containing the payment form */
.section-content {
    background-color: #f8f9fa;
    padding: 50px 0;

}

/* Style for the container holding the payment form */
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 0 15px;
}

/* Style for the payment message alert */
#payment-message {
    display: none;
    background-color: #17a2b8;
    color: #fff;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
}

/* Style for the payment form */
#payment-form {
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);

}

/* Style for the payment element container */
#payment-element {
    margin-bottom: 20px;
}

/* Style for the submit button */
#submit {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#submit:hover {
    background-color: #0056b3;
}

/* Style for the spinner */
#spinner {
    display: none;
    margin-left: 10px;
}

/* Center the button text vertically */
#button-text {
    display: inline-flex;
    align-items: center;
}

/* Style for the payment form inputs */
.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}
@media only screen and (max-width: 600px) {
  form {
    width: 80vw;
    min-width: initial;
  }
}
</style>
@section('styles')

@endsection
@section('content')
    <div class="border rounded border-1 bg-danger text-white p-2 d-flex justify-content-between mb-4 cartin">
        <h3 class="fw-normal mb-0  pt-5 fs-4 "></h3>
        <div>
            <p class="mb-0 pt-5"><span class="fs-5"></span> <a href="javascript:;"
                    class="text-body text-white text-decoration-none sort"> </a>

        </div>
    </div>

    <section class="section-content bg padding-y">
        <div class="container">

            <div id="payment-message" style="display: none;" class="alert alert-info"></div>

            <form action="" method="post" id="payment-form" class="form-control">
                <div id="payment-element" class="form-row"></div>
                <button type="submit" id="submit" class="btn form-control">
                    <span id="button-text">Pay now</span>
                    <span id="spinner" style="display: none;">Processing...</span>
                </button>
            </form>


        </div>

    </section>
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // This is your test publishable API key.
        const stripe = Stripe("{{ config('services.stripe.pk') }}");

        let elements;

        initialize();

        document.querySelector("#payment-form").addEventListener("submit", handleSubmit);

        // Fetches a payment intent and captures the client secret
        async function initialize() {
            const {
                clientSecret
            } = await fetch("{{ route('stripe.paymentIntent.create', $order->id) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    "_token": "{{ csrf_token() }}"
                }),
            }).then((r) => r.json());

            elements = stripe.elements({
                clientSecret
            });

            const paymentElement = elements.create("payment");
            paymentElement.mount("#payment-element");
        }

        async function handleSubmit(e) {
            e.preventDefault();
            setLoading(true);

            const {
                error
            } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: "{{ route('stripe.return', $order->id) }}",
                },
            });

            // This point will only be reached if there is an immediate error when
            // confirming the payment. Otherwise, your customer will be redirected to
            // your `return_url`. For some payment methods like iDEAL, your customer will
            // be redirected to an intermediate site first to authorize the payment, then
            // redirected to the `return_url`.
            if (error.type === "card_error" || error.type === "validation_error") {
                showMessage(error.message);
            } else {
                showMessage("An unexpected error occurred.");
            }

            setLoading(false);
        }

        // ------- UI helpers -------

        function showMessage(messageText) {
            const messageContainer = document.querySelector("#payment-message");

            messageContainer.style.display = "block";
            messageContainer.textContent = messageText;

            setTimeout(function() {
                messageContainer.style.display = "none";
                messageText.textContent = "";
            }, 4000);
        }

        // Show a spinner on payment submission
        function setLoading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("#submit").disabled = true;
                document.querySelector("#spinner").style.display = "inline";
                document.querySelector("#button-text").style.display = "none";
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").style.display = "none";
                document.querySelector("#button-text").style.display = "inline";
            }
        }
    </script>
@endsection
