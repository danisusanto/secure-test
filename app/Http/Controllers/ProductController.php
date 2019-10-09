<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\storeProduct;
use App\Http\Requests\UpdateProduct;
use App\ProductModel;
use GuzzleHttp\Client;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): object
    {
        $product_model = new ProductModel();
        $product = $product_model->findByUserId(session('user_id'));
        return view('product.index', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProduct $request): object
    {
        if($request->validated()) {
            $product_model = new ProductModel();
            $product_model->user_id = session('user_id');
            $product_model->title = strip_tags($request->input('title'));
            $product_model->author = strip_tags($request->input('author'));
            $product_model->description = $request->input('description');
            try {
                $client = new Client();
                $response = $client->request('POST', env('IMGUR_CLIENT_ENDPOINT'), [
                        'headers' => [
                            'authorization' => 'Client-ID ' . env('IMGUR_CLIENT_ID'),
                            'content-type' => 'application/x-www-form-urlencoded',
                        ],
                        'form_params' => [
                            'image' => base64_encode(file_get_contents($request->file('image')->path()))
                        ],
                ]);
                $data = json_decode($response->getBody()->getContents(), TRUE);
                $product_model->image = $data['data']['link'];
                $product_model->save();
                return response()->json([
                    'status'    =>  true,
                    'message'   =>  'product added successfully'
                ]);
            } catch (\Throwable $error) {
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  $error
                ]);
            }
        }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id): object
    {
        $product_model = new ProductModel();
        $product = $product_model->findByIdAndUserId($id,session('user_id'));
        if(!$product) {
            abort(404);
        }
        return view('product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, int $id): object
    {
        $product_model = ProductModel::find($id);
        $product_model->title = $request->input('title');
        $product_model->author = $request->input('author');
        $product_model->description = $request->input('description');
        try {
            if($request->file('image')) {
                $client = new Client();
                $response = $client->request('POST', env('IMGUR_CLIENT_ENDPOINT'), [
                        'headers' => [
                            'authorization' => 'Client-ID ' . env('IMGUR_CLIENT_ID'),
                            'content-type' => 'application/x-www-form-urlencoded',
                        ],
                        'form_params' => [
                            'image' => base64_encode(file_get_contents($request->file('image')->path()))
                        ],
                ]);
                $data = json_decode($response->getBody()->getContents(), TRUE);
                $product_model->image = $data['data']['link'];
            }
            $product_model->save();
            return response()->json([
                'status'    =>  true,
                'message'   =>  'product edited successfully'
            ]);
        } catch (\Throwable $error) {
            return response()->json([
                'status'    =>  false,
                'message'   =>  $error
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): object
    {
        $product_model = new ProductModel();
        $product = $product_model->deleteByIdAndUserId($id,session('user_id'));
        if($product) {
            return response()->json([
                'status'    =>  true,
                'message'   =>  'product deleted successfully'
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'product not found'
            ]);
        }
    }
}
