<?php

namespace Database\Seeders;

use App\Models\CompanyPacket;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CompanyPacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'status'        => 1,
                'company_id'    => 1,
                'packet_id'     => 1,
                'start_date'    => Carbon::now(),
                'end_date'      => Carbon::now()->addDay(3)->addHour(1)->addMinute(10),
            ],
            [
                'status'        => 1,
                'company_id'    => 1,
                'packet_id'     => 2,
                'start_date'    => Carbon::now(),
                'end_date'      => Carbon::now()->addDay(1)->addHour(3)->addMinute(10),
            ],
            [
                'status'        => 1,
                'company_id'    => 1,
                'packet_id'     => 4,
                'start_date'    => Carbon::now(),
                'end_date'      => Carbon::now()->addDay(3)->addHour(1)->addMinute(10),
            ],
            [
                'status'        => 1,
                'company_id'    => 2,
                'packet_id'     => 1,
                'start_date'    => Carbon::now(),
                'end_date'      => Carbon::now()->addDay(1)->addHour(6)->addMinute(10),
            ],
            [
                'status'        => 1,
                'company_id'    => 3,
                'packet_id'     => 2,
                'start_date'    => Carbon::now(),
                'end_date'      => Carbon::now()->addDay(3)->addHour(1)->addMinute(10),
            ],
            [
                'status'        => 1,
                'company_id'    => 3,
                'packet_id'     => 4,
                'start_date'    => Carbon::now(),
                'end_date'      => Carbon::now()->addDay(1)->addHour(1)->addMinute(10),
            ],
            [
                'status'        => 1,
                'company_id'    => 2,
                'packet_id'     => 2,
                'start_date'    => Carbon::now(),
                'end_date'      => Carbon::now()->addDay(4)->addHour(11)->addMinute(10),
            ]
        ];
        foreach ($datas as $data){
            CompanyPacket::create($data);
        }
    }
}
