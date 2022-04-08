<?php

use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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
    return Inertia::render('Home', ['frameworks' => ['Laravel', 'Vue', 'Inertia']]);
});
Route::get('/about', function () {
    // sleep(2);
    return Inertia::render('About', ['time' => now()->toTimeString()]);
});
Route::get('/users', function () {
    // sleep(1);
    return Inertia::render('Users', [
        'users' => User::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(15)
            ->withQueryString()
            ->through( fn($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'can' => [
                    'edit'=> $user->can('update', $user)
                ]
            ]),

        'filters' => Request::only(['search']),
        'can' => [
            'createUser' => Auth::user() ? Auth::user()->can('create', User::class) : false
        ]
    ]);
});
Route::post('/logout', function () {
    // sleep(1);
    Auth::user()->tokens()->delete();
    Auth::logout();
    Request::session()->invalidate();
    Request::session()->regenerateToken();
    return redirect('/');
});
Route::get('/users/create', function () {
    return Inertia::render('Auth/Register')->can('create', 'App\\Models\User');
});
Route::get('/users/show', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::post('/users', function(){
    // sleep(3);
    $attributes = Request::validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed',
    ]);
    User::create($attributes);
    return redirect('/users');
});

Route::post('/users/login', function(){
    $attributes = Request::validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    if(Auth::attempt($attributes))
    {   $token = Auth::user()->createToken('token')->plainTextToken;
        Request::session()->regenerate();
        return redirect()->intended();
    };
    return back()->withErrors(['email' => 'Wrong Credentials']);
});
