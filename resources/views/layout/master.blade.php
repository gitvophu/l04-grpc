<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="_token" content="{{csrf_token()}}">
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Ví dụ demo về API gRPC</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="{{url()->current() == route('listProduct')?'active':''}}"><a href="{{route('listProduct')}}">Danh sách sản phẩm</a></li>
            <li class ="{{url()->current() == route('addProductView')?'active':''}}"><a href="{{route('addProductView')}}">Thêm sản phẩm</a></li>
          </ul>
        </div>
      </nav>
    @yield('content')
    <script src="js/jquery.min.js"></script>
    @yield('script')
</body>
</html>