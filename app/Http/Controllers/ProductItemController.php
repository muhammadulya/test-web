<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductItemController extends Controller
{
    // LIST PRODUCT ITEM
    public function index(Request $request) {
        // HIT API
        $data       = null;

        if ($request->category) {
            $params = ['category' => (int) $request->category];
        } else {
            $params = [];
        }
        $url        = env('API_URL') . '/product-item';
        $request    = $this->guzzle_post_public($url, $params);

        // IF SUCCESS 
        if ($request->status) {
            $data = $request->data;
        }

        // GET PRODUCT CATEGORY
        $categories = null;
        $params     = [];
        $url        = env('API_URL') . '/product-category';
        $request    = $this->guzzle_post_public($url, $params);

        // IF SUCCESS 
        if ($request->status) {
            $categories = $request->data;
        }
        
        // RETURN VIEW 
        return view('management.product_item.index', compact('data', 'categories'));
    }

    // CREATE PRODUCT ITEM
    public function create(Request $request) {
        // GET PRODUCT CATEGORY
        $categories = null;
        $params     = [];
        $url        = env('API_URL') . '/product-category';
        $request    = $this->guzzle_post_public($url, $params);

        // IF SUCCESS 
        if ($request->status) {
            $categories = $request->data;
        }

        $data       = null;
        
        // RETURN VIEW 
        return view('management.product_item.form', compact('data', 'categories'));
    }

    // EDIT PRODUCT ITEM
    public function edit($id, Request $request) {
        // GET PRODUCT CATEGORY
        $categories = null;
        $params     = [];
        $url        = env('API_URL') . '/product-category';
        $request    = $this->guzzle_post_public($url, $params);

        // IF SUCCESS 
        if ($request->status) {
            $categories = $request->data;
        }

        // HIT API DETAIL
        $data       = null;
        $params     = ['product_id' => (int) $id];
        $url        = env('API_URL') . '/product-item/detail';
        $request    = $this->guzzle_post_public($url, $params);

        // IF SUCCESS 
        if ($request->status) {
            $data = $request->data;
        }
        
        // RETURN VIEW 
        return view('management.product_item.form', compact('data', 'categories'));
    }

    public function update(Request $request) {
        // HIT API UPDATE PRODUCT ITEM
        $params     = [
            'product_id'    => (int) $request->product_id,
            'name'          => $request->name,
            'category_id'   => $request->category,
            'description'   => $request->description,
            'images'        => $request->images,
            'colors'        => $request->colors,
            'sizes'         => $request->sizes,
            'prices'        => $request->prices,
            'status'        => (int) $request->status
        ];
        $url        = env('API_URL') . '/product-item/update';
        $request    = $this->guzzle_post_public($url, $params);

        // IF SUCCESS 
        if ($request->status) {
            return redirect()->route('management.product_item.index')->with('success', 'Berhasil mengubah data : ' . $request->data->name);
        } else {
            if ($request->message == 'Validation error') {
                return back()->with('errors', $request->data);
            }
        }

        return back()->with('error', 'Gagal mengubah data, silahkan coba lagi');
    }

    public function store(Request $request) {
        // HIT API STORE PRODUCT ITEM
        $params     = [
            'name'          => $request->name,
            'category_id'   => $request->category,
            'description'   => $request->description,
            'images'        => $request->images,
            'colors'        => $request->colors,
            'sizes'         => $request->sizes,
            'prices'        => $request->prices,
            'status'        => (int) $request->status
        ];

        $url        = env('API_URL') . '/product-item/store';
        $request    = $this->guzzle_post_public($url, $params);

        // IF SUCCESS 
        if ($request->status) {
            return redirect()->route('management.product_item.index')->with('success', 'Berhasil menambahkan data');
        } else {
            if ($request->message == 'Validation error') {
                return back()->withInput()->with('errors', $request->data);
            }
        }

        return back()->with('error', 'Gagal menambahkan data, silahkan coba lagi');
    }

    // DELETE PRODUCT ITEM
    public function delete(Request $request) {
        // HIT API DELETE PRODUCT ITEM
        $params     = ['product_id' => (int) $request->id];
        $url        = env('API_URL') . '/product-item/delete';
        $request    = $this->guzzle_post_public($url, $params);

        // IF SUCCESS 
        if ($request->status) {
            return redirect()->route('management.product_item.index')->with('success', 'Berhasil menghapus data : ' . $request->data->name);
        }

        return back()->with('error', 'Gagal menghapus data, silahkan coba lagi');
    }

    // protected function guzzle_post_public($url, $parameter, $auth = null)
    public function guzzle_post_public($url, $parameter, $auth = null)
    {
        if ($auth) {
            $config['auth'] = $auth;
        }
        
        $config['verify']   = false;
        $client             = new Client($config);
        $request            = $client->request('POST', $url, ['form_params' => $parameter]);
        $response           = $request->getBody()->getContents();

        return json_decode($response);
    }

    public function guzzle_post_multipart_public($url, $parameter, $auth = null)
    {
        $config             = ['http_errors' => false];
        $config['verify']   = false;

        $client     = new Client($config);
        $request    = $client->request('POST', $url, ['multipart' => $parameter]);
        $response   = $request->getBody()->getContents();

        return json_decode($response);
    }
}