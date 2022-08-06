<?php

namespace App\Http\Controllers;

use App\Models\Product;
use domain\Facades\ProductFacade;
use Illuminate\Http\Request;

class ProductController extends ParentController
{
    public function index()
    {
        $response['items'] = ProductFacade::all();
        return view('pages.product.index')->with($response);
    }


    public function store(Request $request)
    {
        ProductFacade::store($request->all());
        return redirect()->back();
    }

    public function delete($item_id)
    {

        ProductFacade::delete($item_id);
        return redirect()->back();
    }

    public function done($item_id)
    {

        ProductFacade::done($item_id);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $response['item'] = ProductFacade::get($request['item_id']);
        return view('pages.product.edit')->with($response);
    }

    public function update(Request $request, $item_id)
    {
        ProductFacade::update($request->all(), $item_id);
        return redirect()->back();
    }

}
