<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CompanyStatusChangeCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'companystatuschange:cron';

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
        DB::table('company_payments')->selectRaw('company_id,count(company_id) as total')
            ->where('status','=',2)->orderBy('company_id')->groupBy('company_id')->chunk(100, function ($companyPayments) {
                foreach ($companyPayments as $companyPayment){
                    if($companyPayment->total == 3){
                        User::where('id',$companyPayment->company_id)->update(['status'=> 0]);
                    }
                }
            });
    }
}
