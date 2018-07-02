@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Invoices
        @endslot

        <table class="table table-borderless">
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                    <td>{{ $invoice->total() }}</td>
                    <td><a href="{{ route('account.subscription.invoices.download', $invoice->id) }}">Download</a></td>
                </tr>
            @endforeach
        </table>

    @endcomponent
@endsection
