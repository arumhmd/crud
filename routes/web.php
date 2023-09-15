<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    //fetch all products
   // $products = DB::select("select * from products");
   $products = DB::table('products')->where('id',4)->get();
   $products = DB::table('products')->insert([
    'name'=> 'mango',
    'qty'=> 5,
    'price'=> 400,
    'description'=>'fruit'
   ]);
    //create products
   // $products = DB::insert('insert into products (name, qty, price, description) values (?, ?, ?,?)',
    // ['orange',5,600, 'Fruit']);

    //update
   // $products = DB::update("update products set price=800 where id=4");

   //delete
   //$products = DB::delete("delete from products where id=3");
  /* $products = DB::insert("insert into products (name,qty,price,description) values (?,?,?,?)",
   ['berry',10,1000,'fruit']);*/
  // $products = DB::update("update into products set nam");
    dd($products);

});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');