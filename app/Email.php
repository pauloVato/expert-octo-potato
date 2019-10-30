<?php 
namespace App;
require "../vendor/autoload.php";
use Faker\Factory;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Carbon\Carbon;
class Email{ 

	protected $emailAddress;
	protected $sent;
	protected $failed;
	protected $total;

	public function __construct($emailAddress){
		$this->emailAddress=$emailAddress;
	}
	
	public function getSent() {
		return $this->sent;
	}


	public function getFailed() {
		return $this->failed;
	}


	public function getAddress(){
		return $this->emailAddress;
	}
	public function filter($str){
		$json = explode(',', $str);	
		return $json;
	}
	public function sort($arrayEmails){
		sort($arrayEmails);
		return $arrayEmails;
	}

	public function extractInfo($sent,$failed,$total){
		/*
		$sent_arrayLogs=file($_SERVER['DOCUMENT_ROOT']. '\storage\logs\sent.log');
		$sentEmails = count($sent_arrayLogs);
		$fail_arrayLogs=file($_SERVER['DOCUMENT_ROOT']. '\storage\logs\fail.log');
		$failedEmails = count($fail_arrayLogs);
		$this->sent = $sentEmails;
		$this->failed=$failedEmails;
		$this->total=$sentEmails+$failedEmails;
		$stringFinal = array('emails'=>$this->total,'emails_sent'=>$this->sent,'emails_fail'=>$this->failed);
		if($flag == 1){
			return $stringFinal;
		}
		*/
		$stringFinal = array('emails'=>$total,'emails_sent'=>$sent,'emails_fail'=>$failed);
		$stringJSON = json_encode($stringFinal);
		return $stringJSON;
		
	}

	
	public function send($subject,$body){
		$faker = Factory::create();
		$faker=$faker->boolean;
		$log = new Logger('Log');
		setlocale(LC_TIME, config('app.locale'));
		$date = Carbon::now()->format('H');
		if($faker==true){
			$log->pushHandler(new StreamHandler($_SERVER['DOCUMENT_ROOT'].'\storage\logs\sent.log',Logger::DEBUG));
			$log->log(Logger::INFO," ".$date." Hora(s) ".$this->emailAddress." ".$subject."		");
			$this->sent=$this->sent + 1;
			echo "true  {".$this->sent."}~~";

		}else{
			$log->pushHandler(new StreamHandler($_SERVER['DOCUMENT_ROOT'].'\storage\logs\fail.log',Logger::DEBUG));
			$log->log(Logger::INFO," ".$date." Hora(s) ".$this->emailAddress." ".$subject."		");
			$this->failed=$this->failed +1;
			echo "false  {".$this->failed."}~~";
		}

	}

}
