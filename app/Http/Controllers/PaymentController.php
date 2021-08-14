<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Transaction;
use App\Logger;
use App\MembershipType;
use App\MembershipRegistration;
use Carbon\Carbon;

class PaymentController extends Controller
{

    public function doPayment(Request $request)
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'user_id' 				=> 'required',
			'start_at' 				=> 'required',
			'end_at' 				=> 'required',
			'membership_type_id' 	=> 'required',
			'price' 				=> 'required',
			'is_paid' 				=> 'required',
			'transaction_id' 		=> 'required',
			'transactionId' 		=> 'required',
		);

			$messages = array(
			'required' => '<i class="fa fa-remove fa-fw"></i> عفوا ، هذا الحقل مطلوب',
			'same' => '<i class="fa fa-remove fa-fw"></i> عفوا ، كلمتي المرور التي أدخلتهما غير متطابقتين',
			'email' => '<i class="fa fa-remove fa-fw"></i> عفوا ، الرجاء ادخال بريد إلكتروني صحيح',
			'unique' => '<i class="fa fa-remove fa-fw"></i> عفوا ، اسم المستخدم الذي اخترته غير متاح الرجاء اختيار اسم آخر',
			'alpha' => '<i class="fa fa-remove fa-fw"></i> عفوا ، يجب استخدام الحروف الهجائية فقط',
			'numeric' => '<i class="fa fa-remove fa-fw"></i> عفوا ، هذا الحقل يقبل أرقاماً فقط',
			'integer' => '<i class="fa fa-remove fa-fw"></i> عفوا ، قيم هذا الحقل يجب أن تكون أرقاماً فقط'
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make($request->all(), $rules, $messages);

		// if the validator fails, redirect back to the form
		// if ($validator->fails()) {
		// 	//echo $request->input('username');
		// 	return "Error".$request->input('company');
		// 	return Redirect::to('newSite/NUePayService/mobileTopUp')
		// 		->withErrors($validator) // send back all errors to the login form
		// 		->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		// } else {

			// create our user data for the authentication
			$membership_type = MembershipType::where('id', $request->input('membership_type_id'))->first();

			$start_at = date('Y-m-d', strtotime(date('Y-m-d')));
			$end_at = Carbon::parse($start_at)->addMonth($membership_type->months)->addDay();
			$end_at->toDateTimeString();
			$price = $membership_type->price;

			$userdata = array(
				'mobileNo'  => $request->input('mobileNo'),
				'company'  => $request->input('company'),
				'amount'  => $request->input('amount')
			);
				//return View::make('login')->with(array('loginError' => true));

				// $log = new KLogger ( "log.log" , KLogger::DEBUG );
				 
				$syber_url = "https://syberpay.test.sybertechnology.com/syberpay/getUrl";
				$applicationId = 'SDth3r@pyNT00176';
				$payeeId = '0010040001';
				$serviceId = 'SDth3r@pyNTW36300255';
				$customerRef  = date('Y-m-d_H:i:s');
				$currency = 'SDG';
				$amount = $price;//$request->input('amount');
				$key = 'mcIsyjlbdE'; 
				$salt = 'i0tipFfaru'; 
				$paymentInfo = [
                    "accountNo"     => "123456",
                    "customerName"  => "Mohammed Ahmed",
                    "serviceType"   => "123"
                ];

				$hash = hash('sha256',$key .'|'.$applicationId  .'|'.$serviceId  .'|'.$amount  .'|'.$currency  .'|'.$customerRef .'|'. $salt);
				$syber_args = array ("applicationId" => $applicationId, "serviceId" => $serviceId, "amount" => $amount, "currency" => 'SDG' , "customerRef" => $customerRef , "paymentInfo" => $paymentInfo, "hash" => $hash);
				$syber_args_json = json_encode($syber_args);
				// $log->LogDebug("getPaymentURL Request:$syber_args_json");
				// echo "Syber Args = $syber_args_json";
				// echo "<br />";
				// echo "<hr />";



				function syber_getPaymentURL ($url,$json_data){
				   $headers    = array ('Content-Type: application/json', 'Accept: application/json' );
						
				   $ch = curl_init();
				   // Set the url, number of POST vars, POST data
				   curl_setopt($ch, CURLOPT_URL, $url);
				   curl_setopt($ch, CURLOPT_POST, true);
				   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

				   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				   curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

				   // Execute post
				   $json_response = curl_exec($ch);
				   curl_close($ch);

				   return $json_response;
				}				
				
				$results = syber_getPaymentURL($syber_url,$syber_args_json);

				// $log->LogDebug("getPaymentURL Response:$results");

				$results_decoded = json_decode($results, true);
				// print_r($results_decoded);

				$SP_timeStamp = $results_decoded['tranTimestamp'];
				$SP_responseCode = $results_decoded['responseCode'];
				$transactionId = $results_decoded['transactionId'];

				$membership_registration_data = [
					'user_id' 				=> auth()->guard('user')->user()->id,
					'start_at' 				=> $start_at,
					'end_at' 				=> date('Y-m-d', strtotime($end_at)),
					'membership_type_id' 	=> $request->input('membership_type_id'),
					'price' 				=> $price,
					'is_paid' 				=> 0,
					'transactionId' 		=> $transactionId,
				];

				echo "<br />";
				echo "<hr />";
				if($SP_responseCode==1){
					MembershipRegistration::create($membership_registration_data);
					return redirect()->away($results_decoded['paymentUrl']);
					// echo "<a href='".$results_decoded['paymentUrl']."'>Payment URL</a><br />";
				}else{
					echo "SyberPay is not Happy :(:";
					echo "<ul><li><b>Response Code:".$results_decoded['responseCode']."</b></li>";
					echo "<li>Response Message:".$results_decoded['responseMessage']."</li></ul>";
				}
				
		// }
	}

	function syber_getPaymentStatus($url,$tranID,$appID){
		$txt = '';
		// $log = new KLogger ( "log2.log" , KLogger::DEBUG );
		$hash_mtos =  hash('sha256', 'mcIsyjlbdE' .'|'.$appID  .'|'.$tranID  .'|'. 'i0tipFfaru');
		$syber_args = array ("transactionId" => $tranID, "applicationId" => $appID, "hash" => $hash_mtos);
		$headers    = array ('Content-Type: application/json', 'Accept: application/json' );
		$data = json_encode($syber_args);
		
		$ch = curl_init();
		// Set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		// Execute post
		$data_in = curl_exec($ch);
		if(curl_errno($ch)){
			// $log->LogDebug("Curl error:".curl_error($ch));
		}
		curl_close($ch);
		
		$data_decoded = json_decode($data_in, true);
		$response_code = $data_decoded['responseCode'];
		$payment = $data_decoded['payment'];
		return $data_decoded;
		// $log->LogDebug("getPaymentStatus Response: $data_in");
		if( $response_code == 1){
			return true;
			//update database records
			// $log->LogInfo("Transaction Success");
		}else{
			// $log->LogError("Transaction Failure");
			return false;
		}
	}

	public function notify2(Request $request){
		// $log = new KLogger ( "log2.log" , KLogger::DEBUG );
		// $logger = new Logger;
		// $logger->txt = json_encode($request->all());
		// $logger->save();
		$applicationId = 'SDth3r@pyNT00176';
		$syber_url = "https://syberpay.test.sybertechnology.com/syberpay/payment_status";

		// $transactionId = isset($_POST['transactionId']) ? $_POST['transactionId'] : "";
		// $token = isset($_POST['token']) ? $_POST['token'] : "";
		// $hash = isset($_POST['hash']) ? $_POST['hash'] : "";
		$transactionId = $request->input('transactionId');
		$token = $request->input('token');
		$hash = $request->input('hash');

		// $results = $this->syber_getPaymentStatus($syber_url,$transactionId,$applicationId);
		//    //UPDATEDB accordingly
		//    $logger = new Logger;
		//    $logger->txt = $results;
		//    $logger->save();

		// $logger = new Logger;
		// $logger->txt = $transactionId.' - '.$token.' - '.$hash;
		// $logger->save();

		if(empty($transactionId)){
			echo "REALLY DUDE<br />";
			exit(0);
		}

		$hash_stom = hash('sha256', 'mcIsyjlbdE' .'|'.$transactionId  .'|'.$token  .'|'.'i0tipFfaru');

		// Logging
		$txt = '';
		$txt .= "<br> transactionId = $transactionId";
		$txt .= "<br> hash_stom = $hash_stom";
		$txt .= "<br> hash = $hash";
		$txt .= "<br> token = $token";

		if ($hash_stom == $hash) {
			$results = $this->syber_getPaymentStatus($syber_url,$transactionId,$applicationId);
			//UPDATEDB accordingly
			$resposeArray = json_decode($results);

		   	$logger = new Logger;
			$logger->txt = $results;
			$logger->save();

		   	$logger = new Logger;
			$logger->txt = json_encode($request->all());
			$logger->save();

			$transaction = new Transaction;
			$transaction->user_id = auth()->guard('user')->user()->id;
			$transaction->amount = $resposeArray->amount;
			$transaction->transactionId = $resposeArray->transactionId;
			$transaction->save();

		}else{
			$txt = "<br> Authentication Failure: Wrong Hash";
		}

	}
	
	public function notify(Request $request){
		$logger = new Logger;
		// $logger->paymentData('assssasaas');
		$logger->paymentData = json_encode($request->all());
		$logger->save();

		$applicationId = 'SDth3r@pyNT00176';
		$syber_url = "https://syberpay.test.sybertechnology.com/syberpay/payment_status";

		$transactionId = $request->input('transactionId');
		$token = $request->input('token');
		$hash = $request->input('hash');

		if(empty($transactionId)){
			echo "REALLY DUDE<br />";
			exit(0);
		}

		$hash_stom = hash('sha256', 'mcIsyjlbdE' .'|'.$transactionId  .'|'.$token  .'|'.'i0tipFfaru');

		// Logging
		$txt = '';
		$txt .= "<br> transactionId = $transactionId";
		$txt .= "<br> hash_stom = $hash_stom";
		$txt .= "<br> hash = $hash";
		$txt .= "<br> token = $token";

		if ($hash_stom == $hash) {
			$results = $this->syber_getPaymentStatus($syber_url,$transactionId,$applicationId);
			//UPDATEDB accordingly
			// $resposeArray = json_decode($results);

			$membership_registration = MembershipRegistration::where('transactionId',$transactionId)->first();

			$transaction_db_data = [
				'user_id' => auth()->guard('user')->user()->id,
				'amount' => $results['payment']['amount'],
				'transactionId' => $results['payment']['transactionId']
			];

			// dd($results);
			
			$loggerData = [
				'user_id' => auth()->guard('user')->user()->id,
				'transactionId' => $results['transactionId'],
				'applicationId' => $results['applicationId'],
				'paymentTranTimestamp' => $results['payment']['tranTimestamp'],
				'tranTimestamp' => $results['tranTimestamp'],
				'amount' => $results['payment']['amount'],
				'customerRef' => $results['payment']['customerRef'],
				'status' => $results['status'],
				'responseCode' => $results['responseCode'],
				'responseMessage' => $results['responseMessage'],
				'paymentData' => json_encode($results['payment']),
				'hash' => $results['hash'],
			];

			// dd($loggerData);
			
			$logger = Logger::create( $loggerData );
			
			$transaction = Transaction::create($transaction_db_data);

			$membership_registration->is_paid = 1;
			$membership_registration->transaction_id = $transaction->id;
			$membership_registration->save();

		}else{
			$txt = "<br> Authentication Failure: Wrong Hash";
		}

	}
	
	public function status(){
		return View::make('site.mobileTopUpSuccess');
	}

	public function notify1(Request $request){
		$applicationId = 'SDth3r@pyNT00176';
		$syber_url = "https://syberpay.test.sybertechnology.com/syberpay/payment_status";

		$transactionId = $request->input('transactionId');
		$token = $request->input('token');
		$hash = $request->input('hash');

		$logger = new Logger;
		$logger->txt = $transactionId.' - '.$token.' - '.$hash;
		$logger->save();
	}
	
	public function doCancel(Request $request){
		return redirect()->route('userAccount.payment')->withInput(['paymentCancelled' => true]);
	}

	public function doReturn(Request $request){

		$membership_reg = MembershipRegistration::where('user_id', auth()->guard('user')->user()->id)->orderBy('id','desc')->first();
		$transactionId = $membership_reg->transactionId;
		$applicationId = 'SDth3r@pyNT00176';
		$syber_url = "https://syberpay.test.sybertechnology.com/syberpay/payment_status";

		$logger = new Logger;
		// $logger->paymentData('assssasaas');
		$logger->paymentData = json_encode($request->all());
		$logger->save();



			$results = $this->syber_getPaymentStatus($syber_url,$transactionId,$applicationId);
			//UPDATEDB accordingly
			// $resposeArray = json_decode($results);
			$membership_registration = MembershipRegistration::where('transactionId',$transactionId)->first();


			if(auth()->guard('user')->user()->memberships()->where('is_paid',1)->count() > 0){
				$desc = "تجديد العضوية";
			}else{
				$desc = "عضوية جديدة";
			}

			$transaction_db_data = [
				'user_id' => auth()->guard('user')->user()->id,
				'amount' => $results['payment']['amount'],
				'desc' => $desc,
				'transactionId' => $results['payment']['transactionId']
			];

			// dd($results);
			
			$loggerData = [
				'user_id' => auth()->guard('user')->user()->id,
				'transactionId' => $results['transactionId'],
				'applicationId' => $results['applicationId'],
				'paymentTranTimestamp' => $results['payment']['tranTimestamp'],
				'tranTimestamp' => $results['tranTimestamp'],
				'amount' => $results['payment']['amount'],
				'customerRef' => $results['payment']['customerRef'],
				'status' => $results['status'],
				'responseCode' => $results['responseCode'],
				'responseMessage' => $results['responseMessage'],
				'paymentData' => json_encode($results['payment']),
				'hash' => $results['hash'],
			];

			// dd($loggerData);
			
			$logger = Logger::create( $loggerData );
			
			$transaction = Transaction::create($transaction_db_data);

			$membership_registration->is_paid = 1;
			$membership_registration->transaction_id = $transaction->id;
			$membership_registration->save();

			// MembershipRegistration::where('user_id',auth()->guard('user')->user()->id)->where('is_paid',0)->destroy();

			return redirect()->route('userAccount');

	}
	
	// public function doReturn(Request $request){
	// 	return redirect()->route('userAccount');
	// }

}