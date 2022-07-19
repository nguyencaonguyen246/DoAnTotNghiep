<?php 
    require_once './public/vendor2/autoload.php'; 
    use Twilio\Rest\Client;
class SMSModel{

    public $twilio;
    protected $sid    = "AC71ae3891032f7ecf551c8c73e477370a"; 
    protected $token  = "bd95c2ccf7b38a4f7b10d1f88e9c31d4";
    //$number, $body
    function SendSMS($sdt, $txt){
        // require_once 'C:\xampp\htdocs\xoxo\vendor\autoload.php';        
        // $twilio = new Twilio\Rest\Client($sid, $token);
        // $sdt = "84945 974 255";
        $sdt = trim($sdt);
        if(substr($sdt, 0, 1) == '0')
        {
            $sdt = "84".substr($sdt, 1, 11);
        }
        
        
        $sid    = "AC71ae3891032f7ecf551c8c73e477370a"; 
        $token  = "bd95c2ccf7b38a4f7b10d1f88e9c31d4"; 
        $twilio = new Client($sid, $token); 
        $message = $twilio->messages 
                        // ->create($number, // to 
                        //         array(  
                        //             "messagingServiceSid" => "MG30dd121deaf193b6d938ff453c483546",      
                        //             "body" => $body 
                        //         ) 
                        ->create($sdt, // to 
                           array(  
                               "messagingServiceSid" => "MG30dd121deaf193b6d938ff453c483546",      
                               "body" => $txt
                            //    "Capcuudienthoai.vn cám ơn A PO đã su dung dich vu cua QT, LH ho tro qua hotline:0945974255" 
                           ) 
                        ); 
        
        return($message->sid);
    }

}
?>