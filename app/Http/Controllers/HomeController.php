<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Blog;
use App\Rules\Recaptcha;
use Session;

class HomeController extends Controller
{


    // landing
    public function marketingleadsenglish(Request $request)
    {
        // return $request->Utm_medium;
        return view('landing.index');
    }

    /* Change Password POST */
    public function changePassword(Request $request)
    {
        if (Hash::check($request->input('currentPassword'), auth()->user()->getAuthPassword())) {
            auth()->user()->password = Hash::make($request->input('newPassword'));
            if (auth()->user()->save())
                return back()->with('global', 'Password is successfully changed.')->with('type', 'success');
            else
                return back()->with('global', 'Error.Try again.')->with('type', 'danger');
        } else {
            return back()->with('global', 'The old password did not match.')->with('type', 'danger');
        }
    }
    /* contact Email */
    public function contactEmail(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'topic' => 'required',
            'message' => 'required',
        ]);
        $reciverEmail = 'info@ecotactbags.com';
        $fullName = request('name');
        $email = request('email');
        $topic = request('topic');
        $message = request('message');
        \Mail::send('contact-mail', ['fullName' => $fullName, 'email' => $email, 'topic' => $topic, 'msg' => $message], function ($m) use ($reciverEmail, $topic) {
            $m->to($reciverEmail)->subject($topic);
        });
        return redirect()->back()->with('global', 'Submitted Successfully')->with('type', 'success');
    }

    /* Landing Page Email */
    public function landingEnquiry(Request $request)
    {

        session()->put(['prevUrl' => url()->previous()]);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'company_name' => 'required',
            'country' => 'required',
            'products' => 'required',
        ]);
        $reciverEmail = ['arindam@webmaddy.com', 'freshfood@ecotactbags.com'];
        // $reciverEmail = 'arindam@webmaddy.com';
        $fullName = request('name');
        $email = request('email');
        $company_name = request('company_name');
        $country = request('country');
        $products = '';
        if (request('products')) {
            $products = implode(",", request('products'));
        }

        \Mail::send('landing-new-mail', ['fullName' => $fullName, 'email' => $email, 'company_name' => $company_name, 'country' => $country, 'products' => $products], function ($m) use ($reciverEmail) {
            $m->to($reciverEmail)->subject('fresh-food-packaging-enquiry');
        });
        $downloud = 0;
        if (request('downloud')) {
            $downloud = 1;
        }
        return redirect()->route('getThankLandingBochure', ['downloud' => $downloud]);
    }

    public function getThankLandingBochure(Request $request)
    {
        if (request('downloud')) {
            return view('thanku', ['url' => route('brochureDownloudLanding', ['downloud' => request('downloud')]), 'downloud' => request('downloud')]);
        } else {
            return view('thanku', ['downloud' => request('downloud')]);
        }
    }
    public function brochureDownloudLanding(Request $request)
    {
        if (request('downloud')) {

            $file = $file = $_SERVER['DOCUMENT_ROOT'] . '/Brochure Final Revised.pdf';
            return \Response::download($file);
        }
    }


    /* Set Language */
    public function setLanguage()
    {
        \Cache::forget('exporters');
        \Cache::forget('farmers');
        \Cache::forget('importers');
        \Cache::forget('explorers');
        $languages = \App\Language::orderBy('id', 'desc');
        if (request('id')) {
            $findLanguage = $languages->where('id', request('id'))->first();
            if ($findLanguage) {
                session()->put('lang', $findLanguage);
                App::setLocale($findLanguage->slug);
            }
        } else {
            $defaultLanguage = $languages->where('is_default', 'Y')->first();
            config(['app.lang' => $defaultLanguage]);
            App::setLocale('en');
        }
        return redirect()->back();
    }
    /* Get Blog Listing */
    //public function getBlogListing(Request $request){
    //    $lan = 1;
    //    if(in_array(config('app.lang')->slug,['sp','fr'])){
    //             $lan = config('app.lang')->id;
    //         }
    //    $blogs = Blog::where('status',1)->whereHas('blogDetails', function($q) use($lan) {
    //                 $q->where('language_id', @$lan);
    //             })->with(['categories','blogDetails'])->orderBy('id','DESC');
    //    $old = 'All';
    //    if(request('category')){
    //        $cat = \App\BlogCategory::where('slug',request('category'))->first();
    //        $old = request('category');
    //        $blogs = $blogs->whereHas('categories', function($q) use($cat) {
    //                 $q->where('blog_categories.id', @$cat->id);
    //             });
    //    }
    //    $blogs = $blogs->get();
    //    $categories = \App\BlogCategory::get();
    //    return view('blog',compact('blogs','categories','old'));
    //}
    // /* Get Blog Full View */
    //   public function getBlogInside(Request $request,$slug = null){
    //       if(!$slug)
    //       {
    //           abort(404);
    //       }
    //       $old = request('category');
    //       $blog = Blog::where('status',1)->where('slug',$slug)->first();
    //       $cats = $blog->categories()->pluck('blog_category_id')->all();
    //       $blogs = Blog::where('status',1)->whereNotIn('id',[$blog->id])->whereHas('categories', function($q) use($cats) {
    //                 $q->whereIn('blog_categories.id', @$cats);
    //             })->get()->take(3);
    //       if(!$blog){
    //           abort(404);
    //       }

    //    return view('blog-inside',compact('blog','blogs','old'));
    //}



    public function getBlogListing(Request $request)
    {
        //$lanId = 1;
        //if(Config('app.lang')->slug == 'sp'){
        //    $lanId = Config('app.lang')->id;
        //}
        //return $lanId;
        $value = $request->session()->get('lang');
        if (@$value && !is_null($value) && isset($value)) {

            $lanId = $value['id'] == 4 ? 1 : $value['id'];
        } else {
            $lanId = config('app.lang')->id == 4 ? 1 : config('app.lang')->id;
        }

        $blogs = Blog::where('status', 1)->whereHas('blogDetails', function ($qu) use ($lanId) {
            $qu->where('language_id', $lanId)->whereNotNull('title');
        })->with(['blogDetails' => function ($q) use ($lanId) {
            $q->where('language_id', $lanId);
        }])->with('categories');
        $old = 'All';
        if (request('category')) {
            $cat = \App\BlogCategory::where('blog_category_name', request('category'))->first();
            $old = request('category');
            $blogs = $blogs->whereHas('categories', function ($q) use ($cat) {
                $q->where('blog_categories.id', @$cat->id);
            });
        }
        $blogs = $blogs->orderBy('id', 'desc')->get();
        $categories = \App\BlogCategory::get();
        return view('new_blog', compact('blogs', 'categories', 'old'));
    }
    /* Get Blog Full View */
    public function getBlogInside(Request $request, $slug = null)
    {
        if (!$slug) {
            abort(404);
        }
        $value = request()->session()->get('lang');
        if (@$value && !is_null($value) && isset($value)) {
            $lanId = $value['id'];
        } else {
            $lanId = config('app.lang')->id == 4 ? 1 : config('app.lang')->id;
        }
        $blog = Blog::where('status', 1)->where('slug', $slug)->with(['blogDetails' => function ($q) use ($lanId) {
            $q->where('language_id', $lanId);
        }])->first();
        $old = request('category');
        $cats = $blog->categories()->pluck('blog_category_id')->all();
        $blogs = Blog::where('status', 1)->whereNotIn('id', [$blog->id])->whereHas('categories', function ($q) use ($cats) {
            $q->whereIn('blog_categories.id', @$cats);
        })->with(['blogDetails' => function ($qu) use ($lanId) {
            $qu->where('language_id', $lanId);
        }])->orderBy('id', 'desc')->get()->take(3);
        if (!$blog) {
            abort(404);
        }

        return view('new_blog-inside', compact('blog', 'blogs', 'old'));
    }

    public function enquireNow(Request $request)
    {
        $this->validate($request, [
            'c_name' => 'required',
            'c_email' => 'required',
            'company' => 'required',
            'c_country' => 'required',
            'g-recaptcha-response' => ['required', new Recaptcha()],
        ]);
        $utm = request('Utm_medium');
        $c_name = request('c_name');
        $c_message = request('c_message');
        $c_email = request('c_email');
        $company = request('company');
        $c_country = request('c_country');
        $email = 'info@ecotactbags.com';
        $subject = request('subject') ? request('subject') : 'Enquiry-Ecotact Bags';
        $product = request('product') ? implode(',', request('product')) : 'No Products Selected';
        \Mail::send('enquiry_mail', ['utm' => $utm, 'c_name' => $c_name, 'c_message' => $c_message, 'c_email' => $c_email, 'company' => $company, 'c_country' => $c_country, 'product' => $product], function ($m) use ($email, $subject) {
            $m->to($email)->subject($subject);
        });

        $headers = get_headers('http://ti2.in/zohoapi/insertcrm.php?client_id=1000.NMQWU963QXS8FQRF5RXL41Z5A0UNQR&client_secret=b2e9c490fbba91d41c966b913098b9e0a255960863&Authorization=1000.8a1f1a9f41b8129d733192eaa0849d0a.06b6ed0498a90bdcce08588a8d805ec0&domain=in&module=Leads&data={"Last_Name": "' . request('c_name') . '", "Email": "' . request('c_email') . '", "Company":"' . request('company') . '","Country":"' . $c_country . '","Description":"' . $c_message . '","Product_Picked":[' . $product . ']}');
        $headers2 = get_headers('http://ti2.in/zohoapi/search.php?client_id=1000.NMQWU963QXS8FQRF5RXL41Z5A0UNQR&client_secret=b2e9c490fbba91d41c966b913098b9e0a255960863&Authorization=1000.8a1f1a9f41b8129d733192eaa0849d0a.06b6ed0498a90bdcce08588a8d805ec0&domain=in&module=Leads&data={"Email":"' . request('c_email') . '","criteria":"Email"}');
        $headers1 = get_headers('http://ti2.in/zohoapi/updatecrm.php?client_id=1000.NMQWU963QXS8FQRF5RXL41Z5A0UNQR&client_secret=b2e9c490fbba91d41c966b913098b9e0a255960863&Authorization=1000.8a1f1a9f41b8129d733192eaa0849d0a.06b6ed0498a90bdcce08588a8d805ec0&domain=in&module=Leads&data={"id":"408338000000320002","Email":"' . request('c_email') . '"}');

        Session::put('test', collect($request));
        // return view('contact_thanku')->with('request',$request)->with('back',url()->previous())->with('global','Mail Sent Successfully')->with('type','success');
        return redirect()->route('getThanku2')->with('global', 'Mail Sent Successfully')->with('type', 'success');
    }
    public function getThanku2()
    {
        $request = Session::get('test');
        Session::forget('test');
        //return $request['c_name'];
        return view('contact_thanku')->with('request', $request)->with('back', url()->previous());
    }
    public function postComment(Request $request)
    {

        $this->validate($request, [
            'g-recaptcha-response' => ['required', new Recaptcha()],
            'comment' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);

        $comment = request('comment');
        $name = request('name');
        $email = request('email');
        $website = request('website');
        $subject = request('blog');
        $email = 'info@ecotactbags.com';
        \Mail::send('blog_mail', ['comment' => $comment, 'name' => $name, 'email' => $email, 'website' => $website], function ($m) use ($email, $subject) {
            $m->to($email)->subject($subject);
        });
        return redirect()->back()->with('global', 'Mail Send Successfully')->with('type', 'success');
    }
    public function manualForm(Request $request, $categorySlug, $productSlug)
    {
        session()->put(['prevUrl' => url()->previous()]);
        $c_name = request('c_name');
        $c_email = request('c_email');
        $c_country = request('c_country');
        $subject = 'User Manual';
        $email = 'info@ecotactbags.com';
        \Mail::send('enquiry_mail', ['c_name' => $c_name, 'c_message' => '', 'c_email' => $c_email, 'company' => '', 'c_country' => $c_country, 'product' => ''], function ($m) use ($email, $subject) {
            $m->to($email)->subject($subject);
        });
        session(['down' => '1']);
        return redirect()->route('thanku', ['categorySlug' => $categorySlug, 'productSlug' => $productSlug]);
    }
    public function getThanku(Request $request, $categorySlug, $productSlug)
    {
        $product = \App\Product::where('slug', $productSlug)->first();
        if ($product) {
            // return session('down');
            return view('thanku', ['url' => route('downloudManual', ['product' => $product]), 'back' => session()->get('prevUrl'), 'product' => $product->id, 'request' => $request->all(), 'categorySlug' => $categorySlug]);
        } else {
            return redirect()->back();
        }
    }
    public function manualDownloud(Request $request, \App\Product $product)
    {
        if ($request->session()->has('down') && session('down') == 1) {

            $request->session()->forget('down');
            $manual = $product->manual;
            if (config('app.lang')->slug == 'sp') {
                $manual = $product->manual_spanish;
            }
            if ($manual != null) {
                $file = $_SERVER['DOCUMENT_ROOT'] . '/manual/' . $manual;
                return \Response::download($file);
            }
        }
        // return $product;
        return redirect()->back()->with('url', route('downloudManual', ['product' => $product]))->with('back', session()->get('prevUrl'))->with('request', $request->all());
    }
    public function trackUrl()
    {
        return redirect(request('d_service_id'));
    }

    public function landingPagePost(Request $request)
    {
        $data = ['Utm_medium' => request('Utm_medium'), 'name' => request('name'), 'email' => request('email'), 'companyName' => request('companyName'), 'country' => request('country'), 'message' => request('message'), 'products' => implode(',', request('products'))];
        //return view('landing.mail',['data' => $data]);
        try {
            \Mail::send('landing.mail', ['data' => $data], function ($m) {
                $m->to(['aashirvad@gmail.com', 'swarnadeep@webmaddy.com', 'kaustav@webmaddy.com', 'info@ecotactbags.com'])->subject('Ecotact Landing Page');
            });
            return redirect()->route('thankyou')->with('global', 'Thank you for contact us')->with('type', 'success');
        } catch (\Exception $e) {
            return redirect()->route('thankyou')->with('global', $e->getMessage())->with('type', 'error');
        }
    }
}
