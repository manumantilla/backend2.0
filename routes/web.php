<?php
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/animales/vender', function(){
    return view('animales.vende');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ** Routes fro management C U L T I V O S
// TODO Routes CRUD Basic
// ? create and store
Route::get('/cultivo/create',[CultivoController::class, 'create'])->name('cultivo.create');
Route::post('/cultivo/store',[CultivoController::class, 'store'])->name('cultivo.store');
// ? edit and update
Route::get('/cultivo/{$cultivo}/edit',[CultivoController::class, 'edit'])->name('cultivo.edit');
Route::put('/cultivo/{$cultivo}/update',[CultivoController::class],'update')->name('cultivo.update');
// ? delete 
Route::delete('/cultivo/{$cultivo}',[CultivoController::class,'destroy'])->name('cultivo.destroy');
// TODO Gastos (egresos)
Route::get('/cultivo/Form_gastos',[CultivoController::class,'form_gastos'])->name('cultivo.form_gastos');
/*
We have to consider the scenario where the expense might or might not be releated
to a crop
*/
Route::post('/cultivo/addGasto');

// ** Foutes for managemente A N I M A L E S
Route::get('/animales/create', [AnimalController:: class, 'create'])->name('animales.create');
Route::post('/animales/store', [AnimalController::class, 'store'])->name('animales.store')->middleware(['auth']);
//Ruta para mostrar todos los animales donde se tiene que estar autenteticado
Route::get('/animales',[AnimalController::class,'index'])->name('animales.index')->middleware(['auth']);
//Route for show the form for create a new animal
Route::get('/animales/create',[AnimalController::class, 'create'])->name('animales.create');
//route for store a new animal
Route::post('/animales', [AnimalController::class, 'store'])->name('animales.store');
//Route for show a scpecifif animal
Route::get('/animales/{animal}', [AnimalController::class, 'show'])->name('animales.show');
//Route for show the edit form 
Route::get('/animales/{animal}/edit', [AnimalController::class, 'edit'])->name('animales.edit');
//Ruta para actualiar un animal
Route::put('/animales/{animal}',[AnimalController::class, 'update'])->name('animales.update');
//For delete
Route::delete('/animales/{animal}',[AnimalController::class, 'destroy'])->name('animales.destroy');
//Registro medico formulario de un animal
Route::get('/animales/{animal}/registroMedico',[AnimalController::class, 'registroMedico'])->name('animales.registroMedico');
//Route for agregar el registro medico a la bd
Route::post('/animales/{animal}/addRegistro', [AnimalController::class, 'addRegistro'])->name('animales.addRegistro');
//route for sho a specifif register
Route::get('/animales/{animal}/showRegistro',[AnimalController::class, 'showRegistro'])->name('animales.showRegistro');

// Ruta para la venta de un animal (aún no implementada en el controlador)
Route::get('/animales/{animal}/venta', [AnimalController::class, 'venta'])->name('animales.venta');
//Route for the form for sell one animal
Route::post('/animales/{$animal}/sell',[AnimalController:: class, 'sell'])->name('animales.sell');

require __DIR__.'/auth.php';
