<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScheduleSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:sendSms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Sms using scheduling';

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

        $sendSmses = \App\SendSms::whereDate('date',\Carbon\Carbon::now()->toDateString())->whereTime('time',\Carbon\Carbon::now()->format('H:i'))->where('schedule_send_sms',1)->where('status','A')->get();
        // $this->error($sendSmses);
        foreach ($sendSmses as $key => $sendSms) {
            stream_context_set_default([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
            ]);
            $url = 'https://pgapi.vispl.in/fe/api/v1/multiSend?username='.config('services.vispl')['username'].'&password='.config('services.vispl')['password'].'&unicode=false&from='.$sendSms->sender_id.'&templateId='.$sendSms->template_id.'&to='.$sendSms->mobile_no.'&text='.urlencode($sendSms->message).'&dltContentId='.$sendSms->dlt_content_id;
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0
            ));
            $response = curl_exec($curl);
            $res = json_decode($response,true); 
            $sendSms->sms_response = $res['submitResponses'];
            $sendSms->save(); 
            $tIdArr = [];
            if($sendSms->save()){
                $sendSmsArr = explode(',', $sendSms->mobile_no);
                foreach ($sendSmsArr as $key => $value) {

                    if (array_key_exists($key, $sendSms->sms_response)) {
                        $data = [
                            't_id' => $sendSms->sms_response[$key]['transactionId'],
                            'nubmer' => $value
                        ];
                    }
                    array_push($tIdArr, $data);

                }
                \App\SendSmsNumber::insert($tIdArr);
            }
        }
    }
}
