<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Frontend\CategoriesApis;
use App\Http\Repositories\Frontend\ProductApis;
use App\Http\Repositories\Frontend\TagsApis;
use App\Http\Repositories\SlidesRepository;
use App\Http\Repositories\AboutRepository;
use App\Http\Repositories\SeoRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Mail;
use SEO;
use SEOMeta;

class PagesController extends Controller
{

    public function __construct(CategoriesApis $categoriesApis, TagsApis $tagsApis, ProductApis $productApis, SlidesRepository $slidesRepository, AboutRepository $aboutRepository, SeoRepository $seoRepository)
    {
        $this->categoriesApis = $categoriesApis;
        $this->tagsApis = $tagsApis;
        $this->productApis = $productApis;
        $this->slidesRepository = $slidesRepository;
        $this->aboutRepository = $aboutRepository;
        $this->seoRepository = $seoRepository;
        
    }

    //Function to set seo dynamically
    public function setSeo($seo_data, $og_type)
    {
        //get url of the page
        $url = url()->current();
        //get OG twitter
        $og_tw=$this->seoRepository->showOGTwitter();

        SEO::setTitle($seo_data->seo_title);
        SEO::setDescription($seo_data->seo_description);
        SEOMeta::setKeywords($seo_data->seo_keywords);
        SEO::opengraph()->setUrl($url);
        SEO::setCanonical($url);
        SEO::opengraph()->addProperty('type', $og_type);  
        SEO::twitter()->setSite('@'.$og_tw[0]->og_twitter);
        if($seo_data->og_image != NULL) // check if we have an OG image
            SEO::addImages(getenv('S3_URL').'/seo/'.$seo_data->og_image); 
    }

    //Verify Captcha
    public function verifyCaptcha()
    {
        if(isset($_POST['captcha-response']) && !empty($_POST['captcha-response'])){       
            $data = array(
                'secret' => env('NOCAPTCHA_SECRET'),
                'response' => $_POST['captcha-response']
            );        

            $verify = curl_init();
            curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($verify, CURLOPT_POST, true);
            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($verify);   

            if($response == true)
                return true;
            else
                return false;
        }
        else
            return false;
    }

    //home page
    public function home()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(1); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'website');

        $data['highlights'] = $this->categoriesApis->getHighlightedCategories(); // get the higlighted categories
    
        $data['collections'] = $this->tagsApis->getCollections(6); // get the collections

        if(!empty($data['collections']))
        {
            foreach($data['collections'] as $c)
                $c->url_tag_name = $this->fixUrlName($c->name);
        }

        $data['deals'] = $this->productApis->getDeals(6); // get a limited number of deals
        $data['featured'] = $this->productApis->getFeaturedProducts(); // get the featured products
        $data['best_sellers'] = $this->productApis->getBestSellers(); // get the best selling product
        $data['new'] = $this->productApis->getNew(); // get the new products
