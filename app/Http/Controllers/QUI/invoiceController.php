<?php

namespace App\Http\Controllers\QUI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class invoiceController extends Controller
{
    const API_HOST = '192.168.1.27:50051';

    public function laydanhSachHoaDon()
    {
    	try
    	{
	    	$client = NULL;
			$request = NULL;
			$reply = NULL;
			$status = NULL;
			$user = NULL;
			$danhSachHoaDon = array();
			$_hoaDon = NULL;
			$tongSanPham = 0;
			$replySanPham = NULL;
			$danhSachKhachHang = NULL;

		    $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
		        'credentials' => \Grpc\ChannelCredentials::createInsecure(),
		    ]);
		    $request = new \Phuvo\CustomGrpc\Helloworld\GetOrderListRequest();
		    list($reply,$status) = $client->GetOrderList($request)->wait();
		    foreach($reply->getOrder() as $hoaDon)
		    {
		    	$_hoaDon = new \stdClass();
		    	$_hoaDon->id = $hoaDon->getId();
		    	$_hoaDon->khachHang = $hoaDon->getUser()->getName();
		    	$_hoaDon->dienThoai = $hoaDon->getPhone();
		    	$_hoaDon->diaChi = $hoaDon->getAddress();
		    	$tongSanPham = 0;
		    	foreach($hoaDon->getOrderDetail() as $hoaDonChiTiet)
		    		$tongSanPham += $hoaDonChiTiet->getQuantity();
		    	$_hoaDon->tongSanPham = number_format($tongSanPham);
		    	$_hoaDon->tongTien = number_format($hoaDon->getTotalPrice());
		    	$_hoaDon->ghiChu = $hoaDon->getNote();;
		    	$danhSachHoaDon[] = $_hoaDon;
		    }
		    $request = new \Phuvo\CustomGrpc\Helloworld\GetUserListRequest();
		    list($reply,$status) = $client->GetUserList($request)->wait();
		    $danhSachKhachHang = json_decode($reply->getMessage(), TRUE);
		    $request = new \Phuvo\CustomGrpc\Helloworld\GetProductListRequest();
		    list($replySanPham,$status) = $client->GetProductList($request)->wait();
		    return view('QUI.invoices', ['danhSachHoaDon' => $danhSachHoaDon, 'danhSachKhachHang' => compact('danhSachKhachHang'), 'danhSachSanPham' => $replySanPham->getProducts()]);
    	}
    	catch(\Exception $err)
    	{
    		echo $err->getMessage();
    	}
    }

    public function themHoaDon(Request $req)
    {
    	try
    	{
    		$client = NULL;
    		$reply = NULL;
    		$status = NULL;
    		$order = NULL;
    		$orderInfor = NULL;
    		$orderInforDetails = NULL;
    		$danhSachSanPham = json_decode($req->dsSanPham);
    		$danhSachSanPhamPush = [];
    		$_sanPham = NULL;

	    	$client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
	            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
	        ]);
	        $order = new \Phuvo\CustomGrpc\Helloworld\AddOrderRequest();
	        $orderInfor = new \Phuvo\CustomGrpc\Helloworld\AddOrderInfo();

	        $orderInfor->setUserId($req->khachHang);
	        $orderInfor->setPhone($req->soDienThoai);
	        $orderInfor->setAddress($req->diaChi);
	        $orderInfor->setNote($req->ghiChu);
	        $orderInfor->setStatus($req->trangThai);
	        foreach($danhSachSanPham as $sanPham)
	        {
		        $orderInforDetails = new \Phuvo\CustomGrpc\Helloworld\AddOrderDetailInfo();
		        $orderInforDetails->setProductId($sanPham->id);
		        $orderInforDetails->setQuantity($sanPham->soLuong);
		        $danhSachSanPhamPush[] = $orderInforDetails;
	        }
	        
	        $orderInfor->setAddOrderDetailInfo($danhSachSanPhamPush);
            $order->setAddOrderInfo($orderInfor);
            list($reply,$status) = $client->AddOrder($order)->wait();
            if($reply->getCode() != 1000)
            	throw new \Exception('Thêm hoá đơn thất bại');
            return response()->json(array('flag' => TRUE, 'id' => $reply->getId()));
    	}
    	catch(\Exception $err)
    	{
    		return response()->json(array('flag' => FALSE,  'error' => $err->getMessage(), 'line' => $err->getLine()));
    	}
    }

    public function layThongTinCapNhat(Request $req)
    {
   //  	try
   //  	{
	  //   	$client = NULL;
			// $request = NULL;
			// $reply = NULL;
			// $status = NULL;
			// $user =  NULL;

	  //       $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
	  //           'credentials' => \Grpc\ChannelCredentials::createInsecure(),
	  //       ]);
	  //       $request = new \Phuvo\CustomGrpc\Helloworld\Order();
	  //       $request->setId($req->id);
	  //       list($reply,$status) =  $client->ShowUser($request)->wait();
	  //       if($reply->getCode() != 1000)
	  //           throw new \Exception('Người dùng không tồn tại');
	  //       $user = new \stdClass();
	  //       $user->tenNguoiDung = $reply->getName();
	  //       $user->tuoi = $reply->getAge();
	  //       $user->email = $reply->getEmail();
	  //       return response()->json(array('flag' => TRUE,  'user' => $user));
	  //   }
   //  	catch(\Exception $err)
   //  	{
   //  		return response()->json(array('flag' => FALSE,  'error' => $err->getMessage()));
   //  	}
    }
    
    public function xoaHoaDon(Request $request){
    	try
    	{
    		$client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),]);
	        $deleteRequest = new \Phuvo\CustomGrpc\Helloworld\DeleteOrderRequest();
	        $deleteRequest->setOrderId($request->id);
	        list($reply,$status) = $client->DeleteOrder($deleteRequest)->wait();
	        if($reply->getCode() != 1000)
            	throw new \Exception('Xoá hoá đơn thất bại');
            return response()->json(array('flag' => TRUE));
    	}
    	catch(\Exception $err)
    	{
    		return response()->json(array('flag' => FALSE,  'error' => $err->getMessage()));
    	}
    }
}
