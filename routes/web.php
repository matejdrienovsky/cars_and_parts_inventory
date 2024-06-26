 <?php

 use App\Http\Controllers\CarController;
 use App\Http\Controllers\PartController;
 use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout/partials/index');
});

 Route::resource('cars', CarController::class);

 Route::resource('parts', PartController::class);
