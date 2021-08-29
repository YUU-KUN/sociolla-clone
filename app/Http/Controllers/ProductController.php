<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('ProductGallery')->with('Brand')->get()->sortByDesc('created_at');
        return $product;
        // return view('product', compact('product'));
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
    public function store(StoreProduct $request)
    {
        // if (Auth::user()->level != 'superadmin') {
        //     return 'Unauthorized';
        // }
        $input = $request->all();
        $input['iSPreOrder'] = true ? $input['iSPreOrder'] = '1' : $input['iSPreOrder'] = '0';
        $input['hasVoucher'] = true ? $input['hasVoucher'] = '1' : $input['hasVoucher'] = '0';

        // handle image
        $image = $request->file('image');
        $input['image'] = $image->getClientOriginalName();
        $image->move(public_path('product_image'),$input['image']);

        // discount
        if ($input['discount'] > 0) {
            $input['price_after_discount'] = $input['price'] - ($input['price'] * $input['discount']);
        }
        $product = Product::create($input);
        ProductGallery::create([
            'product_id' => $product->id, 
            'image' => $input['image'],
            'video' => $request->video
        ]);
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->ProductGallery; // cara nampilin data relationship kalau cuman 1 data (first).
        $product->Brand; // cara nampilin data relationship kalau cuman 1 data (first).
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // return $request->getContent();
        // return $request->all();
        $input = $request->all();
        $input['iSPreOrder'] = true ? $input['iSPreOrder'] = '1' : $input['iSPreOrder'] = '0';
        $input['hasVoucher'] = true ? $input['hasVoucher'] = '1' : $input['hasVoucher'] = '0';

        $product->update($input);
        
        $image = $request->file('image');
        $video = $request->file('video');
        if ($image || $video) {
            $input['image'] = $image->getClientOriginalName();
            $image->move(public_path('product_image'),$input['image']);
            $product_gallery = ProductGallery::where('product_id', $product->id)->first();
            $product_gallery->update([
                'image' => $input['image'],
                'video' => $video
            ]);
        }

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {   
        $product->delete();
        return "Berhasil menghapus produk";
    }
}
