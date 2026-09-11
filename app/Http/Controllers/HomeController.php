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
use Illuminate\Validation\ValidationException;

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
        $blog = Blog::orderBy('id', 'desc')->get();
        $blogs = Blog::latest()->take(5)->get();
        $kategori_blogs = Kategori_Blog::with([
            'blogs' => function ($query) {
                $query->orderBy('id', 'desc');
            }
        ])->get();
        // $blogss = Blog::get();
        // $blogsss = Blog::get();
        // $blogssss = Blog::get();
        // $rblogssss = Blog::get();
        return view('frontend.pages.blog', compact(
            'blog',
            'blogs',
            'kategori_blogs'
            // 'blogss',
            // 'blogsss',
            // 'blogssss',
            // 'rblogssss'
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
        $career = Career::whereDate('deadline', '>=', Carbon::today())->orderBy('id', 'desc')->get();
        $careerssss = Career::get();
        $kategori_careers = Kategori_Career::with([
            'careers' => function ($query) {
                $query->whereDate('deadline', '>=', Carbon::today())
                    ->orderBy('id', 'desc');
            }
        ])->get();

        return view('frontend.pages.carerr', compact(
            'career',
            'kategori_careers',
            'careerssss'
        ));
    }
    // public function carerr()
    // {
    //     $career = Career::orderBy('id', 'desc')->get();
    //     $careers = Career::latest()->take(5)->get();
    //     $careerss = Career::get();
    //     $careersss = Career::get();
    //     $careerssss = Career::get();
    //     $careermep = Career::get();
    //     $careerbim = Career::get();
    //     return view('frontend.pages.carerr', compact(
    //         'career',
    //         'careers',
    //         'careerss',
    //         'careersss',
    //         'careerssss',
    //         'careermep',
    //         'careerbim'
    //     ));
    // }
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
    // public function send(Request $request)
    // {
    //     $request->validate([
    //         'first_name' => [
    //             'required',
    //             'string',
    //             'max:100',
    //             'regex:/^[\pL\s\'.-]+$/u',
    //         ],

    //         'email' => [
    //             'required',
    //             'email',
    //             'max:255',
    //         ],

    //         'phone' => [
    //             'required',
    //             'string',
    //             'max:20',
    //             'regex:/^[0-9+\-\s()]+$/',
    //         ],

    //         'subject' => [
    //             'required',
    //             'string',
    //             'max:200',
    //             'regex:/^[^<>]*$/',
    //         ],

    //         'message' => [
    //             'required',
    //             'string',
    //             'max:5000',
    //             'regex:/^[^<>]*$/',
    //         ],
    //     ]);

    //     Mail::send(
    //         'emails.contact',
    //         [
    //             'first_name' => $request->first_name,
    //             'email'      => $request->email,
    //             'phone'      => $request->phone,
    //             'subject'    => $request->subject,
    //             'content'    => $request->message,
    //         ],
    //         function ($mail) use ($request) {

    //             // Pengirim tetap akun Gmail SMTP
    //             $mail->from(
    //                 config('mail.from.address'),
    //                 config('mail.from.name')
    //             );

    //             // Email tujuan
    //             $mail->to('kobeazi07@gmail.com');

    //             // Ketika tombol Reply ditekan,
    //             // balasan dikirim ke email pengunjung
    //             $mail->replyTo(
    //                 $request->email,
    //                 $request->first_name
    //             );

    //             $mail->subject($request->subject);
    //         }
    //     );

    //     return back()->with(
    //         'success',
    //         'Your message has been sent successfully.'
    //     );
    // }
    public function send(Request $request)
    {
        try {

            $validated = $request->validate([
                'first_name' => [
                    'required',
                    'string',
                    'max:100',
                    'regex:/^[\pL\s]+$/u',
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255',
                ],

                'phone' => [
                    'required',
                    'string',
                    'max:20',
                    'regex:/^[0-9+\-\s()]+$/',
                ],

                'subject' => [
                    'required',
                    'string',
                    'max:200',
                    'regex:/^[\pL\pN\s]+$/u',
                ],

                'message' => [
                    'required',
                    'string',
                    'max:5000',
                    'regex:/^[\pL\pN\s]+$/u',
                ],
            ], [

                'first_name.required' => 'Nama depan wajib diisi.',
                'first_name.regex' => 'Nama depan hanya boleh menggunakan huruf dan spasi.',

                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',

                'phone.required' => 'Nomor telepon wajib diisi.',
                'phone.regex' => 'Nomor telepon hanya boleh menggunakan angka.',

                'subject.required' => 'Subject wajib diisi.',
                'subject.regex' => 'Subject tidak boleh menggunakan simbol.',

                'message.required' => 'Pesan wajib diisi.',
                'message.regex' => 'Pesan tidak boleh menggunakan simbol.',

                '*.max' => 'Input terlalu panjang.',
            ]);

            Mail::send(
                'emails.contact',
                [
                    'first_name' => $validated['first_name'],
                    'email'      => $validated['email'],
                    'phone'      => $validated['phone'],
                    'subject'    => $validated['subject'],
                    'content'    => $validated['message'],
                ],
                function ($mail) use ($validated) {

                    $mail->from(
                        config('mail.from.address'),
                        config('mail.from.name')
                    );

                    $mail->to('kobeazi07@gmail.com');

                    $mail->replyTo(
                        $validated['email'],
                        $validated['first_name']
                    );

                    $mail->subject($validated['subject']);
                }
            );

            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent successfully.'
            ]);
        } catch (ValidationException $e) {

            return response()->json([
                'success' => false,
                'message' => 'Please check your input.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Sorry, your message could not be sent. Please try again.'
            ], 500);
        }
    }
}
