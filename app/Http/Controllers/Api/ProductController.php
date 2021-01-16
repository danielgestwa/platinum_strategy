<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * You can recive bearer token from TokenController
     * 
     * @request
     * link: http://localhost:8000/api/products
     * method: GET
     * Content-Type: application/json
     * bearer token: 1|OZ9m369LLf9cRXTKFU62ct7Ux3jHm5uVCRzJVrt6
     * 
     * @response
     * [
     *  {
     *    "name": "FIbi Ball",
     *    "category_id": 13,
     *    "price": "1.99",
     *    "comment": null,
     *    "bought_at": "2021-01-16"
     *  }
     * ]
     * 
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user()->products()->get()->toJson(JSON_PRETTY_PRINT);
    }
}
