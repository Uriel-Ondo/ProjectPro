<?php
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\StatutController;
use App\Http\Controllers\TacheController;
use Illuminate\Support\Facades\Route;

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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
route::get('/welcome', [ProjetController::class,'index'])->name('welcome');
Route::get('/create', [ProjetController::class, 'create'])->name('create');
Route::post('/create', [ProjetController::class, 'store'])->name('ajouter');
Route::delete('/projet/{projet}', [ProjetController::class, 'delete'])->name('delete');
route::get('/projet/{projet}', [ProjetController::class,'edite'])->name('editer');
Route::put('/projet/{projet}', [ProjetController::class, 'update'])->name('update');


route::get('/', [TacheController::class,'index2'])->name('voir');

route::get('/tache', [TacheController::class,'create2'])->name('new');

route::post('/add', [TacheController::class,'store2'])->name('add');
Route::delete('/tache/{tache}', [TacheController::class, 'delete2'])->name('deleted');
route::get('/edit/{tache}', [TacheController::class,'edit2'])->name('edit');
Route::put('/edit/{tache}', [TacheController::class, 'update2'])->name('updated');

});
