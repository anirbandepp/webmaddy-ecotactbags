<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Blog;
use Session;
class HomeController extends Controller
{
    /* Change Password POST */
		public function changePassword(Request $request)
		{
			if(Hash::check($request->input('currentPassword'),auth()->user()->getAuthPassword()))
			{
				auth()->user()->password = Hash::make($request->input('newPassword'));
				if(auth()->user()->save())
					return back()->with('global','Password is successfully changed.')->with('type','success');
				else
					return back()->with('global','Error.Try again.')->with('type','danger');
			}else{
				return back()->with('global','The old password did not match.')->with('type','danger');
			}
		} 
	/* contact Email */
	    public function contactEmail(Request $request)
	    {
	        $this->validate($request,[
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
            \Mail::send('contact-mail', ['fullName' => $fullName,'email' => $email,'topic' => $topic,'msg' => $message], function ($m) use ($reciverEmail,$topic) {
                    $m->to($reciverEmail)->subject($topic);
                  });
            return redirect()->back()->with('global','Submitted Successfully')->with('type','success');
            
	    }
	/* Set Language */
		public function setLanguage()
		{
			$languages = \App\Language::orderBy('id','desc');
			if(request('id')){
	            $findLanguage = $languages->where('id',request('id'))->first();
	            if($findLanguage){
	                session()->put('lang',$findLanguage);
	                App::setLocale($findLanguage->slug);
	            }
	        }else{
	        	$defaultLanguage = $languages->where('is_default','Y')->first();
	        	config(['app.lang' => $defaultLanguage]);
	        	App::setLocale('en');
	        }
	        return redirect()->back();
		}
	/* Get Blog Listing */
	   public function getBlogListing(Request $request){
	       $blogs = Blog::where('status',1)->with('categories')->orderBy('id','DESC');
	       $old = 'All';
	       if(request('category')){
	           $cat = \App\BlogCategory::where('blog_category_name',request('category'))->first();
	           $old = request('category');
	           $blogs = $blogs->whereHas('categories', function($q) use($cat) {
                    $q->where('blog_categories.id', @$cat->id);
                });
	       }
	       $blogs = $blogs->get();
	       $categories = \App\BlogCategory::get();
	       return view('blog',compact('blogs','categories','old'));
	   }
    /* Get Blog Full View */
       public function getBlogInside(Request $request,$slug = null){
           if(!$slug)
           {
               abort(404);
           }
           $old = request('category');
           $blog = Blog::where('status',1)->where('slug',$slug)->first();
           $cats = $blog->categories()->pluck('blog_category_id')->all();
           $blogs = Blog::where('status',1)->whereNotIn('id',[$blog->id])->whereHas('categories', function($q) use($cats) {
                    $q->whereIn('blog_categories.id', @$cats);
                })->get()->take(3);
           if(!$blog){
               abort(404);
           }
           
	       return view('blog-inside',compact('blog','blogs','old'));
	   }
	   
	   public function enquireNow(Request $request)
	   {
	       $this->validate($request,[
	            'c_name' => 'required',
                'c_email' => 'required',
                'company' => 'required',
                'c_country' => 'required',
                'g-recaptcha-response' => 'required'
	        ]);
	        
	        $c_name = request('c_name');
            $c_message = request('c_message');
            $c_email = request('c_email');
            $company = request('company');
            $c_country = request('c_country');
            $email = 'info@ecotactbags.com';
            $subject = request('subject') ? request('subject') : 'Enquiry-Ecotact Bags' ;
            $product = request('product') ? implode(',',request('product')) : 'No Products Selected';
	       \Mail::send('enquiry_mail', ['c_name' => $c_name,'c_message' => $c_message,'c_email' => $c_email,'company' => $company, 'c_country' => $c_country,'product' => $product], function ($m) use ($email,$subject) {
                $m->to($email)->subject($subject);
            });
            return redirect()->back()->with('global','Mail Sent Successfully')->with('type','success');
	   }
	   public function postComment(){
	       
	        $comment = request('comment');
            $name = request('name');
            $email = request('email');
            $website = request('website');
            $subject = request('blog');
            $email = 'info@ecotactbags.com';
	       \Mail::send('blog_mail', ['comment' => $comment,'name' => $name,'email' => $email,'website' => $website], function ($m) use ($email,$subject) {
                $m->to($email)->subject($subject);
            });
            return redirect()->back()->with('global','Mail Send Successfully')->with('type','success');
	   }
	   public function manualForm(Request $request,$categorySlug,$productSlug)
	   {
	       session()->put(['prevUrl' => url()->previous()]);
	        $c_name = request('c_name');
            $c_email = request('c_email');
            $c_country = request('c_country');
            $subject = 'User Manual';
            $email = 'info@ecotactbags.com';
            \Mail::send('enquiry_mail', ['c_name' => $c_name,'c_message' => '','c_email' => $c_email,'company' => '', 'c_country' => $c_country,'product' => ''], function ($m) use ($email,$subject) {
                $m->to($email)->subject($subject);
            });
            session(['down' => '1']);
            return redirect()->route('thanku',['categorySlug' => $categorySlug,'productSlug'=>$productSlug]);
        }
        public function getThanku(Request $request,$categorySlug,$productSlug)
        {
            $product = \App\Product::where('slug',$productSlug)->first();
            if($product){
                // return session('down');
                return view('thanku',['url' => route('downloudManual',['product' => $product]),'back' => session()->get('prevUrl'),'product' => $product->id, 'request' => $request->all(),'categorySlug' => $categorySlug]);
            }else{
                return redirect()->back();
            }
            
        }
        public function manualDownloud(Request $request,\App\Product $product){
            if($request->session()->has('down') && session('down') == 1){
                
                $request->session()->forget('down');
                $manual = $product->manual;
                if(config('app.lang')->slug == 'sp'){
                    $manual = $product->manual_spanish;
                }
                if ($manual != null){
                    $file= $_SERVER['DOCUMENT_ROOT'].'/manual/'.$manual;
                    return \Response::download($file);
                    
                }
                
            }
            // return $product;
             return redirect()->back()->with('url',route('downloudManual',['product' => $product]))->with('back',session()->get('prevUrl'))->with('request',$request->all());
                
        }
        
}
