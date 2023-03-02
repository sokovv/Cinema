
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/', function () {
//    return view('welcome');
//});



Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
