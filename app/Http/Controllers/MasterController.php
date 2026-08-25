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
use App\Models\Kategori_Career;
use App\Models\Kategori_Blog;
use App\Models\Building_Type;

class MasterController extends Controller
{
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
}
