<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      $count = Product::where('user_id', $user->id)->count();

      // dd($count);
      return view('dashboard', compact('count'));
    }
}
