<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
// use App\Models\Portfolio;
use App\Models\About;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $setting = Setting::first();
        $about = About::first();
        $klasifikasi = Klasifikasi::get();
        $testimoni = Testimoni::get();
        $partner = Partner::get();
        $Galeri = Galeri::get();
        $nowa = preg_replace('/[^0-9]/', '', $setting->no_wa);
        $pesanWa = urlencode($setting->text_wa);
        if (str_starts_with($nowa, '0')) {
            $nowa = '62' . substr($nowa, 1);
        }
        $portfolioByYear = Portfolio::with('rbuilding_type')
            ->whereNotNull('tahun')
            ->orderByDesc('tahun')
            ->orderByDesc('id')
            ->get()
            ->groupBy('tahun');
        return view('frontend.pages.home', compact('partner', 'Galeri', 'testimoni', 'klasifikasi', 'setting', 'nowa', 'about', 'pesanWa', 'portfolioByYear'));
    }
    public function about()
    {
        $about = About::first();
        $staff = Staff::get();
        $staffs = Staff::get();
        return view('frontend.pages.about', compact(
            'about',
            'staff',
            'staffs'
        ));
    }
    public function blog()
    {
        $blog = Blog::get();
        $blogs = Blog::latest()->take(5)->get();
        $blogss = Blog::get();
        $blogsss = Blog::get();
        $blogssss = Blog::get();
        $rblogssss = Blog::get();
        return view('frontend.pages.blog', compact(
            'blog',
            'blogs',
            'blogss',
            'blogsss',
            'blogssss',
            'rblogssss'
        ));
    }
    public function dblog($id)
    {
        $blog = Blog::find($id);
        $g_blog = G_Blog::where('blog_id', $id)->get();

        return view('frontend.pages.dblog', compact('blog', 'g_blog'));
    }
    public function carerr()
    {
        $career = Career::get();
        $careers = Career::latest()->take(5)->get();
        $careerss = Career::get();
        $careersss = Career::get();
        $careerssss = Career::get();
        return view('frontend.pages.carerr', compact(
            'career',
            'careers',
            'careerss',
            'careersss',
            'careerssss'
        ));
    }
    public function dcarerr($id)
    {
        $career = Career::find($id);
        return view('frontend.pages.dcarerr', compact('career'));
    }
    public function dportfolio($id)
    {
        $portfolio = Portfolio::find($id);
        $g_portfolio = G_Portfolio::where('portfolio_id', $id)->get();
        return view('frontend.pages.dportfolio', compact('portfolio', 'g_portfolio'));
    }
}
