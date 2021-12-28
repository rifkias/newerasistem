<?php
namespace App\Res;

use Response,Auth,Session;
use App\Models\ApiLog;

/* 
error status code
	200	success
	404	Not Found (page or other resource doesn’t exist)
	401	Not authorized (not logged in)
	403	Logged in but access to requested area is forbidden
	400	Bad request (something wrong with URL or parameters)
	422	Unprocessable Entity (validation failed)
	500	General server error
*/

class IndexRes
{
	public static function resultData($code='200' , $datas=null, $errors=null){ 
		return response()
		->json(['status'=>$code ,'datas' => $datas, 'errors' => $errors])
		->setStatusCode($code)
		->withHeaders(['Content-Type' => 'application/json',]);
    } 
     
	public static function insertLog($hostname,$channel,$message,$level_name,$context,$url){
		$insert = [
            'instance'    => $hostname,
            'channel'     => $channel,
            'message'     => $message,
            'level'       => $level_name,
            'context'     => $context,
            'url'         => $url,
            'ip'          => app('request')->server('REMOTE_ADDR'),
            'user_agent'  => app('request')->server('HTTP_USER_AGENT')
        ];

        ApiLog::create($insert);
	}
 
	
    public static function sendEmail($subject,$content,$attachment=array()){
        // $to = array('nugroho.aditya@8commerce.com','operation@8commerce.com');
        $to = array('nugroho.aditya@8commerce.com');
            Mail::to($to)->send(new OmsEmailNotification($subject,$content ,$attachment));
            try {
                return response()->json("Email Sent!");
            } catch (\Exception $e) {
                return response()->json($e->getMessage());
            }
    }
	 
	
    public static function addErrorIssue($module,$status,$response,$message,$param1=''){
        $log = new Log;
        $log->module        	= $module;
        $log->status			= $status;
        $log->response			= $response;
        $log->message			= $message;
        $log->fixed 			= 0;
        $log->param1    		= $param1;
        $log->ip    		    = '127.0.0.1';
        $log->save();
    }
    
     
	public static function wrongChar($data){
		$string = strtolower($data);
		$wrongChar = array('kota ','kab ', 'kab. ','kepulauan ', 'daerah ','kabupaten '); 
		$split = str_replace($wrongChar,'',$string);
		return $split;
    }

    
	
	public static function cleanString($string){
		$string = IndexRes::IsNullOrEmptyString($string);
		$string = str_replace(array('[\', \']'), '', $string);
		$string = preg_replace('/\[.*\]/U', '', $string);
		$string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
		$string = htmlentities($string, ENT_COMPAT, 'utf-8');
		$string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
		$string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , ' ', $string); 
		$string = strtoupper(trim($string, ' ')); 
		if($string == false){
			return '-';  		
		}else{
			return $string;  			
		}
	}
	
	public static function IsNullOrEmptyString($str){
		if((!isset($str) || trim($str) === '')){ 
			return '-';
		}else{
			return $str	;
		}
    }


    public static function isBase64Encoded($str){
        try
        {
            $decoded = base64_decode($str, true);
    
            if ( base64_encode($decoded) === $str ) {
                return $decoded;
            }else{
                return false;
            }
        }catch(Exception $e){
            // If exception is caught, then it is not a base64 encoded string
            return false;
        }
    
    }

    public static function isExplode($str){
        try
        {
            if(strpos($str, ':') !== false) {
                return explode(':', $str);
            } else {
                return false;
            }
        }catch(Exception $e){
            return false;
        }
    
    }
}