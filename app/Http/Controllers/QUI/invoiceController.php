<?php

namespace App\Http\Controllers\QUI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class invoiceController extends Controller
{
    const API_HOST = '192.168.1.27:50051';

    public function layDanhSachNguoiDung()
    {
    	try
    	{
	    	$client = NULL;
			$request = NULL;
			$reply = NULL;
			$status = NULL;
			$message = NULL;
			$danhSachNguoiDung = NULL;

		    $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
		        'credentials' => \Grpc\ChannelCredentials::createInsecure(),
		    ]);
		    $request = new \Phuvo\CustomGrpc\Helloworld\GetUserListRequest();
		    list($reply,$status) = $client->GetUserList($request)->wait();
		    $message = $reply->getMessage();
		    $danhSachNguoiDung = json_decode($message,true);
		    return view('users.users',compact('danhSachNguoiDung'));
    	}
    	catch(\Exception $err)
    	{
    		echo $err->getMessage();
    	}
    }
}
