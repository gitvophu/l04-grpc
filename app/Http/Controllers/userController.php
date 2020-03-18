<?php

namespace App\Http\Controllers;

use GPBMetadata\Helloworld;
use Illuminate\Http\Request;
use Phuvo\CustomGrpc\Helloworld\HelloRequest;

class userController extends Controller
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

    public function themNguoiDung(Request $req)
    {
    	try
    	{
    		$client = NULL;
    		$request = NULL;
    		$reply = NULL;
    		$status = NULL;
    		$upImage = NULL;

	    	$client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
	            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
	        ]);
	        $request = new \Phuvo\CustomGrpc\Helloworld\AddUserRequest();
            $request->setName($req->tenNguoiDung);
            $request->setAge($req->tuoi);
            $request->setEmail($req->email);
            if($req->anhDaiDien)
            {
            	$upImage = new \Phuvo\CustomGrpc\Helloworld\FileUpload();
            	$upImage->setName($req->tenFile);
            	$upImage->setExtension($req->duoiFile);
            	$upImage->setBase64($req->anhDaiDien);
	            $request->setImage($upImage);
            }
            list($reply,$status) = $client->AddUser($request)->wait();
            if($reply->getCode() != 1000)
            	throw new \Exception('Thêm người dùng thất bại');
            return response()->json(array('flag' => TRUE, 'id' => $reply->getId()));
    	}
    	catch(\Exception $err)
    	{
    		return response()->json(array('flag' => FALSE,  'error' => $err->getMessage()));
    	}
    }

    public function layThongTinCapNhat(Request $req)
    {
    	try
    	{
	    	$client = NULL;
			$request = NULL;
			$reply = NULL;
			$status = NULL;
			$user =  NULL;

	        $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
	            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
	        ]);
	        $request = new \Phuvo\CustomGrpc\Helloworld\ShowUserRequest();
	        $request->setId($req->id);
	        list($reply,$status) =  $client->ShowUser($request)->wait();
	        if($reply->getCode() != 1000)
	            throw new \Exception('Người dùng không tồn tại');
	        $user = new \stdClass();
	        $user->tenNguoiDung = $reply->getName();
	        $user->tuoi = $reply->getAge();
	        $user->email = $reply->getEmail();
	        return response()->json(array('flag' => TRUE,  'user' => $user));
	    }
    	catch(\Exception $err)
    	{
    		return response()->json(array('flag' => FALSE,  'error' => $err->getMessage()));
    	}
    }

    public function capNhatNguoiDung(Request $req)
    {
    	try
    	{
	    	$client = NULL;
			$request = NULL;
			$reply = NULL;
			$status = NULL;
			$updateRequest = NULL;
			$response = [];
    		$upImage = NULL;

	        $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
	            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
	        ]);
	        $request = new \Phuvo\CustomGrpc\Helloworld\ShowUserRequest();
	        $request->setId($req->id);
	        list($reply,$status) =  $client->ShowUser($request)->wait();
	        if($reply->getCode() != 1000)
	            throw new \Exception('Người dùng không tồn tại');
	        $updateRequest = new \Phuvo\CustomGrpc\Helloworld\AddUserRequest();
	        $updateRequest->setId($req->id);
	        $updateRequest->setName($req->tenNguoiDung);
	        $updateRequest->setAge($req->tuoi);
	        $updateRequest->setEmail($req->email);
	        if($req->anhDaiDien)
            {
            	$upImage = new \Phuvo\CustomGrpc\Helloworld\FileUpload();
            	$upImage->setName($req->tenFile);
            	$upImage->setExtension($req->duoiFile);
            	$upImage->setBase64($req->anhDaiDien);
	            $request->setImage($upImage);
            }
	        list($reply,$status) = $client->AddUser($updateRequest)->wait();
	        if($reply->getCode() != 1000)
	            throw new \Exception('Cập nhật người dùng thất bại');
	        return response()->json(array('flag' => TRUE));
	    }
    	catch(\Exception $err)
    	{
    		return response()->json(array('flag' => FALSE,  'error' => $err->getMessage()));
    	}
    }

    public function xoaNguoiDung(Request $request){
    	try
    	{
    		$client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),]);
	        $deleteRequest = new \Phuvo\CustomGrpc\Helloworld\DeleteUserRequest();
	        $deleteRequest->setId($request->id);
	        list($reply,$status) = $client->DeleteUser($deleteRequest)->wait();
	        if($reply->getCode() != 1000)
            	throw new \Exception('Xoá người dùng thất bại');
            return response()->json(array('flag' => TRUE));
    	}
    	catch(\Exception $err)
    	{
    		return response()->json(array('flag' => FALSE,  'error' => $err->getMessage()));
    	}
    }
}
