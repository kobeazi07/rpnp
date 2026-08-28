<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Partner;
use App\Models\Services;
use App\Models\Testimoni;
use App\Models\Klasifikasi;
use App\Models\Galeri;
use App\Models\Staff;
use App\Models\Career;
use App\Models\Kategori_Career;
use App\Models\Kategori_Blog;
use App\Models\Building_Type;
use App\Models\G_Blog;
use App\Models\Blog;
use App\Models\T_Blog;
use App\Models\G_Portfolio;
use App\Models\Portfolio;
use App\Models\Tag;
use App\Models\Setting;
use App\Models\About;
use App\Models\Kategori_Portfolio;

class MasterController extends Controller
{
    //login
    public function halamanlogin()
    {

        return view('backend.layouts.login');
    }
    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'redirect' => route('HalamanDashboard') // sesuaikan route tujuan
            ]);
        }
        // Password salah
        return response()->json([
            'success' => false,
            'message' => 'Password salah! Silakan coba lagi.'
        ], 401);
    }
    public function user_logout(Request $request)
    {

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    // dashboard
    public function dashboard()
    {
        $setting = Setting::limit(1)->get();
        $settingss = Setting::limit(1)->get();
        return view('backend.pages.dashboard', compact('setting', 'settingss'));
    }

    public function edit_setting(Request $request, $id)
    {
        $setting =   Setting::find($id);
        $data = [
            'tittle'     => $request->judul,
            'description' => $request->deskripsi,
            'meta'     => $request->meta,
            'no_wa' => $request->nowa,
            'email' => $request->email,
            'link_ig' => $request->link_ig,
            'link_facebook' => $request->link_facebook,
            'link_tiktok' => $request->link_tiktok,
            'link_linkedin' => $request->link_linkedin,
            'text_wa' => $request->text_wa,
            // Otomatis tambahkan class rounded-image
            'embed_gmaps'    => $this->addClassToIframe($request->embed_gmaps),
            'link_gmaps' => $request->link_gmaps,
            'alamat' => $request->alamat,
        ];

        // cek jika ada thumbnail baru
        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = uniqid() . '_thumbnail_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('inputan/thumbnail/img'), $thumbnailName);

            $data['gambar'] = 'inputan/thumbnail/img/' . $thumbnailName;
        }

        // update data
        Setting::where('id', $id)->update($data);

        return response()->json([
            'status' => 1,
            'message' => 'Portfolio berhasil diupdate'
        ]);
    }

    private function addClassToIframe($html)
    {
        if (empty($html)) {
            return $html;
        }

        // Jika iframe sudah memiliki class
        if (preg_match('/<iframe\b[^>]*class=["\']([^"\']*)["\']/i', $html)) {

            return preg_replace(
                '/(<iframe\b[^>]*class=["\'])([^"\']*)(["\'])/i',
                '$1$2 rounded-image$3',
                $html,
                1
            );
        }

        // Jika iframe belum memiliki class
        return preg_replace(
            '/<iframe\b/i',
            '<iframe class="rounded-image"',
            $html,
            1
        );
    }
    // about
    // about
    public function about()
    {
        $abouts = About::limit(1)->get();
        return view('backend.pages.about', compact('abouts'));
    }


    public function edit_about(Request $request, $id)
    {
        $about =   About::find($id);
        $data = [
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ];


        // update data
        About::where('id', $id)->update($data);
        //  dd($id);   

        return response()->json([
            'status' => 1,
            'message' => 'About berhasil diupdate'
        ]);
    }



    // partner
    public function admin_partner()
    {
        $partner = Partner::get();
        return view('backend.pages.partner', compact('partner'));
    }
    public function tambah_partner(Request $request)
    {

        DB::beginTransaction();

        try {
            $thumbnailPath = null;
            if ($request->hasFile('logo')) {
                $thumbnail = $request->file('logo');

                $originalName = $thumbnail->getClientOriginalName();

                // Ganti spasi dengan tanda -
                $originalName = str_replace(' ', '-', $originalName);

                $thumbnailName = uniqid() . '_logo_' . $originalName;

                $thumbnail->move(
                    public_path('inputan/partner/'),
                    $thumbnailName
                );

                $thumbnailPath = 'inputan/partner/' . $thumbnailName;
            }

            $partner = Partner::create([
                'nama' => $request->nama,
                'logo' =>  $thumbnailPath
            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'partner berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_partner(Request $request, $id)
    {

        $partner = Partner::find($id);
        $data = [
            'nama' => $request->nama,
        ];

        if ($request->hasFile('logo')) {

            $thumbnail = $request->file('logo');
            $originalName = $thumbnail->getClientOriginalName();
            $originalName = str_replace(' ', '-', $originalName);
            $thumbnailName = uniqid() . '_logo_' . $originalName;
            $thumbnail->move(
                public_path('inputan/partner/'),
                $thumbnailName
            );
            // Simpan path ke database
            $data['logo'] = 'inputan/partner/' . $thumbnailName;
        }

        Partner::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data partner berhasil diupdate'
        ]);
    }
    public function partner_destroy(Partner $partner)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($partner->logo && file_exists(public_path($partner->logo))) {
                unlink(public_path($partner->logo));
            }

            // hapus data
            $partner->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data partner berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // services
    public function admin_services()
    {
        $services = Services::get();
        return view('backend.pages.services', compact('services'));
    }
    public function tambah_services(Request $request)
    {

        DB::beginTransaction();

        try {
            $thumbnailPath = null;
            if ($request->hasFile('image')) {
                $thumbnail = $request->file('image');

                $originalName = $thumbnail->getClientOriginalName();

                // Ganti spasi dengan tanda -
                $originalName = str_replace(' ', '-', $originalName);

                $thumbnailName = uniqid() . '_image_' . $originalName;

                $thumbnail->move(
                    public_path('inputan/services/'),
                    $thumbnailName
                );

                $thumbnailPath = 'inputan/services/' . $thumbnailName;
            }

            $services = services::create([
                'nama' => $request->nama,
                'image' =>  $thumbnailPath,
                'deskripsi' => $request->deskripsi,
            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'services berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_services(Request $request, $id)
    {

        $partner = Services::find($id);
        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('image')) {

            $thumbnail = $request->file('image');
            $originalName = $thumbnail->getClientOriginalName();
            $originalName = str_replace(' ', '-', $originalName);
            $thumbnailName = uniqid() . '_image_' . $originalName;
            $thumbnail->move(
                public_path('inputan/services/'),
                $thumbnailName
            );
            // Simpan path ke database
            $data['image'] = 'inputan/services/' . $thumbnailName;
        }

        Services::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data services berhasil diupdate'
        ]);
    }
    public function services_destroy(Services $services)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($services->image && file_exists(public_path($services->image))) {
                unlink(public_path($services->image));
            }

            // hapus data
            $services->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data services berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // testimoni
    public function admin_testimoni()
    {
        $testimoni = Testimoni::get();
        return view('backend.pages.testimoni', compact('testimoni'));
    }
    public function tambah_testimoni(Request $request)
    {

        DB::beginTransaction();

        try {
            $thumbnailPath = null;
            if ($request->hasFile('foto')) {
                $thumbnail = $request->file('foto');

                $originalName = $thumbnail->getClientOriginalName();

                // Ganti spasi dengan tanda -
                $originalName = str_replace(' ', '-', $originalName);

                $thumbnailName = uniqid() . '_foto_' . $originalName;

                $thumbnail->move(
                    public_path('inputan/testimoni/'),
                    $thumbnailName
                );

                $thumbnailPath = 'inputan/testimoni/' . $thumbnailName;
            }

            $testimoni = Testimoni::create([
                'nama' => $request->nama,
                'foto' =>  $thumbnailPath,
                'deskripsi' => $request->deskripsi,
                'jabatan' => $request->jabatan,
            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'testimoni berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_testimoni(Request $request, $id)
    {

        $partner = Testimoni::find($id);
        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'jabatan' => $request->jabatan,
        ];

        if ($request->hasFile('foto')) {

            $thumbnail = $request->file('foto');
            $originalName = $thumbnail->getClientOriginalName();
            $originalName = str_replace(' ', '-', $originalName);
            $thumbnailName = uniqid() . '_foto_' . $originalName;
            $thumbnail->move(
                public_path('inputan/testimoni/'),
                $thumbnailName
            );
            // Simpan path ke database
            $data['foto'] = 'inputan/testimoni/' . $thumbnailName;
        }

        Testimoni::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data testimoni berhasil diupdate'
        ]);
    }
    public function testimoni_destroy(Testimoni $testimoni)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($testimoni->foto && file_exists(public_path($testimoni->foto))) {
                unlink(public_path($testimoni->foto));
            }

            // hapus data
            $testimoni->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data testimoni berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // klasifikasi
    public function admin_klasifikasi()
    {
        $klasifikasi = Klasifikasi::get();
        return view('backend.pages.klasifikasi', compact('klasifikasi'));
    }
    public function tambah_klasifikasi(Request $request)
    {

        DB::beginTransaction();

        try {


            $klasifikasi = Klasifikasi::create([
                'judul' => $request->judul,

                'deskripsi' => $request->deskripsi

            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'klasifikasi berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_klasifikasi(Request $request, $id)
    {

        $partner = Klasifikasi::find($id);
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi

        ];

        Klasifikasi::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data klasifikasi berhasil diupdate'
        ]);
    }
    public function klasifikasi_destroy(Klasifikasi $klasifikasi)
    {
        DB::beginTransaction();

        try {
            // hapus data
            $klasifikasi->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data klasifikasi berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // galeri
    public function admin_galeri()
    {
        $galeri = Galeri::get();
        return view('backend.pages.galeri', compact('galeri'));
    }
    public function tambah_galeri(Request $request)
    {

        DB::beginTransaction();

        try {
            $thumbnailPath = null;
            if ($request->hasFile('image')) {
                $thumbnail = $request->file('image');

                $originalName = $thumbnail->getClientOriginalName();

                // Ganti spasi dengan tanda -
                $originalName = str_replace(' ', '-', $originalName);

                $thumbnailName = uniqid() . 'image_' . $originalName;

                $thumbnail->move(
                    public_path('inputan/galeri/'),
                    $thumbnailName
                );

                $thumbnailPath = 'inputan/galeri/' . $thumbnailName;
            }

            $galeri = Galeri::create([
                'judul' => $request->judul,
                'image' =>  $thumbnailPath

            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'galeri berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_galeri(Request $request, $id)
    {

        $partner = Galeri::find($id);
        $data = [
            'judul' => $request->judul,

        ];

        if ($request->hasFile('image')) {

            $thumbnail = $request->file('image');
            $originalName = $thumbnail->getClientOriginalName();
            $originalName = str_replace(' ', '-', $originalName);
            $thumbnailName = uniqid() . '_image_' . $originalName;
            $thumbnail->move(
                public_path('inputan/galeri/'),
                $thumbnailName
            );
            // Simpan path ke database
            $data['image'] = 'inputan/galeri/' . $thumbnailName;
        }

        Galeri::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data galeri berhasil diupdate'
        ]);
    }
    public function galeri_destroy(Galeri $galeri)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($galeri->image && file_exists(public_path($galeri->image))) {
                unlink(public_path($galeri->image));
            }

            // hapus data
            $galeri->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data galeri berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // staff
    public function admin_staff()
    {
        $staff = Staff::get();
        return view('backend.pages.staff', compact('staff'));
    }
    public function tambah_staff(Request $request)
    {

        DB::beginTransaction();

        try {
            $thumbnailPath = null;
            if ($request->hasFile('foto')) {
                $thumbnail = $request->file('foto');

                $originalName = $thumbnail->getClientOriginalName();

                // Ganti spasi dengan tanda -
                $originalName = str_replace(' ', '-', $originalName);

                $thumbnailName = uniqid() . '_foto_' . $originalName;

                $thumbnail->move(
                    public_path('inputan/staff/'),
                    $thumbnailName
                );

                $thumbnailPath = 'inputan/staff/' . $thumbnailName;
            }

            $staff = staff::create([
                'nama_lengkap' => $request->nama_lengkap,
                'foto' =>  $thumbnailPath,
                'status' => $request->status,
                'jabatan' => $request->jabatan,
            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'staff berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_staff(Request $request, $id)
    {

        $partner = Staff::find($id);
        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'status' => $request->status,
            'jabatan' => $request->jabatan,
        ];

        if ($request->hasFile('foto')) {

            $thumbnail = $request->file('foto');
            $originalName = $thumbnail->getClientOriginalName();
            $originalName = str_replace(' ', '-', $originalName);
            $thumbnailName = uniqid() . '_foto_' . $originalName;
            $thumbnail->move(
                public_path('inputan/staff/'),
                $thumbnailName
            );
            // Simpan path ke database
            $data['foto'] = 'inputan/staff/' . $thumbnailName;
        }

        Staff::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data staff berhasil diupdate'
        ]);
    }
    public function staff_destroy(Staff $staff)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($staff->foto && file_exists(public_path($staff->foto))) {
                unlink(public_path($staff->foto));
            }

            // hapus data
            $staff->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data staff berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // kategori_career
    public function admin_kategori_career()
    {
        $kategori_career = Kategori_Career::get();
        return view('backend.pages.kategori_career', compact('kategori_career'));
    }
    public function tambah_kategori_career(Request $request)
    {

        DB::beginTransaction();

        try {


            $kategori_career = Kategori_Career::create([
                'nama' => $request->nama,

            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'kategori_career berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_kategori_career(Request $request, $id)
    {

        $partner = Kategori_Career::find($id);
        $data = [
            'nama' => $request->nama

        ];

        Kategori_Career::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data kategori_career berhasil diupdate'
        ]);
    }
    public function kategori_career_destroy(Kategori_Career $kategori_career)
    {
        DB::beginTransaction();

        try {
            // hapus data
            $kategori_career->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data kategori_career berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    // building type
    public function admin_building_type()
    {
        $building_type = Building_Type::get();
        return view('backend.pages.building_type', compact('building_type'));
    }
    public function tambah_building_type(Request $request)
    {

        DB::beginTransaction();

        try {


            $building_type = Building_Type::create([
                'nama' => $request->nama,

            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'building_type berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_building_type(Request $request, $id)
    {

        $partner =  Building_Type::find($id);
        $data = [
            'nama' => $request->nama

        ];

        Building_Type::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data building_type berhasil diupdate'
        ]);
    }
    public function building_type_destroy(Building_Type $building_type)
    {
        DB::beginTransaction();

        try {
            // hapus data
            $building_type->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data building_type berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // kategori Blog
    public function admin_kategori_blog()
    {
        $kategori_blog = Kategori_Blog::get();
        return view('backend.pages.kategori_blog', compact('kategori_blog'));
    }
    public function tambah_kategori_blog(Request $request)
    {

        DB::beginTransaction();

        try {


            $kategori_blog = Kategori_Blog::create([
                'nama' => $request->nama

            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'kategori_blog berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_kategori_blog(Request $request, $id)
    {

        $partner = Kategori_Blog::find($id);
        $data = [
            'nama' => $request->nama

        ];

        Kategori_Blog::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data kategori_blog berhasil diupdate'
        ]);
    }
    public function kategori_blog_destroy(Kategori_Blog $kategori_blog)
    {
        DB::beginTransaction();

        try {
            // hapus data
            $kategori_blog->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data kategori_blog berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // kategori Portfolio
    public function admin_kategori_portfolio()
    {
        $kategori_portfolio = Kategori_portfolio::get();
        return view('backend.pages.kategori_portfolio', compact('kategori_portfolio'));
    }
    public function tambah_kategori_portfolio(Request $request)
    {

        DB::beginTransaction();

        try {


            $kategori_portfolio = Kategori_portfolio::create([
                'nama' => $request->nama

            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'kategori_portfolio berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_kategori_portfolio(Request $request, $id)
    {

        $partner = Kategori_portfolio::find($id);
        $data = [
            'nama' => $request->nama

        ];

        Kategori_portfolio::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data kategori_portfolio berhasil diupdate'
        ]);
    }
    public function kategori_portfolio_destroy(Kategori_portfolio $kategori_portfolio)
    {
        DB::beginTransaction();

        try {
            // hapus data
            $kategori_portfolio->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data kategori_portfolio berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    // career
    public function admin_career()
    {
        $career = Career::get();
        $kcareer = Kategori_Career::get();
        $kcareerss = Kategori_Career::get();
        return view('backend.pages.career', compact('career', 'kcareer', 'kcareerss'));
    }
    public function tambah_career(Request $request)
    {

        DB::beginTransaction();

        try {
            $thumbnailPath = null;
            if ($request->hasFile('foto')) {
                $thumbnail = $request->file('foto');

                $originalName = $thumbnail->getClientOriginalName();

                // Ganti spasi dengan tanda -
                $originalName = str_replace(' ', '-', $originalName);

                $thumbnailName = uniqid() . '_foto_' . $originalName;

                $thumbnail->move(
                    public_path('inputan/career/'),
                    $thumbnailName
                );

                $thumbnailPath = 'inputan/career/' . $thumbnailName;
            }

            $career = Career::create([
                'judul' => $request->judul,
                'foto' =>  $thumbnailPath,
                'deadline' => $request->deadline,
                'location' => $request->location,
                'kategori_career' => $request->kategori_career,
                'requirement' => $request->requirement,
                'link_daftar' => $request->link_daftar,
            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'career berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_career(Request $request, $id)
    {

        $partner = Career::find($id);
        $data = [
            'judul' => $request->judul,
            'deadline' => $request->deadline,
            'location' => $request->location,
            'kategori_career' => $request->kategori_career,
            'requirement' => $request->requirement,
            'link_daftar' => $request->link_daftar,
        ];

        if ($request->hasFile('foto')) {

            $thumbnail = $request->file('foto');
            $originalName = $thumbnail->getClientOriginalName();
            $originalName = str_replace(' ', '-', $originalName);
            $thumbnailName = uniqid() . '_foto_' . $originalName;
            $thumbnail->move(
                public_path('inputan/career/'),
                $thumbnailName
            );
            // Simpan path ke database
            $data['foto'] = 'inputan/career/' . $thumbnailName;
        }

        Career::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data career berhasil diupdate'
        ]);
    }
    public function career_destroy(Career $career)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($career->foto && file_exists(public_path($career->foto))) {
                unlink(public_path($career->foto));
            }

            // hapus data
            $career->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data career berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // portfolio
    public function admin_portfolio()
    {
        $portfolio = Portfolio::with('galeri_portfolio')->get();
        $b_type = Building_Type::get();
        $b_typess = Building_Type::get();
        $kategori = Kategori_Portfolio::get();
        $kategoriss = Kategori_Portfolio::get();
        return view('backend.pages.portfolio', compact('portfolio', 'b_type', 'b_typess', 'kategori', 'kategoriss'));
    }
    public function tambah_portfolio(Request $request)
    {

        DB::beginTransaction();

        try {
            $thumbnailPath = null;
            if ($request->hasFile('foto')) {
                $thumbnail = $request->file('foto');

                $originalName = $thumbnail->getClientOriginalName();

                // Ganti spasi dengan tanda -
                $originalName = str_replace(' ', '-', $originalName);

                $thumbnailName = uniqid() . '_foto_' . $originalName;

                $thumbnail->move(
                    public_path('inputan/portfolio/'),
                    $thumbnailName
                );

                $thumbnailPath = 'inputan/portfolio/' . $thumbnailName;
            }

            $portfolio = Portfolio::create([
                'judul' => $request->judul,
                'foto' =>  $thumbnailPath,
                'buildingtype_id' => $request->buildingtype_id,
                'kategori_portfolio_id' => $request->kategori_portfolio_id,
                'sow' => $request->sow,
                'deskripsi' => $request->deskripsi,
                'tahun' => $request->tahun,

            ]);
            $portfolio_id = $portfolio->id;
            // dd($portfolio_id);
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('inputan/portfolio/detailimg'), $fileName);

                    G_Portfolio::create([
                        'portfolio_id' => $portfolio_id,
                        'image'     => $fileName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'portfolio berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_portfolio(Request $request, $id)
    {

        $partner = Portfolio::find($id);
        $data = [
            'judul' => $request->judul,
            'buildingtype_id' => $request->buildingtype_id,
            'kategori_portfolio_id' => $request->kategori_portfolio_id,
            'sow' => $request->sow,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
        ];

        if ($request->hasFile('foto')) {

            $thumbnail = $request->file('foto');
            $originalName = $thumbnail->getClientOriginalName();
            $originalName = str_replace(' ', '-', $originalName);
            $thumbnailName = uniqid() . '_foto_' . $originalName;
            $thumbnail->move(
                public_path('inputan/portfolio/'),
                $thumbnailName
            );
            // Simpan path ke database
            $data['foto'] = 'inputan/portfolio/' . $thumbnailName;
        }
        Portfolio::where('id', $id)->update($data);
        $portfolio_id = $id;

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('inputan/portfolio/detailimg/'), $fileName);

                G_Portfolio::create([
                    'portfolio_id' => $portfolio_id,
                    'image'     => $fileName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        portfolio::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data portfolio berhasil diupdate'
        ]);
    }
    public function portfolio_destroy(portfolio $portfolio)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($portfolio->foto && file_exists(public_path($portfolio->foto))) {
                unlink(public_path($portfolio->foto));
            }
            $g_portfolio = G_Portfolio::where('portfolio_id', $portfolio->id)->get();

            foreach ($g_portfolio  as  $g_portfolios) {

                // hapus file gambar galeri
                $path = public_path('inputan/portfolio/detailimg/' . $g_portfolios->image);

                if (file_exists($path)) {
                    unlink($path);
                }

                $g_portfolios->delete();
            }
            // hapus data
            $portfolio->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data portfolio berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deletePictureportfolio($id)
    {
        $picture = G_Portfolio::findOrFail($id);

        // hapus file fisik
        $filePath = public_path('inputan/portfolio/detailimg/' . $picture->image);
        // $filePath = public_path($picture->image);


        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $picture->delete();

        return response()->json([
            'success' => true
        ]);
    }

    // blog
    public function admin_blog()
    {
        $blog = Blog::with('galeri_blog')->get();
        $k_blog = Kategori_Blog::get();
        $k_blogss = Kategori_Blog::get();
        $tag = Tag::get();
        $tagss = Tag::get();
        return view('backend.pages.blog', compact('blog', 'k_blog', 'k_blogss', 'tag', 'tagss'));
    }
    public function tambah_blog(Request $request)
    {

        DB::beginTransaction();

        try {
            $thumbnailPath = null;
            if ($request->hasFile('foto')) {
                $thumbnail = $request->file('foto');

                $originalName = $thumbnail->getClientOriginalName();

                // Ganti spasi dengan tanda -
                $originalName = str_replace(' ', '-', $originalName);

                $thumbnailName = uniqid() . '_foto_' . $originalName;

                $thumbnail->move(
                    public_path('inputan/blog/'),
                    $thumbnailName
                );

                $thumbnailPath = 'inputan/blog/' . $thumbnailName;
            }

            $blog = Blog::create([
                'judul' => $request->judul,
                'foto' =>  $thumbnailPath,
                'kategori_id' => $request->kategori_id,
                'deskripsi' => $request->deskripsi,

            ]);
            $blog_id = $blog->id;
            // dd($blog_id);
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('inputan/blog/detailimg'), $fileName);

                    G_Blog::create([
                        'blog_id' => $blog_id,
                        'image'     => $fileName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            // $internaldelivery_id = $internaldelivery->id;
            // foreach ($request->tag_id as $key => $tagId) {
            //     T_Blog::create([
            //         'blog_id' => $blog_id,
            //         'tag_id'     => $tagId,
            //     ]);
            // }

            // if ($request->has('tag_id')) {

            //     foreach ($request->tag_id as $tagValue) {

            //         /*
            //      * Jika value berupa ID,
            //      * berarti menggunakan tag yang sudah ada.
            //      */
            //         if (is_numeric($tagValue)) {

            //             $tag_id = $tagValue;
            //         } else {

            //             /*
            //          * Jika bukan ID,
            //          * berarti user mengetik tag baru.
            //          */

            //             $tagName = trim($tagValue);

            //             if ($tagName == '') {
            //                 continue;
            //             }

            //             // CREATE TAG BARU
            //             $tag = Tag::firstOrCreate([
            //                 'nama' => $tagName
            //             ]);

            //             $tag_id = $tag->id;
            //         }

            //         T_Blog::create([
            //             'blog_id' => $blog_id,
            //             'tag_id'  => $tag_id,
            //         ]);
            //     }
            // }

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'blog berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_blog(Request $request, $id)
    {

        $partner = Blog::find($id);
        $data = [
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,

            'deskripsi' => $request->deskripsi,

        ];

        if ($request->hasFile('foto')) {

            $thumbnail = $request->file('foto');
            $originalName = $thumbnail->getClientOriginalName();
            $originalName = str_replace(' ', '-', $originalName);
            $thumbnailName = uniqid() . '_foto_' . $originalName;
            $thumbnail->move(
                public_path('inputan/blog/'),
                $thumbnailName
            );
            // Simpan path ke database
            $data['foto'] = 'inputan/blog/' . $thumbnailName;
        }
        Blog::where('id', $id)->update($data);
        $blog_id = $id;

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('inputan/blog/detailimg/'), $fileName);

                G_Blog::create([
                    'blog_id' => $blog_id,
                    'image'     => $fileName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        Blog::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data blog berhasil diupdate'
        ]);
    }
    public function blog_destroy(Blog $blog)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($blog->foto && file_exists(public_path($blog->foto))) {
                unlink(public_path($blog->foto));
            }
            $g_blog = G_blog::where('blog_id', $blog->id)->get();

            foreach ($g_blog  as  $g_blogs) {

                // hapus file gambar galeri
                $path = public_path('inputan/blog/detailimg/' . $g_blogs->image);

                if (file_exists($path)) {
                    unlink($path);
                }

                $g_blogs->delete();
            }
            // hapus data
            $blog->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data blog berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deletePictureblog($id)
    {
        $picture = G_Blog::findOrFail($id);

        // hapus file fisik
        $filePath = public_path('inputan/blog/detailimg/' . $picture->image);
        // $filePath = public_path($picture->image);


        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $picture->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
