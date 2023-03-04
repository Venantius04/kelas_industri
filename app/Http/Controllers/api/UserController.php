<?php

namespace App\Http\Controller\api;

use App\Http\Controllers\Controller;
use App\Traits\ResponseApi;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    use ResponseApi;
    public function create(Request $request)
    {
        return $this->requestSuccess('oke');
    }
}

