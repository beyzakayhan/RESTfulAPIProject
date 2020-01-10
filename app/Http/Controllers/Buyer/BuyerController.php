<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;

class BuyerController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only('index');
        $this->middleware('can:view,buyer')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->allowedAdminAction();
        $buyers = Buyer::has('transactions')->get();

        return $this->showall($buyers);
    }

    public function show(Buyer $buyer)
    {
        //$buyer = Buyer::has('transactions')->findOrFAil($id);

        return $this->showOne($buyer);
    }
}
