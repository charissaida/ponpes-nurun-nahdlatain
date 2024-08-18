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
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profil()
    {
        return view('admin.admin_home');
    }
    public function home()
    {
        return view('admin.admin_home');
    }

    //Kategori
    public function kategori()
    {
        $kategori = Kategori::all();
        return view('admin.admin_kategori',['kategori' => $kategori]);
    }
    public function store_kategori(Request $request)
    {
        $validateData = $request->validate([

            'nama_kategori'         => 'required',
            'id_menu'         => 'required',
            ]);

            $kategori = new Kategori();
            $kategori->nama_kategori = $validateData['nama_kategori'];
            $kategori->id_menu = $validateData['id_menu'];
            $kategori->save();

            return redirect()->route('kategori')->with('pesan',"Penambahan data {$validateData['nama_kategori']} berhasil");
    }
    public function edit_kategori(Kategori $kategori)
    {
        return view('admin.kategori_edit',['kategori' => $kategori]);
    }
    public function update_kategori(Request $request, Kategori $kategori)
    {
        $validateData = $request->validate([
            'nama_kategori'         => 'required',
            'id_menu'         => 'required',
            ]);

            Kategori::where('id',$kategori->id)->update($validateData);
            return redirect()->route('kategori')->with('pesan',"Update data {$validateData['nama_kategori']} berhasil");
    }
    public function destroy_kategori(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori')->with('pesan',"Hapus data $kategori->nama_kategori berhasil");
    }

    //user
    public function user()
    {
        $user = User::all();
        return view('admin.admin_user',['user' => $user]);
    }
    public function store_user(Request $request)
    {
        $validateData = $request->validate([

            'name'         => 'required', 'string', 'max:255',
            'email'        => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password'     => 'required', 'string', 'min:8', 'confirmed',
            ]);

            $user = new User();
            $user->name = $validateData['name'];
            $user->email = $validateData['email'];
            $user->password = Hash::make($validateData['password']);
            $user->save();

            return redirect()->route('user')->with('pesan',"Penambahan data {$validateData['name']} berhasil");
    }
    public function edit_user(User $user)
    {
        return view('admin.user_edit',['user' => $user]);
    }
    public function update_user(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name'         => 'required', 'string', 'max:255',
            'email'        => 'required', 'string', 'email', 'max:255', 'unique:users',
            ]);

            User::where('id',$user->id)->update($validateData);
            return redirect()->route('user')->with('pesan',"Update data {$validateData['name']} berhasil");
    }
    public function destroy_user(User $user)
    {
        $user->delete();
        return redirect()->route('user')->with('pesan',"Hapus data $user->name berhasil");
    }

    //berita
    public function berita()
    {
        $berita = Berita::all();
        $kategori = Kategori::where('id_menu', '=', 'Berita')->get();
        return view('admin.admin_berita',['berita' => $berita], ['kategori' => $kategori]);
    }
    public function tambah_berita()
    {
        $kategori = Kategori::where('id_menu', '=', 'Berita')->get();
        return view('admin.berita_tambah', ['kategori' => $kategori]);
    }
    public function store_berita(Request $request)
    {
        $validateData = $request->validate([

            'judul'         => 'required', 'string', 'max:255',
            'gambar'        => 'required|file|image|max:1024|mimes:jpeg,bmp,png',
            'isi'           => 'required',
            'nama_kategori'   => 'required',
            ]);
            $extFile = $request->gambar->getClientOriginalExtension();
            $namFile = 'berita-'.time().rand(100,999).".".$extFile;
            $path = $request->gambar->move('image',$namFile);
            if(extension_loaded("gd")||extension_loaded("gd2")){
                $newImage = Image::make($path)->crop(1000,500); // panjang, lebar
                $newImage->save($path, 90);
            }
            $berita = new Berita();
            $berita->judul = $validateData['judul'];
            $berita->gambar = $path;
            $berita->isi = $validateData['isi'];
            $berita->nama_kategori = $validateData['nama_kategori'];
            $berita->save();

            return redirect()->route('berita')->with('pesan',"Penambahan berita {$validateData['judul']} berhasil");
    }
    public function edit_berita(Berita $berita)
    {
        $kategori = Kategori::where('id_menu', '=', 'Berita')->get();
        return view('admin.berita_edit',['berita' => $berita], ['kategori' => $kategori]);
    }
    public function update_berita(Request $request, Berita $berita)
    {
        $validateData = $request->validate([
            'judul'         => 'required', 'string', 'max:255',
            'gambar'        => 'required|file|image|max:1024|mimes:jpeg,bmp,png',
            'isi'           => 'required',
            'nama_kategori'   => 'required',
        ]);

            $berita = Berita::find($berita->id);
            $berita->judul = $validateData['judul'];
            $berita->isi = $validateData['isi'];
            $berita->nama_kategori = $validateData['nama_kategori'];

            if($request->hasFile('gambar')){
                $oldImagePath = 'image/'.$berita->gambar;
                if(File::exists($oldImagePath)){
                    File::delete($oldImagePath);
                }
                    $namFile = $berita->gambar;
                    $newImagePath = $validateData['gambar']->move('image',$namFile);
                    if(extension_loaded("gd")||extension_loaded("gd2")){
                        $newImage = Image::make($newImagePath)->crop(1000,500); // panjang, lebar
                        $newImage->save($newImagePath, 90);
                    }

                $berita->gambar = $newImagePath;
            }

            $berita->save();

            return redirect()->route('berita')->with('pesan',"Update data {$validateData['judul']} berhasil");
    }
    public function destroy_berita(Berita $berita)
    {
        $berita = Berita::find($berita->id);
        $oldImagePath = $berita->gambar;
            if(File::exists($oldImagePath)){
                File::delete($oldImagePath);
        }
        $berita->delete();
        return redirect()->route('berita')->with('pesan',"Hapus data $berita->judul berhasil");
    }

    //gallery
    public function gallery()
    {
        $gallery = Gallery::all();
        $kategori = Kategori::where('id_menu', '=', 'Gallery')->get();
        return view('admin.admin_gallery',['gallery' => $gallery], ['kategori' => $kategori]);
    }
    public function tambah_gallery()
    {
        $kategori = Kategori::where('id_menu', '=', 'Gallery')->get();
        return view('admin.gallery_tambah', ['kategori' => $kategori]);
    }
    public function store_gallery(Request $request)
    {
        $validateData = $request->validate([

            'judul'         => 'required', 'string', 'max:255',
            'gambar'        => 'required|file|image|max:1024|mimes:jpeg,bmp,png',
            'isi'           => 'required',
            'nama_kategori'   => 'required',
            ]);
            $extFile = $request->gambar->getClientOriginalExtension();
            $namFile = 'gallery-'.time().rand(100,999).".".$extFile;
            $path = $request->gambar->move('image',$namFile);
            if(extension_loaded("gd")||extension_loaded("gd2")){
                $newImage = Image::make($path)->crop(1000,500); // panjang, lebar
                $newImage->save($path, 90);
             }
            $gallery = new Gallery();
            $gallery->judul = $validateData['judul'];
            $gallery->gambar = $path;
            $gallery->isi = $validateData['isi'];
            $gallery->nama_kategori = $validateData['nama_kategori'];
            $gallery->save();

            return redirect()->route('gallery')->with('pesan',"Penambahan gallery {$validateData['judul']} berhasil");
    }
    public function edit_gallery(Gallery $gallery)
    {
        $kategori = Kategori::where('id_menu', '=', 'Gallery')->get();
        return view('admin.gallery_edit',['gallery' => $gallery], ['kategori' => $kategori]);
    }
    public function update_gallery(Request $request, Gallery $gallery)
    {
        $validateData = $request->validate([
            'judul'         => 'required', 'string', 'max:255',
            'gambar'        => 'required|file|image|max:1024|mimes:jpeg,bmp,png',
            'isi'           => 'required',
            'nama_kategori'   => 'required',
        ]);

            $gallery = Gallery::find($gallery->id);
            $gallery->judul = $validateData['judul'];
            $gallery->isi = $validateData['isi'];
            $gallery->nama_kategori = $validateData['nama_kategori'];

            if($request->hasFile('gambar')){
                $oldImagePath = 'image/'.$gallery->gambar;
                if(File::exists($oldImagePath)){
                    File::delete($oldImagePath);
                }
                    $namFile = $gallery->gambar;
                    $newImagePath = $validateData['gambar']->move('image',$namFile);
                    if(extension_loaded("gd")||extension_loaded("gd2")){
                        $newImage = Image::make($newImagePath)->crop(1000,500); // panjang, lebar
                        $newImage->save($newImagePath, 90);
                    }

                $gallery->gambar = $newImagePath;
            }

            $gallery->save();

            return redirect()->route('gallery')->with('pesan',"Update data {$validateData['judul']} berhasil");
    }
    public function destroy_gallery(Gallery $gallery)
    {
        $gallery = Gallery::find($gallery->id);
        $oldImagePath = $gallery->gambar;
            if(File::exists($oldImagePath)){
                File::delete($oldImagePath);
        }
        $gallery->delete();
        return redirect()->route('gallery')->with('pesan',"Hapus data $gallery->judul berhasil");
    }

    //about
    public function about()
    {
        $about = About::find(1);
        return view('admin.admin_about',['about' => $about]);
    }
    public function store_about(Request $request)
    {
        $validateData = $request->validate([

            'judul'         => 'required', 'string', 'max:255',
            'gambar'        => 'required',
            'isi'           => 'required',
            'nama_kategori'   => 'required',
            ]);
            $extFile = $request->gambar->getClientOriginalExtension();
            $namFile = 'about-'.time().rand(100,999).".".$extFile;
            $path = $request->gambar->move('image',$namFile);

            $about = new About();
            $about->judul = $validateData['judul'];
            $about->gambar = $path;;
            $about->isi = $validateData['isi'];
            $about->nama_kategori = $validateData['nama_kategori'];
            $about->save();

            return redirect()->route('about')->with('pesan',"Penambahan about {$validateData['judul']} berhasil");
    }
    public function edit_about(About $about)
    {
        $kategori = Kategori::where('id_menu', '=', 'About')->get();
        return view('admin.about_edit',['about' => $about], ['kategori' => $kategori]);
    }
    public function update_about(Request $request, About $about)
    {
        $validateData = $request->validate([
            'judul'       => 'required', 'string', 'max:255',
            'isi'         => 'required',
            'isi_bawah'   => 'required',
            'lokasi'      => 'required',
            'email'       => 'required',
            'telp'        => 'required',
            'twitter'     => 'required',
            'facebook'    => 'required',
            'instagram'   => 'required',
        ]);

            $about = About::find($about->id);
            $about->judul = $validateData['judul'];
            $about->isi = $validateData['isi'];
            $about->isi_bawah = $validateData['isi_bawah'];
            $about->lokasi = $validateData['lokasi'];
            $about->email = $validateData['email'];
            $about->telp = $validateData['telp'];
            $about->twitter = $validateData['twitter'];
            $about->facebook = $validateData['facebook'];
            $about->instagram = $validateData['instagram'];
            $about->save();

            return redirect()->route('about')->with('pesan',"Update data {$validateData['judul']} berhasil");
    }
    public function destroy_about(About $about)
    {
        $about = About::find($about->id);
        $oldImagePath = $about->gambar;
            if(File::exists($oldImagePath)){
                File::delete($oldImagePath);
        }
        $about->delete();
        return redirect()->route('about')->with('pesan',"Hapus data $about->judul berhasil");
    }
}
