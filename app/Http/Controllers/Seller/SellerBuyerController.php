<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Seller;

class SellerBuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $buyers = $seller->products()
            ->whereHas('transactios')
            ->with('transactions.buyer')
            ->get()
            ->pluck('transactions')
            ->collapse()
            ->pluck('buyer')
            ->unique('id')
            ->values()
        ;

        return $this->showAll('buyers');
    }
}
