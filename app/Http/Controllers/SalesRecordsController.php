<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesRecordAbstract;
use App\SalesRecordItems;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SalesRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Sales';
        $salesrecords =  SalesRecordAbstract::orderBy('id','desc')->paginate(5);
        return view('sales.index')->with('salesrecords',$salesrecords);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
          'invoice_no'=>'required',
          'customerName'=>'required',
          'enterprise'=>'required',
          'saleDate'=>'required',
          'itemDescription'=>'required',
          'quantity'=>'required',
          'unitCost'=>'required',
          'totalcost'=>'required',
          'ototals'=>'required',
          'amtPaid'=>'required',
          'balance'=>'required',
      ]);


      $invoice_no = $request->input('invoice_no');
      $customerName = ucfirst($request->input('customerName'));
      $saleDate = $request->input('saleDate');
      $itemDescription = $request->input('itemDescription');
      $enterprise = $request->input('enterprise');
      $quantity= $request->input('quantity');
      $unitCost = $request->input('unitCost');
      $totalcost = $request->input('totalcost');
      $ototals = $request->input('ototals');
      $amtPaid = $request->input('amtPaid');
      $balance = $request->input('balance');
      $comment = '';

        $id = DB::table('sales_abstract')->insertGetId(
            ['invoiceno' => $invoice_no, 'customerName'=> $customerName,
                'saleDate'=> $saleDate, 'invoiceTotals'=> $ototals,
                'amountPaid'=>$amtPaid, 'balance'=>$balance, 'comment'=>$comment
            ]
        );
        $input = $request->all();
        $items = array();
        for($i=0; $i< count($input['itemDescription']); $i++){

        $item = array('itemDescription' => $itemDescription[$i],
            'customer_id'=> $id,
            'enterprise' => $enterprise[$i],
            'quantity' => $quantity[$i],
            'unitCost' => $unitCost[$i],
            'totalCost' => $totalcost[$i]);


        $items[] = $item;
        }
        $a = print_r($items);
        DB::table('sale_record_items')->insert($items);
        /* for ($i = 1; $i < count($itemDescription); $i++) {
             DB::statement("INSERT INTO `sales_record_items` (`FK_customerId`,`itemDescription`,`enterprise`,`quantity`,`unitCost`,`totalCost`)
 VALUES ('$id[$i]','$itemDescription[$i]','$enterprise[$i]','$quantity[$i]','$unitCost[$i]','$totalcost[$i]')");
         }
 */
      return redirect('/sales')->with('success','Record Entered Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salerecord = SalesRecordAbstract::find($id);
        return view('sales.view')->with('salerecord',$salerecord);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salesrecord =  SalesRecordAbstract::find($id);
        return view('sales.edit')->with('salesrecord',$salesrecord);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
