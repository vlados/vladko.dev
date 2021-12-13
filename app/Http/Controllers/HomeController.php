<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Question;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $faq = _cache("faq", function () {
            return Question::orderBy("order")->get();
        }, 60 * 24);
        $projects = _cache("projects", function () {
            return Project::all();
        }, 60 * 24);

        JsonLd::addValues([
            'name' => 'Vladislav Stoitsov - full-stack web developer', // set false to total remove
            'description' => 'Full-stack web developer with more than 16 years of experience leading both front-end and back-end development. Laravel Livewire, Angular, PHP, JavaScript, SASS, TailwindCSS, Progressive Web App developer',
            'url' => url("/"),
            'type' => 'LocalBusiness',
            "@id" => url('/'),
            "telephone" => "+359876540555",
            "priceRange" => "$$$",
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "Racho Dimchev 1A",
                "addressLocality" => "Sofia",
                "postalCode" => "1000",
                "addressCountry" => "BG"
            ],
            "openingHoursSpecification" => [
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                ],
                "opens" => "09:00",
                "closes" => "18:00"
            ],
            "sameAs" => [
                "https://github.com/vlados",
                "https://angel.co/vlados",
                "https://twitter.com/vlados",
                "https://www.linkedin.com/in/vstoitsov",
                "https://www.youtube.com/user/vlados01",
                "https://www.facebook.com/vlados"
            ],
            'image' => asset('images/vladislav stoitsov.jpg'),
            'logo' => asset('images/SVG/vladko-logo-01.png')
        ]);
        if(isset($_GET['bot']) ||
        isset($_SERVER['HTTP_USER_AGENT'])
        && preg_match('/bot|crawl|slurp|spider|mediapartners|Chrome-Lighthouse/i', $_SERVER['HTTP_USER_AGENT'])) {
            SEOMeta::setTitle("👨‍💻 Vladislav Stoitsov - full-stack web developer");
        }
        SEOMeta::setDescription('Full-stack web developer with more than 16 years of experience leading both front-end and back-end development. Laravel Livewire, Angular, PHP, JavaScript, SASS, TailwindCSS, Progressive Web App developer');
        SEOMeta::setKeywords('Laravel, Livewire, Angular, PHP, JavaScript, SASS, TailwindCSS, Progressive Web App,fullstack, aplinejs, frontend');

        return view('welcome')->with([
            "faq" => $faq,
            "projects" => $projects
        ]);
    }
}
