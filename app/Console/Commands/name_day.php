<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Nameday;

class name_day extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'name-days:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
                $result = [];
        $client = new Client();
        $htmlPage = $client->request('GET', 'https://www.behindthename.com/namedays/country/slovakia');

        $divEl = $htmlPage->filter('div.nameday-month');

        foreach ($divEl as $month => $monthEl) {
            $monthEl = new Crawler($monthEl);
            
            $tdEl = $monthEl->filter('table tr td');
           
            $day = 0;
            foreach ($tdEl as $el) {
                $el = new Crawler($el);
                $val = $el->text();

                if (is_numeric($val)) {
                    $day = $val; 
                } else {
                    $result[] = [
                        'month' => $month + 1,
                        'day'   => intval($day),
                        'name'  => $val
                    ];
                }
            }
        }
        
        Nameday::truncate();
        Nameday::insert($result);
        echo 'Insert is done';
    }
}
