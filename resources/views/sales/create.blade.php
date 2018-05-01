@extends('layouts.trials')

@section('content')
    {!! Form::open(['action' => 'SalesRecordsController@store', 'method' => 'POST']) !!}
  <div class="form-inline row">
        <div class="input-group col-xs-3">
            <div class="input-group-addon">{{Form::label('invoice','Invoice No.')}}</div>
            {{Form::text('invoice_no','',['class'=>'form-control invoice','value'=>'0'])}}
        </div>

        <div class="input-group col-xs-5">
            <div class="input-group-addon">Name:</div>
            {{Form::text('customerName','',['class'=>'form-control','autocomplete'=>'off','placeholder'=>'Customer Name','style'=>'text-transform:capitalize'])}}
            <!--input class="form-control" id="customerName" name="customerName" type="text" autocomplete="off" placeholder="Customer Name"-->
        </div>

        <div class="input-group col-xs-2">
            <div class="input-group-addon">Date:</div>
            {{Form::date('saleDate','',['class'=>'form-control'])}}
        </div>

  </div><br>
    <div id="button" class="text-center">
        {{Form::button('Add items',['class'=>'btn btn-primary add-more'])}}
        <!--button id="b1" class="btn add-more" type="button">Add items</button-->
    </div><br>
    <!--form class="form-horizontal"-->
        <div class="fgcontainer">
            <div class="form-group row">
                <label class="control-label col-sm-1" id="items" for="itemDesc">Item </label>
                <div class="col-xs-3 itemdesc">
                    {{Form::text('itemDescription[]','',['class'=>'form-control','placeholder'=>'Item Description','style'=>'text-transform:capitalize'])}}
                    <!--input type="text" name="itemDescription[]" onblur="pricesetter()" style="text-transform: capitalize;" class="form-control" id="itemDesc" placeholder="Item Description"-->
                </div>
                <div class="col-xs-2 enterprise">
                    <select class="custom-select form-control" id="inputGroupSelect01" name="enterprise[]">
                        <option selected >Choose..</option>
                        <option>Seedlings</option>
                        <option>Greenhouse</option>
                        <option>Mushroom</option>
                        <option>Koppert</option>
                    </select>
                </div>
                <div class="col-xs-1 quantity">
                    {{Form::text('quantity[]','',['class'=>'form-control qty numbers cont','oninput'=>'inp1();checkInp()','placeholder'=>'Qty','autocomplete'=>'off'])}}
                    <!--input type="text" class="form-control qty numbers cont" name="quantity[]" id="qty" oninput="inp1();checkInp()" placeholder="Quantity" autocomplete="off"-->
                </div>
                <div class="col-sm-2 price">
                    <div class="input-group">
                        <div class="input-group-addon">@</div>
                        {{Form::text('unitCost[]','',['class'=>'form-control unitCost numbers cont','oninput'=>'inp2();checkInp()','placeholder'=>'Unit Cost','autocomplete'=>'off'])}}
                        <!--input type="text"  class="form-control unitCost numbers cont" name="unitCost[]" id="unitCost"  oninput="inp2();checkInp()" placeholder="Unit Cost" autocomplete="off"-->
                    </div>
                </div>
                <div  class="col-sm-2 total">
                    {{Form::text('totalcost[]','',['class'=>'form-control totalcost numbers cont','placeholder'=>'Total Cost','autocomplete'=>'off'])}}
                    <!--input id="totalcost" type="text" class="form-control totalcost numbers cont" name="totalCost[]" onmouseover="" onmouseleave="" placeholder="Total Cost"-->
                </div>
                <span class="dot"><i class="glyphicon glyphicon-pencil text-center" style="margin-left: 5px;
