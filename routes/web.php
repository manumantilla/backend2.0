<?php
// ! Incluir todos los controllers
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
USE App\Http\Controllers\CultivoController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\AnalisisController;
use Illuminate\Support\Facades\Route;
Route::resource('envios',EnvioController::class);
Route::get('/trabajo/{trabajo}/empleados', [CultivoController::class, 'mostrarTrabajadores'])->name('trabajo.empleados');

Route::get('/animales/vender', function(){
    return view('animales.vende');
});
Route::get('/cultivo/gasto', function(){
    return view('cultivo.gasto');
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
// TODO Routes CRUD 

Route::get('/cultivo/create',[CultivoController::class, 'showFormCrop'])->name('cultivo.create');
// ? Show all the crops
Route::get('/cultivo/trabajos',[CultivoController::class, 'trabajos'])->name('cultivo.trabajos');
Route::get('/cultivo/{trabajo}/addtrabajador',[CultivoController::class,'addtrabajador'])->name('cultivo.addtrabajador');
Route::post('/cultivo/relacionar',[CultivoController::class,'relacionar'])->name('cultivo.relacionar');





Route::get('cultivo/gastos/',[CultivoController::class,'form_gastos'])->name('cultivo.form_gastos');
Route::get('cultivo/cultivos',[CultivoController::class,'showcultivos'])->name('cultivo.showcultivos');
// ? show specifi crop
Route::get('cultivo/{cultivo}',[CultivoController::class,'especifico'])->name('cultivo.especifico');
// ? Index
Route::get('cultivo/',[CultivoController::class,'showFormCrop'])->name('cultivo.showFormCrop');
// 
// ? create and store
Route::post('/cultivo/store',[CultivoController::class, 'store'])->name('cultivo.store');
// ? edit and update
Route::get('/cultivo/{$cultivo}/edit',[CultivoController::class, 'edit'])->name('cultivo.edit');
Route::put('/cultivo/{$cultivo}/update',[CultivoController::class],'update')->name('cultivo.update');
// ? delete 
Route::delete('/cultivo/{$cultivo}',[CultivoController::class,'destroy'])->name('cultivo.destroy');
// TODO Gastos (egresos)
//
/*
We have to consider the scenario where the expense might or might not be releated
to a crop
*/
//Calcular ganancia y gastos
Route::get('/envios/ganancia/{cultivoId}',[AnalisisController::class, 'index'])->name('envios.ganancia');

//Enviar informaicon Gasto
Route::post('/cultivos/add',[CultivoController::class,'addGasto'])->name('cultivo.addGasto');
Route::get('/cultivos/form',[CultivoController::class,'form_gastos'])->name('cultivo.gasto');
//Mostrar gastos
Route::get('/cultivo/{cultivo}/listgastos',[CultivoController::class,'gastoSpecific'])->name('cultivo.gastoSpecific');
//Mostrar ganancias
Route::get('/cultivo/{cultivo}/ganancias',[AnalisisController::class,'index'])->name('cultivo.ganancias');

//Guardar un nueo trabajo
Route::get('/cultivo/{cultivo}/trabajo',[CultivoController::class,'trabajo'])->name('cultivo.trabajo');
Route::post('/cultivo/{cultivo}/addfinal',[CultivoController::class,'addTrabajo'])->name('cultivo.addTrabajo');


//Relacionar trabajador



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
Route::prefix('animales')->group(function () {
    // Rutas que requieren autenticación
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [AnimalController::class, 'index'])->name('animales.index'); // Mostrar todos los animales
        Route::get('/create', [AnimalController::class, 'create'])->name('animales.create'); // Mostrar el formulario para crear un nuevo animal
        Route::post('/store', [AnimalController::class, 'store'])->name('animales.store'); // Almacenar un nuevo animal
        Route::get('/{animal}/edit', [AnimalController::class, 'edit'])->name('animales.edit'); // Mostrar el formulario para editar un animal
        Route::put('/{animal}', [AnimalController::class, 'update'])->name('animales.update'); // Actualizar un animal
        Route::delete('/{animal}', [AnimalController::class, 'destroy'])->name('animales.destroy'); // Eliminar un animal
        Route::get('/{animal}/registroMedico', [AnimalController::class, 'registroMedico'])->name('animales.registroMedico'); // Registro médico
        Route::post('/{animal}/addRegistro', [AnimalController::class, 'addRegistro'])->name('animales.addRegistro'); // Agregar registro médico
        Route::get('/{animal}/showRegistro', [AnimalController::class, 'showRegistro'])->name('animales.showRegistro'); // Mostrar registro médico
        Route::get('/{animal}/venta', [AnimalController::class, 'venta'])->name('animales.venta'); // Ruta para la venta de un animal
        Route::post('/{id}/sell', [AnimalController::class, 'sell'])->name('animales.sell'); // Formulario para vender un animal
    });

    // Rutas que no requieren autenticación
    Route::get('/analysis', [AnimalController::class, 'analysis']); // Análisis de animales
    Route::get('/{animal}', [AnimalController::class, 'show'])->name('animales.show'); // Mostrar un animal específico
});
//analysys
require __DIR__.'/auth.php';
