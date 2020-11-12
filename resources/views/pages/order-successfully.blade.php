<div>
    <div></div>
    <h3 style="color: #244ec9">Thông tin khách hàng</h3>
    <div></div>
    <p>
        <strong>Khách hàng: </strong> {{ $info['full_name'] }}
    </p>
    <p>
        <strong>Email: </strong> {{ $info['email'] }}
    </p>
    <p>
        <strong>Mã đơn hàng: </strong> {{ $postal_id }}
    </p>
    <p>
        <strong>Điện thoại: </strong> {{ $info['phone_number'] }}
    </p>
    <p>
        <strong>Địa chỉ: </strong> {{ $info['address'] }}
    </p>
</div>
<div></div>
<h3 style="color: #244ec9">Chi tiết đơn hàng</h3>
<div class="order-detail">
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Tên Sản Phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Màu</th>
            <th>Kích thước</th>
            <th>Thành tiền</th>
        </tr>
        @foreach($cart as $item)
            <tr style="text-align: center;">
                <td>{{ $item->name }}</td>
                <td>${{ number_format($item->price) }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->options->color }}</td>
                <td>{{ $item->options->size }}</td>
                <td>${{ number_format($item->price*$item->qty) }}</td>
            </tr>
        @endforeach
        <tr style="text-align: center;">
            <td><strong>Tổng tiền</strong></td>
            <td colspan="5"><strong>${{ $total }}</strong></td>
        </tr>
    </table>
</div>
<div></div>
<h3 style="color: #244ec9">Quý khách đã đặt hàng thành công!</h3>
<div class="explain-email">
    <ul>
        <li>Hóa đơn mua hàng của Quý khách đã được chuyển đến địa chỉ email đặt hàng của Quý khách.</li>
        <li>Sản phẩm sẽ được chuyển đến địa chỉ đặt hàng sau 2 - 5 ngày tính từ thời điểm Quý khách nhận được thông báo
            này.
        </li>
        <li>Cơ sở chính: 147 - Phố Mai Dịch - Quận Cầu Giấy - TP Hà Nội</li>
        <li>Hotline: 0364081626</li>
    </ul>
</div>
<div class="thanks-to-customer">
    <p style="color: #244ec9; text-align: center;"><strong>TUAN SNEAKERS</strong> xin cảm ơn quý khách đã sử dụng dịch
        vụ của chúng tôi!</p>
</div>