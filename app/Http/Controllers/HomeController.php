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
use Illuminate\Support\Facades\Mail;

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
        $services = Services::get();
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
        return view('frontend.pages.home', compact('partner', 'Galeri', 'testimoni', 'klasifikasi', 'setting', 'nowa', 'about', 'pesanWa', 'portfolioByYear', 'services'));
    }
    public function about()
    {
        $about = About::first();
        $staff = Staff::get();
        $staffs = Staff::get();
        $setting = Setting::first();
        return view('frontend.pages.about', compact(
            'about',
            'staff',
            'staffs',
            'setting'
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
    public function dblog($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        $g_blog = G_Blog::where('blog_id', $blog->id)->get();

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
    public function dcarerr($slug)
    {
        $career = Career::where('slug', $slug)->firstOrFail();
        // $career = Career::find($id);
        return view('frontend.pages.dcarerr', compact('career'));
    }
    public function dportfolio($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
        // $portfolio = Portfolio::find($id);
        $g_portfolio = G_Portfolio::where('portfolio_id', $portfolio->id)->get();
        return view('frontend.pages.dportfolio', compact('portfolio', 'g_portfolio'));
    }
    public function contact()
    {
        $setting = Setting::first();
        return view('frontend.pages.contact', compact('setting'));
    }
    public function send(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'subject'    => 'required',
            'message'    => 'required',
        ]);

        Mail::send(
            'emails.contact',
            [
                'first_name' => $request->first_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'subject'    => $request->subject,
                'content'    => $request->message,
            ],
            function ($mail) use ($request) {

                // Pengirim tetap akun Gmail SMTP
                $mail->from(
                    config('mail.from.address'),
                    config('mail.from.name')
                );

                // Email tujuan
                $mail->to('kobeazi07@gmail.com');

                // Ketika tombol Reply ditekan,
                // balasan dikirim ke email pengunjung
                $mail->replyTo(
                    $request->email,
                    $request->first_name
                );

                $mail->subject($request->subject);
            }
        );

        return back()->with(
            'success',
            'Your message has been sent successfully.'
        );
    }
}
