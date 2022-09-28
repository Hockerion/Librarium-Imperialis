<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\GamitController;
use App\Http\Controllers\UnviaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SignUpCOntroller;
use App\Http\Controllers\MainController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    Debugbar::info('INFO!');/*debugbar message warning*/
    Debugbar::error('INFO!');
    Debugbar::warning('INFO!');
    Debugbar::addMessage('INFO!');
    Debugbar::startMeasure('Woohoo!', 'Rendering our first message!'); /*timeline*/
    try{                  /*exception*/
        throw new Exception('Try MEssage!');
    }catch(Exception $e){
        Debugbar::addException($e);
    }
    $name = "COde with Hanz";
    return view('welcome', [
        'name' => $name
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Book', [BookController::class, 'index']);

Route::get('/SignIn', [SignUpCOntroller::class, 'index']);
Route::get('/Main', [MainController::class, 'index']);
Route::get('/libro', [LibroController::class, 'index']);    


//Route::resource('/Book', [BookController::class, 'Book']);    
//Route::get('/Book', [BookController::class, 'Book']);
//Route::delete('/Book', [BookController::class, 'destroy']);
//Route::get('/Book'. [BookController::class, 'edit']);
//Route::patch('/Book'. [BookController::class, 'update']);
//Route::post('/Book', [BookController::Class, 'store']);
//Route::get('/Book', [BookController::class, 'show']);
//});

//Route::get('/gamit', [GamitController::class, 'index']);   

//Route::resource('gamit,', GamitController::class);

/*Route::get('/', function (){
   // dd(config ('services.mailgun.domain'));
   //dd(env('DB_HOST'));
    return view('welcome');
});*/

//route for invoke method

//Route::get('/', UnviaController::class);

/*
    GET       - Request a resource
    POST      - Create a new resource
    PUT       - Update a resource
    PATCH     - Modify a resource
    DELETE    - Delete a resource
    OPTIONS   - Ask the server which verbs are allowed

*/ 

//GET
//Route::get('/gamit', [GamitController::class, 'index']); 
//Route::get('/gamit/1', [GamitController::class, 'inshowdex']); 
//Route::get('/gamit/{id}', [GamitController::class, 'show']);    //Routes with Parameters
//Route::get('/article/{id?}', [GamitController::class, 'show']);    //Routes with Parameters (optional)
//Route::get('/gamit/{id}', [GamitController::class, 'show'])->where('id', '[0-9]+');    //Routes with Expressions
//Route::get('/gamit/{id}', [GamitController::class, 'show'])->whereNumber('id'); 
//Route::get('/gamit/{name}', [GamitController::class, 'show'])->where('name', '[A-Za-z]+');    //Routes with Parameters (optional)
//Route::get('/gamit/{name}', [GamitController::class, 'show'])->whereAlpha('name');
//Route::get('/gamit/{id}/{name}', [GamitController::class, 'show'])->where(['id' => '[0-9]+', 'name' => '[A-Zz-a]+']);
//Route::get('/gamit/{id}/{name}', [GamitController::class, 'show'])->whereNumber('id')->whereAlpha('name');


//POST  
//Route::get('/gamit/create', [GamitController::class, 'create']); 
//Route::post('/gamit', [GamitController::class, 'store']); 
//Route::post('/gamit', [GamitController::class, 'store']);       //Routes with Parameters

//PUT OR PATCH      
//Route::get('/gamit/edit/1', [GamitController::class, 'edit']); 
//Route::patch('/gamit/1', [GamitController::class, 'update']); 
//Route::get('/gamit/edit/{id}', [GamitController::class, 'edit']);      //Routes with Parameters
//Route::patch('/gamit/{id}', [GamitController::class, 'update']);      //Routes with Parameters

//DELETE
//Route::delete('/gamit/1', [GamitController::class, 'destroy']);
//Route::delete('/gamit/{id}', [GamitController::class, 'destroy']);     //Routes with Parameters

//MULTIPLE HTTP Verbs
//Route::match(['GET', 'POST'], '/gamit', [GamitController::class,'index']); 
//Route::any('/gamit', [GamitController::class, 'index']);

//Return View
//Route::view('/gamit', 'gamit.index', ['name' => 'Code with HAnz']);