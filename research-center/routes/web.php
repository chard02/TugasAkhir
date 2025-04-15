<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PublicationController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Researchers\ResearcherController;
use App\Http\Controllers\Buyer\BuyerController;
use Illuminate\Http\Request;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\Buyer\CartController;
use App\Http\Controllers\Buyer\DatasetController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AdminResearcherController;
use App\Http\Controllers\API\PublicationSyncController;
use App\Http\Controllers\Researchers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\PublicationController as AdminPublication;
use App\Http\Controllers\Admin\StructureController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\VisiMisiController;


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
    return view('welcome');
});


// Route untuk menampilkan halaman tanpa login
Route::post('/register', [BuyerController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/about/sejarah', [AboutController::class, 'sejarah'])->name('sejarah');
Route::get('/about/visimisi', [AboutController::class, 'visimisi'])->name('visimisi');
Route::get('/about/organisasi', [AboutController::class, 'organisasi'])->name('organisasi');
Route::get('/contact', [ContactController::class, 'contactForm'])->name('contact');


// Route untuk menampilkan halaman yang memerlukan login
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
});




// New route for fetching publications

Route::get('/publications', [PublicationController::class, 'fetchPublications'])->name('publications.index');
Route::get('/publications/search', [PublicationController::class, 'searchByTitle'])->name('publications.search');


Route::get('/login', [WebAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [WebAuthController::class, 'login'])->name('login.post');
Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

Route::get('/profile', [WebAuthController::class, 'showProfile'])->name('profile')->middleware('auth');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});



// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    // Resource route utk manajemen peneliti
    Route::get('/researchers', [AdminResearcherController::class, 'index'])->name('admin.researchers.index');
    Route::get('/researchers/create', [AdminResearcherController::class, 'create'])->name('admin.researchers.create');
    Route::post('/researchers', [AdminResearcherController::class, 'store'])->name('admin.researchers.store');
    Route::get('/researchers/{id}', [AdminResearcherController::class, 'show'])->name('admin.researchers.show');
    Route::delete('/researchers/{id}', [AdminResearcherController::class, 'destroy'])->name('admin.researchers.destroy');
    Route::post('/researchers/{id}/approve', [AdminResearcherController::class, 'approve'])->name('admin.researchers.approve');
    Route::get('/researchers/{id}/edit', [AdminResearcherController::class, 'edit'])->name('admin.researchers.edit');
    Route::put('/researchers/{id}', [AdminResearcherController::class, 'update'])->name('admin.researchers.update');

    // Optional: halaman permintaan approve
    Route::get('/researcher-requests', [AdminResearcherController::class, 'requests'])->name('admin.researchers.requests');
});

Route::prefix('admin/publications')->name('admin.publications.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminPublication::class, 'index'])->name('index');
    Route::get('/{id}', [AdminPublication::class, 'show'])->name('show');
    Route::post('/{id}/approve', [AdminPublication::class, 'approve'])->name('approve');
    Route::post('/{id}/reject', [AdminPublication::class, 'reject'])->name('reject');
});

// Structure_Organization routes
Route::prefix('admin/structure')->name('admin.organization.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [OrganizationController::class, 'index'])->name('index');
    Route::get('/create', [OrganizationController::class, 'create'])->name('create');
    Route::post('/', [OrganizationController::class, 'store'])->name('store');
    Route::get('/{id}', [OrganizationController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [OrganizationController::class, 'edit'])->name('edit');
    Route::put('/{id}', [OrganizationController::class, 'update'])->name('update');
    Route::delete('/{id}', [OrganizationController::class, 'destroy'])->name('destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('history', \App\Http\Controllers\Admin\HistoryController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/visimisi', [VisiMisiController::class, 'index'])->name('visimisi.index');
    Route::get('/visimisi/create', [VisiMisiController::class, 'create'])->name('visimisi.create');
    Route::post('/visimisi', [VisiMisiController::class, 'store'])->name('visimisi.store');
    Route::post('/visimisi/upsert', [VisiMisiController::class, 'upsert'])->name('visimisi.upsert');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['create', 'store']);
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('roles', RoleController::class)->except(['create', 'store']);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/help', [HelpController::class, 'index'])->name('help');
});

// Route untuk mengelola researchers
Route::middleware(['auth', 'role:researcher'])->group(function () {
    Route::get('/researcher/dashboard', [DashboardController::class, 'index'])->name('researchers.dashboard');


    Route::get('/researcher/profile', [ResearcherController::class, 'showProfile'])->name('researchers.profile');
    Route::get ('researcher/profile/update', [ResearcherController::class, 'editProfile'])->name('researchers.editprofile');
    Route::put ('researcher/profile/update', [ResearcherController::class, 'updateProfile'])->name('researcher.profile.update');


    Route::get('/researcher/publications', [PublicationController::class, 'Publications'])->name('researchers.publications');
    Route::post('/researcher/publications/sync', [PublicationSyncController::class, 'sync'])->name('publications.sync');


    Route::get('projects/{project}/collaborators', [ProjectCollaboratorController::class, 'index'])->name('projects.collaborators.index');
    Route::post('projects/{project}/collaborators', [ProjectCollaboratorController::class, 'store'])->name('projects.collaborators.store');
    Route::post('collaborators/{id}/approve', [ProjectCollaboratorController::class, 'approve'])->name('projects.collaborators.approve');
    Route::post('collaborators/{id}/reject', [ProjectCollaboratorController::class, 'reject'])->name('projects.collaborators.reject');
    Route::delete('collaborators/{id}', [ProjectCollaboratorController::class, 'destroy'])->name('projects.collaborators.destroy');
});



// Buyer routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('Buyer.cart');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('Buyer.checkout');

    
    Route::get('/dataset', [DatasetController::class, 'index'])->name('buyer.dataset');
    Route::get('/dataset/{id}', [DatasetController::class, 'show'])->name('dataset.show');
    Route::post('/dataset', [DatasetController::class, 'store'])->name('dataset.store');
    Route::put('/dataset/{id}', [DatasetController::class, 'update'])->name('dataset.update');
    Route::delete('/dataset/{id}', [DatasetController::class, 'destroy'])->name('dataset.destroy');
});



Route::get('/tes-config', function () {
    return config('services.scopus.key');
});

