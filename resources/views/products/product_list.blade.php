@extends('layout.master')
@section('content')
    <div class="container">
        <form id="frmProducts" style="display: none;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Chủ đề</label>
                    <input type="text" class="form-control" id="txtTenSP">
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <input type="text" class="form-control" id="txtGiaTien">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" id="btnThemOrCapNhat">Cập nhật</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="tbody_id_products">
                @foreach ($list_products as $i => $product)
                <tr>
                    <td>{{$i + 1}}</td>
                    <td>SP{{ sprintf('%07d',$product['id']) }}</td>
                    <td>{{$product['name']}}</td>
                    <td>${{$product['price']}}</td>
                    <td>
                        <div class="btn-group">
                            <button data-button-id="btnXoa" class="btn btn-danger" data-button-idProduct="{{$product['id']}}">Xoá</button>
                            <button data-button-id="btnSua" class="btn btn-info" data-button-idProduct="{{$product['id']}}">Sửa</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>   
        <div id="error"> </div> 
    </div>
@endsection
@section('script')
<script>
    $(function(){
        try
        {
            $('#tbody_id_products').on('click', '[data-button-id="btnSua"]', function(){
                try
                {
                    var id = $(this).attr('data-button-idProduct');
                    var formData = new FormData();
                    formData.append('_token', $('#_token').attr('content'));
                    formData.append('id', id);
                    $.ajax({
                        type: 'POST',
                        dataType : 'JSON',
                        url: '/l04-grpc/public/add-product-view',
                        xhr: function(){return $.ajaxSettings.xhr();},
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(data)
                        {
                            try
                            {
                                if(data.flag)
                                {
                                    $('#txtTenSP').val(data.tenSP);
                                    $('#txtGiaTien').val(data.giaTien);
                                    $('#btnThemOrCapNhat').attr('data-button-idProduct', id);
                                    $('#frmProducts').show();
                                }
                                else
                                    throw new TypeError('Không thể lấy thông tin sản phẩm. Lỗi: ' + data.error);
                                return true;
                            }
                            catch(err)
                            {
                                alert('Lỗi: ' + err.stack);
                                return false;
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            $('#error').html(jqXHR.responseText);
                            return false;
                        }
                    });
                }
                catch(err)
                {
                    $('#error').html('Lỗi: ' + err.stack);
                    return false;
                } 
            });
            $('#tbody_id_products').on('click', '[data-button-id="btnXoa"]', function(){
                try
                {
                    var $this = $(this);
                    confirm('Bạn có thực sự muốn xoá sản phẩm ' + $this.attr('data-button-productName'),function(){
                        var id = $this.attr('data-button-idProduct');
                        var formData = new FormData();
                        formData.append('_token', $('#_token').attr('content'));
                        formData.append('id', id);
                        $.ajax({
                            type: 'POST',
                            dataType : 'JSON',
                            url: '/l04-grpc/public//delete-product',
                            xhr: function(){return $.ajaxSettings.xhr();},
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function(data)
                            {
                                try
                                {
                                    var frmProducts = $('#frmProducts');
                                    if(data.flag)
                                    {
                                        if((!frmProducts.is(':hidden') || !frmProducts[0].hasAttribute('hidden')) && $('#btnThemOrCapNhat').attr('data-button-idProduct') === id)
                                            $('#frmProducts').hide();
                                        $this.closest('tr').remove();
                                        alert('Xoá thành công!');
                                        return true;
                                    }
                                    else
                                        throw new TypeError('Không thể xoá sản phẩm. Lỗi: ' + data.error);
                                    return true;
                                }
                                catch(err)
                                {
                                    alert('Lỗi: ' + err.stack);
                                    return false;
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown){
                                $('#error').html(jqXHR.responseText);
                                return false;
                            }
                        });
                    });
                }
                catch(err)
                {
                    $('#error').html('Lỗi: ' + err.stack);
                    return false;
                } 
            });
            return true;
        }
        catch(err)
        {
            $('#error').html('Lỗi: ' + err.stack);
            return false;
        }
    });
</script>
@endsection