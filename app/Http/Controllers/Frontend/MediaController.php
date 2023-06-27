<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BlogRepository;
use App\Http\Repositories\VideosRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Mail;
use SEO;

class MediaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(BlogRepository $blogRepository, VideosRepository $videosRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->videosRepository = $videosRepository;
    }

    //media page
    public function media()
    {      
        SEO::setTitle('Everythink | Media | Games, Toys and Entertainment online/offline store');
        SEO::setDescription('Find your gifts in our online store and offline shops in Araya (Main Road) and Saida (The Spot) and send them to your beloved ones all around Lebanon.');
        SEO::opengraph()->setUrl(getenv('APP_URL'));
        SEO::setCanonical(getenv('APP_URL').'media');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@EverythinkMe');

        // Returns the list of slides
        $media = $this->blogRepository->show();

        return view('frontend.media.media', array('media' => $media));
    }

    //tutorials page
    public function tutorials()
    {      
        SEO::setTitle('Everythink | Tutorials | Games, Toys and Entertainment online/offline store');
        SEO::setDescription('Find your gifts in our online store and offline shops in Araya (Main Road) and Saida (The Spot) and send them to your beloved ones all around Lebanon.');
        SEO::opengraph()->setUrl(getenv('APP_URL'));
        SEO::setCanonical(getenv('APP_URL').'tutorials');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@EverythinkMe');
        
        // Returns the list of tutorials
        $tutorials = $this->videosRepository->show();
        
        return view('frontend.media.tutorials', array('tutorials' => $tutorials));
    }

}