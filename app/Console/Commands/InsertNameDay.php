<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Nameday;

class InsertNameDay extends Command
{
    protected $signature = 'name-days:update';

    protected $description = 'Insert records to table namedays';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $client = new Client();
        $htmlPage = $client->request('GET', 'https://www.behindthename.com/namedays/country/slovakia');

        $divEl = $htmlPage->filter('div.nameday-month');

        $result = [];
        foreach ($divEl as $month => $monthEl) {
            $monthEl = new Crawler($monthEl);
            
            $tdEl = $monthEl->filter('table tr td');
           
            $now = date('Y-m-d H:i:s');
            $day = 0;
            foreach ($tdEl as $el) {
                $el = new Crawler($el);
                $val = $el->text();

                if (is_numeric($val)) {
                    $day = $val; 
                } else {
                    $val = str_replace(' ', '', $val);
                    $val = str_replace(',', ', ', $val);
                   
                    $result[] = [
                        'month'         => $month + 1,
                        'day'           => intval($day),
                        'name'          => $val,
                        'created_at'    => $now
                    ];
                }
            }
        }
        
        Nameday::truncate();
        Nameday::insert($result);
        echo 'Insert is done';

        return 1;
    }
}
