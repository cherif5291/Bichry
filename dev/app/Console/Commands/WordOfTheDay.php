<?php

namespace App\Console\Commands;

use App\Models\Facture;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class WordOfTheDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test cron job command';

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

        $this->cheque();
        $this->facture();

    }

    public function cheque(){
        $a = 1;
        $b =2;
        if($a = $b){
            // traitement
        }
    }

    public function facture(){
        $date = Carbon::now()->format('Y/m/d');
        if(Facture::where('date_facturation', $date)->first()){
            // traitement
        }
    }
}
