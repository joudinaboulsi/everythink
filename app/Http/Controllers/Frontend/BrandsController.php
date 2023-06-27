<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Mail;
use SEO;

class BrandsController extends Controller
{

    //brands page
    public function brands()
    {    
        SEO::setTitle('Everythink | Brands | Games, Toys and Entertainment online/offline store');
        SEO::setDescription('Find your gifts in our online store and offline shops in Araya (Main Road) and Saida (The Spot) and send them to your beloved ones all around Lebanon.');
        SEO::opengraph()->setUrl(getenv('APP_URL'));
        SEO::setCanonical(getenv('APP_URL').'brands');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@EverythinkMe');

        return view('frontend.brands.brands');
    }

    //brands details page
    public function brandDetails()
    {      
        SEO::setTitle('Everythinkk | Brands | Games, Toys and Entertainment online/offline store');
        SEO::setDescription('Find your gifts in our online store and offline shops in Araya (Main Road) and Saida (The Spot) and send them to your beloved ones all around Lebanon.');
        SEO::opengraph()->setUrl(getenv('APP_URL'));
        SEO::setCanonical(getenv('APP_URL').'brand-details');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@EverythinkMe');

        return view('frontend.brands.brand-details');
    }

}