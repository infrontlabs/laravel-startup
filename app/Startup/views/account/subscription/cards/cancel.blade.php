
@component('components.card')
    @slot('title')
        Cancel Subscription
    @endslot

    <form action="{{ route('account.subscription.cancel.process') }}" method="post">
        @csrf


        <button type="submit" class="btn btn-outline-danger">Cancel my subscription</button>
    </form>

@endcomponent
