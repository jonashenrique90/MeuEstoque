<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use PDF;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $products = Product::where('user_id', $user->id)->orderBy('name')->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();

        return view('products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($this->validateRequest());

        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($this->validateRequest());
        return redirect('products/'. $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('products');
    }

    private function validateRequest()
    {
      $user = Auth::user();
      // dd($user->id);
      return request()->validate([
        'name' => 'required|min:3',
        'quantity'=> 'required|numeric',
        'description' =>  'required',
        'user_id' => 'required'
      ]);
    }

    public function print()
    {
   // This  $data array will be passed to our PDF blade
    $user = Auth::user();

    $data = [
      'user' =>$user,
      'products' => $products = Product::where('user_id', $user->id)->orderBy('name')->get(),
      'date' => $date = date('d/m/y'),
      'hour' => $hour = date('H:i'),
      'title' => 'Lista de Produtos',
      'heading' => 'MEU ESTOQUE',
    ];

    $pdf = PDF::loadView('pdf.products_pdf', $data)->setPaper('a4', 'portrait');
    return $pdf->stream('Produtos.pdf');

    }

}
