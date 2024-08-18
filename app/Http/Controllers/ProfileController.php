<?php


namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function profil()
    {
        $berita = Berita::orderBy('created_at', 'desc')->get();
        $abo = About::find(1);
        $beritaa = Kategori::where('id_menu', '=', 'Berita')->get();
        $gallery = Kategori::where('id_menu', '=', 'Gallery')->get();
        $about = Kategori::where('id_menu', '=', 'About')->get();
        return view('welcome', ['berita' => $berita, 'beritaa' => $beritaa, 'menugallery' => $gallery, 'about' => $about, 'abo' => $abo]);
    }

    public function berita($berita)
    {
        $beritas = Berita::where('nama_kategori', '=', $berita)->get();
        $abo = About::find(1);
        $beritaa = Kategori::where('id_menu', '=', 'Berita')->get();
        $menugallery = Kategori::where('id_menu', '=', 'Gallery')->get();
        $about = Kategori::where('id_menu', '=', 'About')->get();
        return view('berita',['beritaProfile' => $beritas,'beritaa' => $beritaa, 'menugallery' => $menugallery, 'about' => $about, 'abo' => $abo]);
    }
    public function berita_detail(Berita $berita)
    {
        $abo = About::find(1);
        $beritaa = Kategori::where('id_menu', '=', 'Berita')->get();
        $menugallery = Kategori::where('id_menu', '=', 'Gallery')->get();
        $about = Kategori::where('id_menu', '=', 'About')->get();
        return view('berita_detail',['berita' => $berita, 'beritaa' => $beritaa, 'menugallery' => $menugallery, 'about' => $about, 'abo' => $abo]);
    }

    public function gallery($gallery)
    {
        $abo = About::find(1);
        $gallerys = Gallery::where('nama_kategori', '=', $gallery)->get();
        $beritaa = Kategori::where('id_menu', '=', 'Berita')->get();
        $menugallery = Kategori::where('id_menu', '=', 'Gallery')->get();
        $about = Kategori::where('id_menu', '=', 'About')->get();
        //dump($gallery);
        return view('gallery',['galleryProfile' => $gallerys,'beritaa' => $beritaa, 'menugallery' => $menugallery, 'about' => $about, 'abo' => $abo]);
    }
    public function gallery_detail(Gallery $gallery)
    {
        $abo = About::find(1);
        $beritaa = Kategori::where('id_menu', '=', 'Berita')->get();
        $menugallery = Kategori::where('id_menu', '=', 'Gallery')->get();
        $about = Kategori::where('id_menu', '=', 'About')->get();
        return view('gallery_detail',['gallery' => $gallery, 'beritaa' => $beritaa, 'menugallery' => $menugallery, 'about' => $about, 'abo' => $abo]);
    }

    public function about()
    {
        $abouts = About::find(1);
        $abo = About::find(1);
        $beritaa = Kategori::where('id_menu', '=', 'Berita')->get();
        $menugallery = Kategori::where('id_menu', '=', 'Gallery')->get();
        $about = Kategori::where('id_menu', '=', 'About')->get();
        return view('about',['aboutProfile' => $abouts,'beritaa' => $beritaa, 'menugallery' => $menugallery, 'about' => $about, 'abo' => $abo]);
    }

    public function search()
    {
        $data = $_GET['search'];
        $search = DB::select("SELECT * from (SELECT id, judul, gambar, isi, nama_kategori, created_at, updated_at FROM beritas UNION SELECT id, judul, gambar, isi, nama_kategori, created_at, updated_at FROM galleries) as hasil where hasil.judul like '%".$data."%' order by created_at desc;
        ");
        $abo = About::find(1);
        $beritaa = Kategori::where('id_menu', '=', 'Berita')->get();
        $menugallery = Kategori::where('id_menu', '=', 'Gallery')->get();
        $about = Kategori::where('id_menu', '=', 'About')->get();
        return view('search', ['search' => $search,'beritaa' => $beritaa, 'menugallery' => $menugallery, 'about' => $about, 'abo' => $abo]);
    }
}
