
        function getter(vl) {
           
                }
        function setter(val) {
                    $('#totalCost').val(val);
                }
        function costing(x){
            x = $(x);
            var qty= x.parent(".total").siblings(".quantity").children("#qty").val() || 0;
            var cost = x.parent(".total").siblings(".price").find("#unitCost").val() || 0;
            var tcost = parseFloat(qty) * parseFloat(cost);
                v = x.val(parseFloat(tcost));
            $('#totalCost').val(v);
        }
        function calcOT(){
            if ($(".fgcontainer").length==1){
            var cost = $("#totalcost").val();
            $("#finCost").val(cost);
        }else{
            var total = 0;
            $(".fgcontainer").find('#totalcost').each(function(){
            total += parseFloat($( this ).val() ) || 0;
        });
            $("#finCost").val(total);
    }

}
        function Bal(){
            var bal= $("#finCost").val() - $("#amtPaid").val();
            $("#balance").val(bal);
    }

        function checkInp(){
            var x = $(":input[type='text'].numbers").val();
            if ($.isNumeric(x) && $.isNumeric(x) !==""){
                return false;
            }else{
                alert("Please input Numbers Only");
            }
        }


$(document).ready(function() {

    $('body').mousemove(function() {
        Bal();
        costing(this);
        });
//define template
            var template = $('.fgcontainer:first').clone(true);

//define counter
            var sectionsCount = 1;

if ($(".fgcontainer:first")) {
    $("#buttonz").hide();
}

//add new section
            $('body').on('click', '.add-more', function () {
//increment
                sectionsCount++;

//loop through each input
                var section = template.clone().find(':input').each(function () {

//set id to store the updated section number
                    var newId = this.id + sectionsCount;

//update for label
                    $(this).prev().attr('id', newId);
                    $(this).prev().attr('value', '');

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
        if ($('.fgcontainer').length > 1) {
            $(this).closest(".fgcontainer").remove();
            sectionsCount--;

        }

    });
    });

