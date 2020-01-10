<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;

class SellerController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only('show');
        $this->middleware('can:view,seller')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->allowedAdminAction();
        $sellers = Seller::has('products')->get();

        return $this->showAll($sellers);
    }

    public function show(Seller $seller)
    {
        // $sellers = Seller::has('products')->findOrFail($id);

        return $this->showOne($seller);
    }
}
