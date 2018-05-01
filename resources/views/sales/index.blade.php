@extends('layouts.trials')

@section('content')
    <table class="table table-responsive-sm">
        <thead style="background-color: #0b2e13;color: #ffffff;">
        <tr>
            <th class="text-center">Date</th>
            <th class="text-center">Customer Name</th>
            <th>Total Invoice Amount</th>
            <th>Amout Paid</th>
            <th>Balance</th>
            <th class="text-center">Comment</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @if(count($salesrecords) > 0 )
            @foreach($salesrecords as $sale)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($sale->saleDate)->format('d-M-Y')}}</td>
                    <td class="text-center">{{$sale->customerName}}</td>
                    <td class="text-center">{{$sale->invoiceTotals}}</td>
                    <td>{{$sale->amountPaid}}</td>
                    <td>{{$sale->balance}}</td>
                    <td>@if($sale->comment){{$sale->comment}}@else/**No Comment**/@endif</td>
                    <td><a class="btn btn-default glyphicon glyphicon-pencil" type="button" data-toggle="tooltip" title="Edit" trigger="hover" href="/sales/{{$sale->id}}/edit"></a></td>
                </tr>
                @endforeach
            <div class="text-center">{{$salesrecords->links()}}</div>
        @else
            No records found
        @endif

        </tbody>
    </table>
@endsection
