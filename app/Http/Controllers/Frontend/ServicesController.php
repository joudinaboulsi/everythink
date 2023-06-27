<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Mail;
use SEO;

class ServicesController extends Controller
{

    //services page
    public function services()
    {      
        SEO::setTitle('Everythink | Games, Toys and Entertainment online/offline store');
        SEO::setDescription('Find your gifts in our online store and offline shops in Araya (Main Road) and Saida (The Spot) and send them to your beloved ones all around Lebanon.');
        SEO::opengraph()->setUrl(getenv('APP_URL'));
        SEO::setCanonical(getenv('APP_URL').'services');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@EverythinkMe');

        return view('frontend.services.services');
    }

    //services details page
    public function serviceDetails()
    {      
        SEO::setTitle('Everythink | Games, Toys and Entertainment online/offline store');
        SEO::setDescription('Find your gifts in our online store and offline shops in Araya (Main Road) and Saida (The Spot) and send them to your beloved ones all around Lebanon.');
        SEO::opengraph()->setUrl(getenv('APP_URL'));
        SEO::setCanonical(getenv('APP_URL').'service-details');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@EverythinkMe');

        return view('frontend.services.service-details');
    }

}