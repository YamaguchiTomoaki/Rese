@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="./css/bootstrap.css">
<script src="./js/jquery.js"></script>
<script src="./js/bootstrap.js"></script>
@endsection

@section('content')
<div class="content">
    <form action="{{ route('payment.store') }}" method="POST">
        {{ csrf_field() }}
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key={{ config('stripe.stripe_public_key') }}
            data-amount="1000"
            data-name="Stripe Demo"
            data-label="決済をする"
            data-description="Online course about integrating Stripe"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="JPY">
        </script>
    </form>
</div>@endsection