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
    		$request = NULL;
    		$reply = NULL;
    		$status = NULL;
    		$upImage = NULL;

	    	$client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
	            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
	        ]);
	        // $request = new \Phuvo\CustomGrpc\Helloworld\AddUserRequest();
         //    $request->setName($req->tenNguoiDung);
         //    $request->setAge($req->tuoi);
         //    $request->setEmail($req->email);
         //    if($req->anhDaiDien)
         //    {
         //    	$upImage = new \Phuvo\CustomGrpc\Helloworld\FileUpload();
         //    	$upImage->setName($req->tenFile);
         //    	$upImage->setExtension($req->duoiFile);
         //    	$upImage->setBase64($req->anhDaiDien);
	        //     $request->setImage($upImage);
         //    }
         //    list($reply,$status) = $client->AddUser($request)->wait();
         //    if($reply->getCode() != 1000)
         //    	throw new \Exception('Thêm người dùng thất bại');
            return response()->json(array('flag' => TRUE, 'id' => $reply->getId()));
    	}
    	catch(\Exception $err)
    	{
    		return response()->json(array('flag' => FALSE,  'error' => $err->getMessage()));
    	}
    }
}
