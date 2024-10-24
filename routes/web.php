<?php
// ! Incluir todos los controllers
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
USE App\Http\Controllers\CultivoController;
use Illuminate\Support\Facades\Route;
/***
 * 
 * Route::middleware('auth')->prefix('cultivo')->group(function () {
    Route::get('/', [CultivoController::class, 'show'])->name('cultivo.show');
    Route::get('/create', [CultivoController::class, 'create'])->name('cultivo.create');
    Route::post('/store', [CultivoController::class, 'store'])->name('cultivo.store');
    Route::get('/{cultivo}/edit', [CultivoController::class, 'edit'])->name('cultivo.edit');
    Route::put('/{cultivo}/update', [CultivoController::class, 'update'])->name('cultivo.update');
    Route::delete('/{cultivo}', [CultivoController::class, 'destroy'])->name('cultivo.destroy');
    Route::get('/form_gastos', [CultivoController::class, 'form_gastos'])->name('cultivo.form_gastos');
    Route::post('/addGasto', [CultivoController::class, 'addGasto'])->name('cultivo.addGasto');
    Route::post('/add', [CultivoController::class, 'add'])->name('cultivo.add');
    
    // Empleados relacionados con Cultivo
    Route::get('/form', [CultivoController::class, 'formEmploye'])->name('cultivo.formEmploye');
    Route::post('/addEmploye', [CultivoController::class, 'addEmploye'])->name('cultivo.addEmploye');
    Route::get('/showemployes', [CultivoController::class, 'showemployes'])->name('cultivo.showemployes');
    Route::get('/editemployes', [CultivoController::class, 'editemployes'])->name('cultivo.editemployes');
    Route::delete('/destroyemployes', [CultivoController::class, 'destroyemployes'])->name('cultivo.destroyemployes');
});

Route::middleware('auth')->prefix('animales')->group(function () {
    Route::get('/', [AnimalController::class, 'index'])->name('animales.index');
    Route::get('/create', [AnimalController::class, 'create'])->name('animales.create');
    Route::post('/store', [AnimalController::class, 'store'])->name('animales.store');
    Route::get('/{animal}', [AnimalController::class, 'show'])->name('animales.show');
    Route::get('/{animal}/edit', [AnimalController::class, 'edit'])->name('animales.edit');
    Route::put('/{animal}', [AnimalController::class, 'update'])->name('animales.update');
    Route::delete('/{animal}', [AnimalController::class, 'destroy'])->name('animales.destroy');
    
    // Rutas adicionales para manejo de registros médicos
    Route::get('/{animal}/registroMedico', [AnimalController::class, 'registroMedico'])->name('animales.registroMedico');
    Route::post('/{animal}/addRegistro', [AnimalController::class, 'addRegistro'])->name('animales.addRegistro');
    Route::get('/{animal}/showRegistro', [AnimalController::class, 'showRegistro'])->name('animales.showRegistro');
    
    // Rutas de venta de animales
    Route::get('/{animal}/venta', [AnimalController::class, 'venta'])->name('animales.venta');
    Route::post('/{animal}/sell', [AnimalController::class, 'sell'])->name('animales.sell');
});

 */

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

// **

// ** Routes fro management C U L T I V O S
// TODO Routes CRUD Basic
// ? Show all the crops
Route::get('cultivo/cultivos',[CultivoController::class,'showcultivos'])->name('cultivo.showcultivos');
// ? show specifi crop
Route::get('cultivo/{cultivo}',[CultivoController::class,'especifico'])->name('cultivo.especifico');
// ? Index
Route::get('cultivo/',[CultivoController::class,'showFormCrop'])->name('cultivo.showFormCrop');
// 
// ? create and store
Route::get('/cultivo/create',[CultivoController::class, 'create'])->name('cultivo.create');
Route::post('/cultivo/store',[CultivoController::class, 'store'])->name('cultivo.store');
// ? edit and update
Route::get('/cultivo/{$cultivo}/edit',[CultivoController::class, 'edit'])->name('cultivo.edit');
Route::put('/cultivo/{$cultivo}/update',[CultivoController::class],'update')->name('cultivo.update');
// ? delete 
Route::delete('/cultivo/{$cultivo}',[CultivoController::class,'destroy'])->name('cultivo.destroy');
// TODO Gastos (egresos)
Route::get('/cultivo/form_gastos',[CultivoController::class,'form_gastos'])->name('cultivo.form_gastos');
/*
We have to consider the scenario where the expense might or might not be releated
to a crop
*/
Route::post('/cultivo/addGasto');
//Enviar informaicon abono o fumigacion
Route::post('/cultivos/add',[CultivoController::class,'add'])->name('cutlivo.add');


//* For how the form for add employe
Route::get('/cultivo/form',[CultivoController::class,'formEmploye'])->name('cultivo.formEmploye');
//Save new employe
Route::post('/cultivo/addEmploye',[CultivoController::class,'addEmploye'])->name('cultivo.addEmploye');
//Show all employes
Route::get('/cultivo/showemployes',[CultivoController::class,'showemployes'])->name('cultivo.showemployes');
//Edit employes
Route::get('/cultivo/editemployes',[CultivoController::class,'editemployes'])->name('cultivo.editemployes');
//Delete employes
Route::post('/cultivo/destroyemployes',[CultivoController::class,'destroyemployes'])->name('cultivo.destroyemployes');



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
Route::post('/animales/{id}/sell',[AnimalController::class, 'sell'])->name('animales.sell');

require __DIR__.'/auth.php';
