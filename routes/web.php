<?php

use App\Http\Controllers\Dashborad\AdminController;
use App\Http\Controllers\Dashborad\AttendanceController;
use App\Http\Controllers\Dashborad\ChildParentController;
use App\Http\Controllers\Dashborad\ClassroomController;
use App\Http\Controllers\Dashborad\DiscountController;
use App\Http\Controllers\Dashborad\FeeController;
use App\Http\Controllers\Dashborad\GradeController;
use App\Http\Controllers\Dashborad\InvoiceController;
use App\Http\Controllers\Dashborad\PaymentController;
use App\Http\Controllers\Dashborad\ProcessFeeController;
use App\Http\Controllers\Dashborad\PromotionController;
use App\Http\Controllers\Dashborad\ReceiptStudentController;
use App\Http\Controllers\Dashborad\SectionController;
use App\Http\Controllers\Dashborad\StudentController;
use App\Http\Controllers\Dashborad\TeacherController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Livewire\AddParent;
use App\Models\ChildParent;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Livewire\Livewire;


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
    return to_route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('homex' , [DashboradController::class , 'index'])->name('home');

// Route::get('dashboard' , [DashboradController::class , 'index'])->name('dash');
// [
//     'prefix' => LaravelLocalization::setLocale(),
//     'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
// ],
Route::prefix(LaravelLocalization::setLocale())->middleware('localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'admin.status', 'verified')->group(function () {
    Route::prefix('dashboard/')->group(function () {
        Route::get('home', [DashboradController::class, 'index'])->name('home');
        Route::resource('grades', GradeController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('classrooms', ClassroomController::class);
        Route::resource('sections', SectionController::class);
        Route::get('/classes/{id}', [SectionController::class, 'getclasses']);
        Route::resource('parents', ChildParentController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('students', StudentController::class);
        Route::get('graduation/create', [StudentController::class, 'CreateGraduation'])->name('create-graduation');
        Route::post('graduation', [StudentController::class, 'StoreGraduation'])->name('graduation');
        Route::get('students-trash', [StudentController::class, 'trash'])->name('students.trash');
        Route::get('students-restore/{id}', [StudentController::class, 'restore'])->name('students.restore');
        // Route::get('product-restore-all', [ProductController::class, 'restoreAll'])->name('products.restore-all');
        Route::delete('students-force-delete/{id}', [StudentController::class, 'forceDelete'])->name('students.force-delete');
        Route::get('/getsection/{id}', [SectionController::class, 'getsection']);
        Route::get('promotions', [PromotionController::class, 'index'])->name('promotions.index');
        Route::get('promotions/create', [PromotionController::class, 'create'])->name('promotions.create');
        Route::post('promotions', [PromotionController::class, 'store'])->name('promotions.store');
        Route::delete('promotions', [PromotionController::class, 'undo'])->name('promotions.undo');
        Route::resource('fees', FeeController::class);
        Route::resource('invoices', InvoiceController::class)->except('create' , 'edit' , 'update');
        Route::get('invoice/create/{id}', [InvoiceController::class, 'CreateInvoice'])->name('invoice.create_invoice');
        Route::resource('receipts', ReceiptStudentController::class)->except('create' , 'edit' , 'update');
        Route::resource('processes', ProcessFeeController::class)->except('create' , 'edit' , 'update');
        Route::resource('payments', PaymentController::class)->except('create' , 'edit' , 'update');
        Route::resource('attendances', AttendanceController::class);
        Route::get('show-students/{id}' , [AttendanceController::class , 'index_student'])->name('show-student');
        // Route::resource('discounts', DiscountController::class);
        // Route::view('create-parent' , 'livewire.show_form')->name('parent.create');
    });
});

// Route::get('test' , function(){
//     return view('temp');
// });

Route::get('login', [LoginController::class, 'login'])->name('login');





require __DIR__ . '/auth.php';
