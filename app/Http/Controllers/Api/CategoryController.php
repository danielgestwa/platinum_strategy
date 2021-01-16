<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    /**
     * You can recive bearer token from TokenController
     * 
     * @request
     * link: http://localhost:8000/api/categories
     * method: GET
     * Content-Type: application/json
     * bearer token: 1|OZ9m369LLf9cRXTKFU62ct7Ux3jHm5uVCRzJVrt6
     * 
     * @response
     * [
     *  {
     *    "id": 1,
     *    "name": "Home"
     *  },
     *  {
     *    "id": 2,
     *    "name": "Communication"
     *  },
     *  {
     *    "id": 3,
     *    "name": "Gifts"
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
        return Auth::user()->categories()->get()->toJson(JSON_PRETTY_PRINT);
    }
}