// dd($data['new']);
        // Returns the list of slides
        $data['slides'] = $this->slidesRepository->show(0);
        // Returns the list of separators
        $data['separators'] = $this->slidesRepository->show(1);
        
        return view('frontend.pages.homepage', array('data' => $data,'now' => Carbon::now('Asia/Beirut')->format('Y-m-d')));
    }


    // show all best 
    public function best()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(4); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'website');

        $data['best-sellers'] = $this->productApis->getBestSellers(); // get all the best

        return view('frontend.pages.best', array('data' => $data,'now' => Carbon::now('Asia/Beirut')->format('Y-m-d')));
    }


    // show all deals 
    public function deals()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(14); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'product');

        $data['deals'] = $this->productApis->getDeals(false); // get all the deals

        return view('frontend.pages.deals', array('data' => $data,'now' => Carbon::now('Asia/Beirut')->format('Y-m-d')));
    }


    // show all categories 
    public function categories()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(13); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'product');
        
        $data['categories'] = $this->categoriesApis->show(); // get all the categories
       
        return view('frontend.pages.categories', array('data' => $data, 'now' => Carbon::now('Asia/Beirut')->format('Y-m-d')));
    }


    // function that remove all the forbidden/special characters from the URL route name and replace them by + 
    public static function fixUrlName($tag_name)
    {
        $forbidden_chars = array('-', ' ', '"', '<', '>', '#', '%', '{', '}', '|', '\\', '/', '//', '^', '~', '[', ']', '`', '?', '!', ','); //set and array of all the forbidden chars
        $tag_name = str_replace($forbidden_chars, '+', $tag_name); // replace these chars by a +
        $tag_name = preg_replace('/\++/', '+', $tag_name); // replace the duplicated +++ by only 1+
        return $tag_name;
    }


    // show all collections 
    public function collections()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(5); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'product');
        
        $data['collections'] = $this->tagsApis->getCollections(false); // get all the deals

        if(!empty($data['collections']))
        {
            foreach($data['collections'] as $c)
                $c->url_tag_name = $this->fixUrlName($c->name);
        }
        
        return view('frontend.pages.collections', array('data' => $data,'now' => Carbon::now('Asia/Beirut')->format('Y-m-d')));
    }


    // show products of a specific collection 
    public function getProductsOfCollection($tag_name, $tag_id)
    {

        //get collection details
        $data['tag_details'] = $this->tagsApis->getTagDetailsFromId($tag_id); // get the tag details from the tag id

        //call for setSeo() to set seo for this page
        $this->setSeo($data['tag_details'][0], 'product');

        $data['tag_details'][0]->url_tag_name = $this->fixUrlName($tag_name);//remove all the forbidden chars in the url

        $data['product_of_collection'] = $this->productApis->getProductsOfCollection($tag_id); // get all the products of the selected collection  (tag_id)
        
        return view('frontend.pages.products-of-collection', array('data' => $data, 'now' => Carbon::now('Asia/Beirut')->format('Y-m-d')));
    }


    //about page
    public function about()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(2); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'website');

        // Returns about page content
        $about = $this->aboutRepository->show();

        return view('frontend.pages.about', array('about' => $about));
    }


    //contact page
    public function contact()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(3); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'website');

        return view('frontend.pages.contact');
    }

    //Get the contact form details and send the mail
    public function getContactForm(Request $request)
    {   
        $name = $request->input('name');
        $phone_client = $request->input('phone');
        $email_client = $request->input('email');
        $location = $request->input('location');
        $msg_client = $request->input('message');

        $recaptcha = $this->verifyCaptcha();

        // if the form is full and captcha is true
        if (! empty($_POST) && ($recaptcha==true))
        {
            Mail::send('emails.contact', array('name' => $name, 'email_client' => $email_client, 'phone_client' => $phone_client, 'location' => $location, 'msg_client' => $msg_client), function($message) use ($email_client, $name)
            {
                $message->from($email_client, $name);
                $message->to('info@everythink.me')->subject('Email from Website');
            });

            \Session::flash('msg', 'Email Sent!' );
        
            return redirect()->back();
        }
    }

    //terms page
    public function terms()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(8); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'website');

        return view('frontend.pages.terms');
    }

    //privacy page
    public function privacy()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(9); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'website');

        return view('frontend.pages.privacy');
    }

    //disclaimer page
    public function disclaimer()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(10); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'website');

        return view('frontend.pages.disclaimer');
    }

    //careers page
    public function careers()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(6); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'website');

        return view('frontend.pages.careers');
    }

    //Get the careers form details and send the mail attached with a CV
    public function getCareersForm(Request $request)
    {
        $fullname = $request->input('fullname');
        $dob = $request->input('dob');
        $position = $request->input('position');
        $phone = $request->input('phone');
        $salary = $request->input('salary');
        $email = $request->input('email');
        $photo = $request->file('photo');
        $cv = $request->file('cv');
        $msg_client = $request->input('message');

        $recaptcha = $this->verifyCaptcha();

        // if the form is full and captcha is true
        if (! empty($_POST) && ($recaptcha==true))
        {
            Mail::send('emails.careers', array('fullname' => $fullname, 'dob' => $dob, 'position' => $position, 'phone' => $phone, 'salary' => $salary, 'email' => $email, 'photo' => $photo, 'cv' => $cv, 'msg_client' => $msg_client), function($message) use ($email, $fullname, $cv, $photo)
            {
                $message->from($email, $fullname);
                $message->to('info@everythink.me')->subject('[Career Request] '. $fullname .' from Website');
                if($cv != NULL)
                $message->attach($cv->getRealPath(), array('as' => 'cv.'.$cv->getClientOriginalExtension(), 'mime' => $cv->getMimeType()));
                if($photo != NULL)
                $message->attach($photo->getRealPath(), array('as' => 'photo.'.$photo->getClientOriginalExtension(), 'mime' => $photo->getMimeType()));
            });

            \Session::flash('msg', 'Email Sent!' );
            
            return redirect()->back();
        }
    }

    //faq page
    public function faq()
    {      
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(11); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'website');

        return view('frontend.pages.faq');
    }


    // Search bar Post ajax call 
    public function getSearch(Request $request)
    {
        $result = $this->productApis->search($request->input('search'));

        return response()->json($result);
    }

    // Search result
    public function searchResult(Request $request)
    {
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(12); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'product');

        session(['search_input' => $request->input('txt_search')]);

        $data['input'] = $request->input('txt_search');
        $data['results'] = $this->productApis->searchResults($request->input('txt_search'));

        return view('frontend.pages.search-result', array('data' => $data)); 
    }


    // Search result
    public function getSearchResults(Request $request)
    {   
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(12); 

        //call for setSeo() to set seo for this page
        $this->setSeo($page_seo[0], 'product');
        
        // if I have a previous search in the session
        if(session()->has('search_input'))
        {    
             $input_search = session('search_input');   

             $data['input'] = $input_search;
             $data['results'] = $this->productApis->searchResults($input_search);

             return view('frontend.pages.search-result', array('data' => $data)); 
        }
        //No previous search applied
        else 
            return redirect('/');
    }

}