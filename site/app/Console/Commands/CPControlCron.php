<?php

namespace App\Console\Commands;

use App\Models\CompanyPacket;
use App\Models\CompanyPayment;

use Carbon\Carbon;
use Illuminate\Console\Command;

class CPControlCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cpcontrol:cron';

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
        // expire date i şimdiki zamandan kucuk olan örnek 10000 kayıtı birden alıp güncellemek
        // bu durum hafıza doldurup yapıyı hataya dusurecektır. Chunk methodu ile belirledigimiz miktarda datayı güncelletebiliriz.
        // chunk ile big database dataları update ederken parcalara bolmemıze olanak saglıyor 100 er 1000 er update gecıyoruz

        CompanyPacket::where("end_date","<",Carbon::now())->chunk(100, function ($companyPackets) {
            foreach ($companyPackets as $companyPacket){
                $data['company_id'] = $companyPacket->company_id;
                $data['packet_id'] = $companyPacket->packet_id;
                $data['created_at'] = Carbon::now();
                if(rand(0,10)%2 == 0){
                    $data['status'] = 3; // ödeme alındı
                }else{
                    $data['status'] = 2; // ödeme alınamadı
                }

                CompanyPayment::create($data);
            }

        });
    }
}