margin-top: 3px;"></i></span>
                <button id="buttonz" class="btn btn-danger remove-more" type="button">-</button>
            </div>
        </div>
        <div id="cloneable"></div>

        <div class="col-sm-3  " style="float: right; margin-right: 100px;">
            <table class="table table-sm table-hover">
                <tbody>
                <tr >
                    <td>
                        <label class="control-label col-sm-2">Totals:</label>
                    </td>
                    <td>
                        {{Form::text('ototals','',['class'=>'form-control input-sm ototals','readonly','value'=>'0'])}}
                        <!--input class="form-control ototals" id="ototals" type="text" name="total" readonly value="0"-->
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="control-label col-sm-2">Paid:</label>
                    </td>
                    <td>
                        {{Form::text('amtPaid','',['class'=>'form-control form-control-sm amtPaid cont','oninput'=>'inp2();checkInp()','autocomplete'=>'off'])}}
                        <!--input class="form-control amtPaid" type="text" name="total" autocomplete="off"-->
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="control-label col-sm-2">Balance:</label>
                    </td>
                    <td>
                        {{Form::text('balance','',['class'=>'form-control form-control-sm balance','readonly','value'=>'0'])}}
                        <!--input class="form-control balance" id="balance" type="text" name="Balance" readonly value="0"-->
                    </td>
                </tr>

                </tbody>
            </table>
            <div id="button" class="text-center">
                {{Form::submit('Submit',['class'=>'btn btn-primary submit'])}}
            </div>
        </div>
{!!Form::close()  !!}

    <script type="text/javascript">
        function inp1(){
            $('.qty').on('keyup input',function() {
                var a = parseFloat($(this).val());
                var b = parseFloat($(this).parents('.quantity').siblings('.price').find('.unitCost').val());
                var c  = a * b;
                //console.log(c);
                if(isNaN(c))c = 0;
                $(this).parent('.quantity').siblings('.total').children('.totalcost').val(c);
                console.log($(this).parent('.quantity').siblings('.total').children('.totalcost'));
            });
            calc();
        }
        function inp2(){
            $('.unitCost').on('keyup input',function() {
                var a = parseFloat($(this).val());
                var b = parseFloat($(this).closest('.price').siblings('.quantity').children('.qty').val());
                var c  = a * b;
                //console.log(c);
                if(isNaN(c))c = 0;
                $(this).closest('.price').siblings('.total').children('.totalcost').val(c);

            });
            calc();
        }

        function calc(){
            $('body :input.cont').on('input change focus blur',function(){
                var total = 0;
                $(".fgcontainer").find('.totalcost').each(function(){
                    total += parseFloat($( this ).val() ) || 0;
                });
                var net = total - parseFloat($('.amtPaid').val() || 0);
                $(".ototals").val(total);

                $(".balance").val(net);
            });
        }
        function checkInp(){
            var x = $(":input[type='text'].numbers").val();
            if ($.isNumeric(x) && $.isNumeric(x) !==""){
                return false;
            }else{
                alert("Please input Numbers Only");
            }
        }

        $('body .amtPaid').on('focus click input',function(){
            var bal= $(":input[type='text'].ototals").val() - $(":input[type='text'].amtPaid").val();
            $('.balance').val(bal);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
//define template
            var template = $('.fgcontainer:first').clone(true);
//define counter
            var sectionsCount = 1;
            if ($('.fgcontainer').length = 1) {
                $("#buttonz").hide();
            } else if ($('.fgcontainer').length > 1) {
                $("#buttonz").show();
            }

            //console.log($('.fgcontainer').length);
//add new section

            $('body').on('click', '.add-more', function () {
//increment
                sectionsCount++;
//loop through each input
                var section = template.clone().find(':input').each(function () {
//set id to store the updated section number
                    var newId = this.id + sectionsCount;
//update for label
                    $(this).prev().attr('name', newId);
                    $(this).prev().attr('for', sectionsCount);
                    $(this).prev().attr('value', sectionsCount);
//update id
                    this.id = newId;

                }).end()
                //inject new section
                    .appendTo('#cloneable');


                return false;


            });
//remove section
            $('body').on('click', '.remove-more', function () {
//fade out section
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover item!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                }).then((willDelete) => {
                    if (willDelete) {
                        if ($('.fgcontainer').length > 1) {
                            $(this).closest(".fgcontainer").remove();
                            sectionsCount--;
                            $('#items').text('Item'+sectionsCount);
                            var total = 0;
                            $(".fgcontainer").find('.totalcost').each(function(){
                                total += parseFloat($( this ).val() ) || 0;
                            });
                            var net = total - parseFloat($('.amtPaid').val() || 0);
                            $(".ototals").val(total);
                            $(".balance").val(net);
                        }
                    } else {
                        return false;
            }
            });
            });
        });

$('body').on('click', '.dot', function () {
    swal({
        title:"Comment",
        content: "input",
    })
});

    </script>

{!! Form::close() !!}
@endsection