<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return view('dashboard.index');
        })->name('index');
        Route::resource('mayoristas', UserController::class);
        Route::resource('mayoristas', UserController::class);
        Route::get('search-postal-code/{postalCode}', function($postalCode) {
            $postalCode = App\Models\PostalCode::find($postalCode);
            // dd($postalCode);
            return response()->json($postalCode);
        })->name('searchPostalCode');
        Route::get('search-town-by-state/{state}', function(App\Models\State $state) {
            $towns = $state->towns;
            // dd($postalCode);
            return response()->json($towns);
        })->name('searchTownByState');
        Route::get('search-colony-by-town/{state}/{town}', function($state, $town) {
            $postalCodes = App\Models\PostalCode::where('CEstado', $state)->where('CMunicipio', $town)->get('CCp');
            $neighborhoods = App\Models\Colony::whereIn('CCodigoPostal', $postalCodes)->get();
            return response()->json($neighborhoods);
        })->name('searchColonyByTown');
        Route::get('search-colony-by-postal-code/{postalCode}', function($postalCode) {
            $neighborhood = App\Models\Colony::where('CCodigoPostal', $postalCode)->first();
            return response()->json($neighborhood);
        })->name('searchColonyByPostalCode');
    });
});