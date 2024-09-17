<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost;

class ConfigController extends Controller
{
    public function menu() {
        $categories = CategoryPost::all();

        return response()->json($categories);
    }
}
