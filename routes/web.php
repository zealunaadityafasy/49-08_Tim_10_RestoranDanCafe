
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Controllers\AuthController;

// LOGIN DAN REGISTER
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);

});

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// HALAMAN YANG WAJIB LOGIN
Route::middleware('auth')->group(function () {

    // HALAMAN DASHBOARD
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // HALAMAN SUPPLIER
    Route::get('/supplier', function (Request $request) {

        $keyword = $request->query('keyword', '');

        $suppliers = Supplier::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('nama_supplier', 'like', "%{$keyword}%")
                      ->orWhere('jenis_pasokan', 'like', "%{$keyword}%")
                      ->orWhere('alamat', 'like', "%{$keyword}%");
                });
            })
            ->orderByDesc('id')
            ->get();

        return view('supplier', compact('suppliers', 'keyword'));
    });

    // TAMBAH SUPPLIER
    Route::get('/tambah', function () {
        return view('tambah');
    });

    Route::post('/tambah', function (Request $request) {

        $data = $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'jenis_pasokan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:30',
        ]);

        Supplier::create($data);

        return redirect('/supplier')
            ->with('pesan', 'Data supplier berhasil ditambahkan!');
    });

    // EDIT SUPPLIER
    Route::get('/edit/{id}', function ($id) {

        $supplier = Supplier::findOrFail($id);

        return view('edit', compact('supplier'));
    });

    Route::put('/edit/{id}', function (Request $request, $id) {

        $supplier = Supplier::findOrFail($id);

        $data = $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'jenis_pasokan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:30',
        ]);

        $supplier->update($data);

        return redirect('/supplier')
            ->with('pesan', 'Data supplier berhasil diubah!');
    });

    // HAPUS SUPPLIER
    Route::delete('/hapus/{id}', function ($id) {

        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect('/supplier')
            ->with('pesan', 'Data supplier berhasil dihapus!');
    });

});
