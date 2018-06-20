<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use App\Currency;

class BankParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bank:parser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse bank RSS for information';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Start BankParser');


        try {
            
            $xml = simplexml_load_file("https://www.bank.lv/vk/ecb_rss.xml");
            for($i = 0; $i < 1; $i++){
              
                $title = $xml->channel->item[$i]->title;
                $link = $xml->channel->item[$i]->link;
                $description = $xml->channel->item[$i]->description;
                $pubDate = $xml->channel->item[$i]->pubDate;

                $dateCurrencies = Currency::whereDate('created_at' , '>' , Carbon::parse($pubDate));

                if ($dateCurrencies->count() > 0){
                    continue;
                }

                $currencyArray = explode(' ', trim($description->__toString()));

                foreach (array_chunk($currencyArray, 2) as $key => $currencyData) {
                    $currencyItem = new Currency();
                    $currencyItem->currency = $currencyData[0];
                    $currencyItem->price = $currencyData[1];

                    if ($currencyItem->save()){
                        $this->line('added '.$currencyItem->currency.' with '.$currencyItem->price);
                    }
                }
                
            }              

        } catch (BadResponseException $ex) {
            $return =  array('error' => 1 , 'details' => 'problems : '.$ex->getResponse()->getBody());
            $this->error(json_encode($ex));
        }

        $this->info('End BankParser');
    }
}
