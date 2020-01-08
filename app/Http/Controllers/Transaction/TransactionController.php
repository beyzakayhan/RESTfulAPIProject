<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\ApiController;
use App\Transaction;

class TransactionController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        return $this->showAll($transactions);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return $this->showOne($transaction);
    }
}
