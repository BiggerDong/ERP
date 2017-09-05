<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Material;
use App\MaterialBill;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillsController extends Controller
{
    /**
     * BillsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['time','stApiSearchMid','orApiSearchSid']);
    }

    public function time()
    {
        $data = DB::select('select count(*) as num, name from bills join bills_type where bills.type = bills_type.id group by name');
        return collect($data)->toJson();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function stIndex()
    {
        $bills = Bill::where('type','1')->get();
        return view('sts.index',compact('bills'));
    }

    public function orIndex()
    {
        $bills = Bill::where('type','2')->get();
        return view('ors.index',compact('bills'));
    }

    public function aiIndex()
    {
        $bills = Bill::where('type','3')->get();
        return view('ais.index',compact('bills'));
    }

    public function diIndex()
    {
        $bills = Bill::where('type','4')->get();
        return view('dis.index',compact('bills'));
    }

    public function piIndex()
    {
        $bills = Bill::where('type','5')->get();
        return view('pis.index',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function stCreate()
    {
        $bill_id = date('Y').date('m').date('d').rand(100,999);
        $date = date('Y-m-d');
        return view('sts.create',compact('bill_id','date'));
    }

    public function orCreate()
    {
        $bill_id = date('Y').date('m').date('d').rand(100,999);
        $date = date('Y-m-d');
        return view('ors.create',compact('bill_id','date'));
    }

    public function aiCreate()
    {
        $bill_id = date('Y').date('m').date('d').rand(100,999);
        $date = date('Y-m-d');
        return view('ais.create',compact('bill_id','date'));
    }

    public function diCreate()
    {
        $bill_id = date('Y').date('m').date('d').rand(100,999);
        $date = date('Y-m-d');
        return view('dis.create',compact('bill_id','date'));
    }

    public function piCreate()
    {
        $bill_id = date('Y').date('m').date('d').rand(100,999);
        $date = date('Y-m-d');
        return view('pis.create',compact('bill_id','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function stStore(Request $request)
    {
        $bill = Bill::create([
            'bid' => $request->get('bid'),
            'type' => $request->get('type'),
            'creator' => $request->get('creator'),
            'receiver' => $request->get('receiver'),
        ]);

        $material = Material::where('mid',$request->get('material_id'))->first();
        $amount = $request->get('amount');
        $total = $material['price'] * $amount;

        MaterialBill::create([
            'material_id' => $material->id,
            'bill_id' => $bill->id,
            'amount' => $request->get('amount'),
            'total' => $total
        ]);

        return redirect()->route('stshow',[$bill->id]);

    }

    public function orStore(Request $request)
    {
        $supplier = Supplier::where('sid',$request->get('receiver'))->first();
        $bill = Bill::create([
            'bid' => $request->get('bid'),
            'type' => $request->get('type'),
            'creator' => $request->get('creator'),
            'receiver' => $supplier->name,
        ]);

        $material = Material::where('mid',$request->get('material_id'))->first();
        $amount = $request->get('amount');
        $total = $material['price'] * $amount;

        MaterialBill::create([
            'material_id' => $material->id,
            'bill_id' => $bill->id,
            'amount' => $request->get('amount'),
            'total' => $total
        ]);

        return redirect()->route('orshow',[$bill->id]);
    }

    public function aiStore(Request $request)
    {
        $bill = Bill::create([
            'bid' => $request->get('bid'),
            'type' => $request->get('type'),
            'creator' => $request->get('creator'),
            'receiver' => $request->get('receiver'),
        ]);

        $material = Material::where('mid',$request->get('material_id'))->first();
        $amount = $request->get('amount');
        $total = $material['price'] * $amount;

        MaterialBill::create([
            'material_id' => $material->id,
            'bill_id' => $bill->id,
            'amount' => $request->get('amount'),
            'total' => $total
        ]);

        $material->increment('stock',$amount);

        return redirect()->route('aishow',[$bill->id]);
    }

    public function diStore(Request $request)
    {
        $bill = Bill::create([
            'bid' => $request->get('bid'),
            'type' => $request->get('type'),
            'creator' => $request->get('creator'),
            'receiver' => $request->get('receiver'),
            'remark' => $request->get('remark')
        ]);

        $material = Material::where('mid',$request->get('material_id'))->first();
        $amount = $request->get('amount');
        $total = $material['price'] * $amount;

        MaterialBill::create([
            'material_id' => $material->id,
            'bill_id' => $bill->id,
            'amount' => $request->get('amount'),
            'total' => $total
        ]);

        return redirect()->route('dishow',[$bill->id]);
    }

    public function piStore(Request $request)
    {
        $bill = Bill::create([
            'bid' => $request->get('bid'),
            'type' => $request->get('type'),
            'creator' => $request->get('creator'),
            'receiver' => $request->get('receiver'),
        ]);

        $material = Material::where('mid',$request->get('material_id'))->first();
        $amount = $request->get('amount');
        $total = $material['price'] * $amount;

        MaterialBill::create([
            'material_id' => $material->id,
            'bill_id' => $bill->id,
            'amount' => $request->get('amount'),
            'total' => $total
        ]);

        return redirect()->route('pishow',[$bill->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function stShow($id)
    {
        $bill = Bill::find($id);
        $stbill = MaterialBill::where('bill_id',$id)->first();
        return view('sts.show',compact('bill','stbill'));
    }

    public function orShow($id)
    {
        $bill = Bill::find($id);
        $orbill = MaterialBill::where('bill_id',$id)->first();
        return view('ors.show',compact('bill','orbill'));
    }

    public function aiShow($id)
    {
        $bill = Bill::find($id);
        $aibill = MaterialBill::where('bill_id',$id)->first();
        return view('ais.show',compact('bill','aibill'));
    }

    public function diShow($id)
    {
        $bill = Bill::find($id);
        $dibill = MaterialBill::where('bill_id',$id)->first();
        return view('dis.show',compact('bill','dibill'));
    }

    public function piShow($id)
    {
        $bill = Bill::find($id);
        $pibill = MaterialBill::where('bill_id',$id)->first();
        return view('pis.show',compact('bill','pibill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function stApiSearchMid()
    {
        $mids = Material::published()->get();
        return $mids;
    }

    public function orApiSearchSid()
    {
        $suplliers = Supplier::all();
        return $suplliers;
    }
}
