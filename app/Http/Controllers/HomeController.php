<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Question;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Middleware\SetCacheHeaders as Cache;
use Illuminate\Support\Facades\View;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Response;
use Artesaos\SEOTools\Facades\JsonLdMulti;

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

        // create $dates array and fill it with dates, then we can get the newest and set it as Last-modified in the headers
        $lastModifiedDate = _cache("lastModifiedDate", function () {
            $dates = [];
            $commitDate = new \DateTime(trim(exec('git log -n1 --pretty=%ci HEAD')));
            $commitDate->setTimezone(new \DateTimeZone('UTC'));
            $dates[] = ($commitDate->getTimestamp());

            $projectsDate = Project::select("updated_at")->orderBy("updated_at", "desc")->first();
            if($projectsDate) {
                $dates[] = ($projectsDate->updated_at->timestamp);
            }
            $faq = Question::select("updated_at")->orderBy("updated_at", "desc")->first();
            if($faq) {
                $dates[] = ($faq->updated_at->timestamp);
            }
            return Carbon::createFromTimestamp(max($dates))->setTimezone("GMT");
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
        if (
            isset($_GET['bot']) ||
            isset($_SERVER['HTTP_USER_AGENT'])
            && preg_match('/bot|crawl|slurp|spider|mediapartners|Chrome-Lighthouse/i', $_SERVER['HTTP_USER_AGENT'])
        ) {
            SEOMeta::setTitleDefault("👨‍ Vladislav Stoitsov - full-stack web developer");
        }
        SEOMeta::setDescription('Full-stack web developer with more than 16 years of experience leading both front-end and back-end development. Laravel Livewire, Angular, PHP, JavaScript, SASS, TailwindCSS, Progressive Web App developer');
        SEOMeta::setKeywords('Laravel, Livewire, Angular, PHP, JavaScript, SASS, TailwindCSS, Progressive Web App,fullstack, aplinejs, frontend');

        return (new SetCacheHeaders)->handle(new Request, function () use ($lastModifiedDate, $projects, $faq) {
            $response = Response::view('welcome', [
                "faq" => $faq,
                "projects" => $projects
            ]);
            $response->header("Last-modified",$lastModifiedDate);
            if($response->isNotModified(\request())) {
                $response->setStatusCode(304);
            }
            return $response;
        }, 'public;etag;max_age=10800;last_modified='.$lastModifiedDate);

    }
}
