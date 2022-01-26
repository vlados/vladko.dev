<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Question;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index()
    {
        $faq = _cache('faq', function () {
            return Question::orderBy('order')->get();
        }, 60 * 24);
        $projects = _cache('projects', function () {
            return Project::orderBy('order_column', 'asc')->get();
        }, app()->environment('local') ? 0 : (60 * 24));
        $tags = $projects->map(function (Project $project) {
            return explode(',', $project->technologies);
        })->flatten()->unique()->prepend('All')->toArray();

        // create $dates array and fill it with dates, then we can get the newest and set it as Last-modified in the headers
        $lastModifiedDate = _cache('lastModifiedDate', function () {
            $dates = [];
            $commitDate = new \DateTime(trim(exec('git log -n1 --pretty=%ci HEAD')));
            $commitDate->setTimezone(new \DateTimeZone('UTC'));
            $dates[] = ($commitDate->getTimestamp());

            $projectsDate = Project::select('updated_at')->orderBy('updated_at', 'desc')->first();
            if ($projectsDate) {
                $dates[] = ($projectsDate->updated_at->timestamp);
            }
            $faq = Question::select('updated_at')->orderBy('updated_at', 'desc')->first();
            if ($faq) {
                $dates[] = ($faq->updated_at->timestamp);
            }

            return Carbon::createFromTimestamp(max($dates))->setTimezone('GMT');
        }, 60 * 24);

        JsonLd::addValues([
            'name' => 'Vladislav Stoitsov - full-stack web developer', // set false to total remove
            'description' => 'Full-stack web developer with more than 16 years of experience leading both front-end and back-end development. Laravel Livewire, Angular, PHP, JavaScript, SASS, TailwindCSS, Progressive Web App developer',
            'url' => url('/'),
            'type' => 'LocalBusiness',
            '@id' => url('/'),
            'telephone' => '+359876540555',
            'priceRange' => '$$$',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Racho Dimchev 1A',
                'addressLocality' => 'Sofia',
                'postalCode' => '1000',
                'addressCountry' => 'BG',
            ],
            'openingHoursSpecification' => [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => [
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                ],
                'opens' => '09:00',
                'closes' => '18:00',
            ],
            'sameAs' => [
                'https://github.com/vlados',
                'https://angel.co/vlados',
                'https://twitter.com/vlados',
                'https://www.linkedin.com/in/vstoitsov',
                'https://www.youtube.com/user/vlados01',
                'https://www.facebook.com/vlados',
            ],
            'image' => asset('images/vladislav stoitsov.jpg'),
            'logo' => asset('images/SVG/vladko-logo-01.png'),
        ]);
        if (is_bot()) {
            SEOMeta::setTitleDefault('&#128104;&#8205;&#128187;  Vladislav Stoitsov - full-stack web developer');
        }
        SEOMeta::setDescription('Full-stack web developer with more than 16 years of experience leading both front-end and back-end development. Laravel Livewire, Angular, PHP, JavaScript, SASS, TailwindCSS, Progressive Web App developer');
        SEOMeta::setKeywords('Laravel, Livewire, Angular, PHP, JavaScript, SASS, TailwindCSS, Progressive Web App,fullstack, aplinejs, frontend');

        return (new SetCacheHeaders())->handle(new Request(), function () use ($tags, $lastModifiedDate, $projects, $faq) {
            $response = Response::make(view('welcome', [
                'faq' => $faq,
                'projects' => $projects,
                'project_tags' => $tags,
            ])->render());
            $response->setPublic();
            $response->setLastModified($lastModifiedDate);

            $response->header('Last-modified', $lastModifiedDate);
            if ($response->isNotModified(\request())) {
				$response->setContent("");
                $response->setStatusCode(304);
            }

            return $response;
        }, 'public;etag;max_age=10800;last_modified=' . $lastModifiedDate);
    }
}
