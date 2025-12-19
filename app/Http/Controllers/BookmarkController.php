<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    // Fungsi untuk AJAX: Menambah atau menghapus bookmark
    public function toggle($idTempat)
{
    // Cek Guard terlebih dahulu (walaupun AJAX hanya dipicu jika sudah login)
    if (!Auth::guard('wisatawan')->check()) {
        // Ini seharusnya tidak terjadi jika View sudah benar, tapi ini adalah guard
        return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
    }
    
    // ERROR PALING UMUM: Mencoba mengakses id_wisatawan dari Auth::user()
    // SOLUSI: Akses id_wisatawan melalui relasi 'wisatawan' dari user yang terotentikasi.
    $wisatawan = Auth::user()->wisatawan;

    if (!$wisatawan) {
         // Jika user login tapi tidak punya Model Wisatawan yang terhubung
         return response()->json(['success' => false, 'message' => 'Data wisatawan tidak ditemukan.'], 400);
    }

    $wisatawanId = $wisatawan->id_wisatawan; // Menggunakan primary key dari Model Wisatawan

    // ... sisa logika toggle menggunakan $wisatawanId
    $bookmark = Bookmark::where('id_wisatawan', $wisatawanId)
                        ->where('id_tempat', $idTempat)
                        ->first();

    if ($bookmark) {
        $bookmark->delete();
        $action = 'removed';
        $message = 'Destinasi dihapus dari favorit.';
    } else {
        Bookmark::create([
            'id_wisatawan' => $wisatawanId,
            'id_tempat' => $idTempat,
        ]);
        $action = 'added';
        $message = 'Destinasi ditambahkan ke favorit.';
    }

    return response()->json([
        'success' => true,
        'action' => $action,
        'message' => $message
    ]);
}
    
    // Fungsi untuk menampilkan halaman daftar favorit
    public function index()
    {
        // Cek apakah user sudah login dan memiliki Model Wisatawan yang terkait
    if (Auth::check() && Auth::user()->wisatawan) {
        
        // Memanggil relasi bookmarks() melalui Model Wisatawan
        $bookmarks = Auth::user()->wisatawan->bookmarks() 
                            ->with(['tempatWisata' => function($query) {
                                $query->with(['paketWisatas', 'penilaians']);
                            }])
                            ->get();
                            
        return view('bookmark', compact('bookmarks'));
    }
    
    // Jika tidak ada wisatawan yang login, kembalikan array kosong atau redirect
    return view('bookmark', ['bookmarks' => collect()]);
}
}