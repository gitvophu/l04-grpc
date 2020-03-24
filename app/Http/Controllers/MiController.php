<?php

namespace App\Http\Controllers;

use GPBMetadata\Helloworld;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Phuvo\CustomGrpc\Helloworld\HelloRequest;

class MiController extends Controller
{
    protected $view_data = [];
    const API_HOST = '192.168.1.27:50051';
    function getListDistributor(){
        $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
        $request = new \Phuvo\CustomGrpc\Helloworld\GetNppListRequest();
        list($reply,$status) = $client->GetNppList($request)->wait();
        
        $message = $reply->getMessage();
        $list_distributors = json_decode($message,true);
        return view('distributors.index',compact('list_distributors'));
    }


    function addDistributorStore(Request $req, $id=null){
        
        $validator = Validator::make($req->all(),[
            'txtName'=>'required|max:255',
            'txtAge'=>'required|numeric|min:1',
            'txtEmail'=>'required|email'
        ],[
            'txtName.required'=>'Không được bỏ trống tên npp',
            'txtName.max'=>'Tên npp tối đa 255 ký tự',
            'txtAge.required'=>'Tuổi npp không được bỏ trống',
            'txtAge.numeric'=>'Tuổi npp phải là số',
            'txtAge.min'=>'Tuổi npp phải lớn hơn hoặc bằng 1',
            'txtEmail.required'=>'Không được bỏ trống email',
            'txtEmail.email'=>'Email Không đúng định dạng',
        ]);
        $data = $req->all();
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        
        $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
        $response = [];
        if(empty($id)){
            $request = new \Phuvo\CustomGrpc\Helloworld\AddNppRequest();
            $request->setName($data['txtName']);
            $request->setAge($data['txtAge']);
            $request->setEmail($data['txtEmail']);
            list($reply,$status) = $client->AddNpp($request)->wait();
            $response['message'] = $reply->getMessage();
            $response['code'] = $reply->getCode();
            $response['id'] = $reply->getId();
        }
        // else{
        //     // kiem tra id co ton tai hay khong
        //     $request = new \Phuvo\CustomGrpc\Helloworld\ShowProductRequest();
        //     $request->setId($id);
        //     list($reply,$status) =  $client->ShowProduct($request)->wait();
        //     $response = [];
        //     $response['code'] = $reply->getCode();
        //     // $response['message'] = $reply->getMessage();
        //     // $response['id'] = $reply->getCode();
        //     // $response['name'] = $reply->getName();
        //     // $response['price'] = $reply->getPrice();
        //     if ($response['code'] != 1000) {
        //         return back()->withErrors('code_err','Xảy ra lỗi, sản phẩm này không tồnn tại');
        //     }
        //     $updateRequest = new \Phuvo\CustomGrpc\Helloworld\AddProductRequest();
        //     $updateRequest->setId($id);
        //     $updateRequest->setName($data['txtName']);
        //     $updateRequest->setPrice($data['txtPrice']);
        //     list($reply,$status) = $client->AddProduct($updateRequest)->wait();
            
        //     $response['code'] = $reply->getCode();
        //     $response['message'] = $reply->getMessage();
        //     $response['id'] = $reply->getId();
            
        // }
        if($response['code'] != 1000){
            $validator->errors()->add('code_err','Xảy ra lỗi, Server không thể thêm npp');
            return back()->withErrors($validator)->withInput();
        }
        return back()->with('success','Thêm/cập nhật npp thành công');
    }

    function addDistributor($id = null){
        $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
        if(!empty($id)){
            // kiem tra id co ton tai hay khong
            $request = new \Phuvo\CustomGrpc\Helloworld\ShowProductRequest();
            $request->setId($id);
            list($reply,$status) =  $client->ShowProduct($request)->wait();
            $response = [];
            $response['code'] = $reply->getCode();
            $response['message'] = $reply->getMessage();
            $response['id'] = $reply->getId();
            $response['name'] = $reply->getName();
            $response['price'] = $reply->getPrice();
            if($response['code'] != 1000){
                return view('products.product_add')->withErrors(['code.err'=>'Xảy ra lỗi, phía server ko thể lấy dữ liệu']);
            }
            $this->view_data['product'] = [
                'id'=>$response['id'],
                'name'=>$response['name'],
                'price'=>$response['price'],
            ];
            return view('products.product_add',$this->view_data);
        }
        return view('distributors.add');
    }
    function deleteDistributor(Request $request,$id){
        
        $validator = Validator::make([],[],[]);
        if(empty($id)){
            $validator->errors()->add('id.required','id không được bỏ trống');
        }
        if($id < 0){
            $validator->errors()->add('id.min','id phải lớn hơn 0');
        }
        if($validator->fails()){
            return redirect()->route('listDistributor')->withErrors($validator)->withInput();
        }
        $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient(self::API_HOST, [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
        $deleteRequest = new \Phuvo\CustomGrpc\Helloworld\DeleteNppRequest();
        $deleteRequest->setId($id);
        list($reply,$status) = $client->DeleteNpp($deleteRequest)->wait();
        if ($reply->getCode() != 1000) {
            $validator->errors()->add('code_err',$reply->getMessage());
            return redirect()->route('listDistributor')->withErrors($validator)->withInput();
        }
        return redirect()->route('listDistributor')->with('success','Đã xóa sản phẩm thành công');
    }
}
