@extends('layouts.trials')

@section('content')
    <form class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date:</label>
            <div class="col-sm-3">
                <input type="text" readonly class="form-control form-control-sm" id="date" name="saleDate" value="{{ \Carbon\Carbon::parse($salesrecord->saleDate)->format('d-M-Y')}}">
            </div>
        </div>
        <h3>Customer</h3>
        <div class="form-group">
            <label class="control-label col-sm-2" for="custName">Name:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="custName" placeholder="Customer Name" name="custName" readonly value="{{$salesrecord->customerName}}">
            </div>
        </div>

        <h3>Items</h3>
@for($i = 0; $i < count($salesrecord);$i++)


        <div class="fgcontainer">
            <div class="form-group row">
                <label class="control-label col-sm-2" for="itemDesc">Item Description:</label>
                <div class="col-xs-3 itemdesc">
                    <input type="text" name="itemDescription[]" style="text-transform: capitalize;" class="form-control" id="itemDesc" value="{{$salesrecord->itemDescription}}">
                </div>
                <div class="col-xs-1 quantity">
                    <input type="text" class="form-control numbers" name="quantity[]" id="qty" oninput="checkInp()" value="{{$salesrecord->quantity}}" autocomplete="off">
                </div>
                <div class="col-sm-2 price">
                    <div class="input-group">
                        <div class="input-group-addon">@</div>
                        <input type="text"  class="form-control numbers" name="unitCost[]" id="unitCost"  oninput="checkInp()" value="{{$salesrecord->unitCost}}" autocomplete="off">
                    </div>
                </div>
                <div  class="col-sm-2 total">
                    <input id="totalcost" type="text" class="form-control" name="totalCost[]" value="{{$salesrecord->totalCost}}">
                </div>
                <button id="buttonz" class="btn btn-danger remove-more" type="button">-</button>
            </div>
        </div>
        <div id="cloneable"></div>

        <div class="form-group row">
            <label class="control-label col-sm-2" for="Totals">Overall Total:</label>
            <div class="col-xs-2">
                <input type="text" class="form-control" readonly id="ototals" onmouseenter="calcOT()" placeholder="Total items cost" name="ototals">
            </div>
            <label class="control-label col-sm-2" for="amtPaid">Deposit:</label>
            <div class="col-xs-2">
                <input type="text" class="form-control" id="amtPaid" onblur="Bal()" placeholder="Deposit" name="amtPaid">
            </div>
            <label class="control-label col-sm-2" for="balance">Balance:</label>
            <div class="col-xs-2">
                <input type="text" class="form-control" id="balance" onmouseover="Bal()" placeholder="Balance" name="balance">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Collection Date:</label>
            <div class="col-xs-4">
                <input type="date" class="form-control" name="collection">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
    @endfor
@endsection
