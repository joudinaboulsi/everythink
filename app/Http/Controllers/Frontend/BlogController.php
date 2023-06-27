<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BlogRepository;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Repositories\SeoRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Mail;
use SEO;

class BlogController extends Controller
{
    public function __construct(PagesController $pagesController, BlogRepository $blogRepository, SeoRepository $seoRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->pagesController = $pagesController;
        $this->seoRepository = $seoRepository;
    }

    //blog page
    public function blog()
    {   
        //get page seo info
        $page_seo=$this->seoRepository->getSEOPageInfo(7);

        //call for setSeo() to set seo for this page
        $this->pagesController->setSeo($page_seo[0], 'product');

        // Returns the list of slides
        $news = $this->blogRepository->show();

        return view('frontend.blog.blog', array('news' => $news));
    }

    //blog details page
    public function blogDetails($blog_id)
    {      
        
        $news = $this->blogRepository->showDetails($blog_id);

        //call for setSeo() to set seo for this page
        $this->pagesController->setSeo($news[0], 'product');

        return view('frontend.blog.blog-details', array('news' => $news));
    }

}