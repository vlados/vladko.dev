<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;

class OpcacheDebugCompile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'opcache:debug {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Debug opcache:compile as curl command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $parameters = ['force' => $this->option('force') ?? false];
        $curl = 'curl -XGET';
        $curl_options = [];
        if (config('opcache.verify')) {
            $curl_options[] = '-k';
        }

        if (is_array(config('opcache.headers')) && count(config('opcache.headers'))) {
            foreach (config('opcache.headers') as $key => $value) {
                $curl_options[] = '-H ' . $key . ': ' . $value;
            }
        }
        $curl .= ' ' . implode('', $curl_options);
        $url = rtrim(config('opcache.url'), '/') . '/' . trim(config('opcache.prefix'), '/') . '/' . ltrim('compile', '/') .
            '?' . http_build_query(array_merge(['key' => Crypt::encrypt('opcache')], $parameters));
        $curl .= " '" . $url . "'";
        $this->info($curl);

        return 1;
    }
}
