<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use JWTAuth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Transaction::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // return $input;
        
        $input['user_id'] = '1';
        // $input['user_id'] = JWTAuth::user()->id;
        for ($i=0; $i < count($input['cart']); $i++) {
            // $input['cart'][$i]['product_id'] = $input[$i]['product_id'];
            // $input['cart'][$i]['quantity'] = $input[$i]['quantity'];
            $input['product_id'] = $input['cart'][$i]['product_id'];
            $input['quantity'] = $input['cart'][$i]['quantity'];
            if ($input['cart'][$i]['product']['discount'] > 0) {
                $input['total'] = $input['cart'][$i]['product']['price_after_discount'];
            } else {
                $input['total'] = $input['cart'][$i]['product']['price'];
                // $input['total'] = $input[$i]['total'];
            }
            $input['status'] = 'pending';
            Transaction::create($input);
        }
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return 'Berhasil menghapus Transaksi';
    }
}
