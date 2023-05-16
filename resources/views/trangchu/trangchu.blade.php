@extends('index')

@section('title')
    <title>NESOL | Trang chủ</title>
@endsection

@section('header')
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/normalize.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('public/fonts/flaticon.css') }}">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/fullcalendar.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/animate.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <!-- Modernize js -->
    <script src="{{ asset('public/js/modernizr-3.6.0.min.js') }}"></script>
@endsection

@section('contents')
    <!-- Dashboard summery Start Here -->
    <div class="row gutters-20">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-green ">
                            <i class="flaticon-classmates text-green"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Tài xế</div>
                            <div class="item-number"><span class="counter" data-num="150000">1,50,000</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-blue">
                            <i class="flaticon-multiple-users-silhouette text-blue"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Khách hàng</div>
                            <div class="item-number"><span class="counter" data-num="2250">2,250</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-yellow">
                            <i class="flaticon-couple text-orange"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Đơn hàng</div>
                            <div class="item-number"><span class="counter" data-num="5690">5,690</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-red">
                            <i class="flaticon-money text-red"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Doanh thu</div>
                            <div class="item-number"><span>$</span><span class="counter" data-num="193000">1,93,000</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard summery End Here -->
    <!-- Dashboard Content Start Here -->
    <div class="row gutters-20">
        <div class="col-12 col-xl-6 col-4-xxxl">
            <div class="card dashboard-card-four pd-b-20">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Lịch</h3>
                        </div>
                    </div>
                    <div class="calender-wrap">
                        <div id="fc-calender" class="fc-calender"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-6 col-8-xxxl">
            <div class="card dashboard-card-six pd-b-20">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-17">
                        <div class="item-title">
                            <h3>Hóa đơn chưa thanh toán</h3>
                        </div>
                    </div>
                    <h4 class="font-bold">{{$dh_thanhtoan}}</h4>
                    <div class="notice-box-wrap">
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap" id="hoadon">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Khách hàng</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày tạo</th>
                                    <th>Phí thuê xe</th>
                                    <th>Phí phát nâng</th>
                                    <th>Phí hạ</th>
                                    <th>Phí giấy tờ</th>
                                    <th>Phí lưu ca</th>
                                    <th>Vé cầu đường</th>
                                    <th>Phí khác</th>
                                    <th>Thuế GTGT</th>
                                    <th>Tổng tiền</th>
                                    <th>Ghi chú</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=0)
                                @foreach($hoadon as $key => $hd)
                                    @php($i++)
                                    <tr>
                                        <td>{{$hd->hoadon_id}}</td>
                                        <td>{{$hd->ten_kh}}</td>
                                        <td>{{$hd->donhang_id}}</td>
                                        <td>{{ \Carbon\Carbon::parse($hd->created_at)->format('d/m/Y') }}</td>
                                        <td><?php echo number_format($hd->phithuexe)?></td>
                                        <td><?php echo number_format($hd->phinang)?></td>
                                        <td><?php echo number_format($hd->phiha)?></td>
                                        <td><?php echo number_format($hd->phigiayto)?></td>
                                        <td><?php echo number_format($hd->philuuca)?></td>
                                        <td><?php echo number_format($hd->vecauduong)?></td>
                                        <td><?php echo number_format($hd->phikhac)?></td>
                                        <td>{{$hd->thue}}</td>
                                        <td><?php echo number_format($hd->tongtien)?></td>
                                        <td>{{$hd->ghichu}}</td>
                                        <td><?php echo ($hd->trangthai == 0) ? "Chưa thanh toán" : "Đã thanh toán"  ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a onclick="return confirm('Bạn có chắc muốn xoá?')" class="dropdown-item" href="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen/xoa/'.$hd->hoadon_id)}}"><i class="fas fa-times text-orange-red"></i>Xóa</a>
                                                    <a class="dropdown-item" href="{{URL::to('/quan-ly-van-chuyen/hoa-don-van-chuyen/sua/'.$hd->hoadon_id)}}"><i class="fas fa-cogs text-dark-pastel-green"></i>Sửa</a>
                                                    <a class="dropdown-item" href="chi-tiet-hoa-don.html"><i class="fas fa-solid fa-eye text-dark-pastel-green"></i>Xem</a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-6 col-12-xxxl">
            <div class="card dashboard-card-six pd-b-20">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-17">
                        <div class="item-title">
                            <h3>Đơn hàng hôm nay</h3>
                        </div>
                    </div>
                    <h4 class="font-bold">32</h4>
                    <div class="notice-box-wrap">
                        <div class="notice-list">
                            <div class="table-responsive">
                                <table class="table display data-table text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Thời gian bắt đầu</th>
                                        <th>Ngày vận chuyển</th>
                                        <th>Ngày hoàn thành</th>
                                        <th>Người mua hàng</th>
                                        <th>Chức vụ</th>
                                        <th>Đơn vị</th>
                                        <th>Mặt hàng</th>
                                        <th>Loại hàng</th>
                                        <th>Trọng lượng</th>
                                        <th>Nơi lấy hàng</th>
                                        <th>Nơi giao hàng</th>
                                        <th>Số km ước tính</th>
                                        <th>Ngày tạo</th>
                                        <th>Thời hạn còn</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>#0023</td>
                                        <td>10h30 sáng</td>
                                        <td>12/4/2023</td>
                                        <td>13/4/2023</td>
                                        <td>Nguyễn Phú Vinh</td>
                                        <td>Nguyễn Phú Vinh</td>
                                        <td>Thái sơn - AL - HP</td>
                                        <td>Hoa quả các loại</td>
                                        <td>Đông lạnh</td>
                                        <td>12 tấn</td>
                                        <td>Thái sơn - AL - HP</td>
                                        <td>Thái sơn - AL - HP</td>
                                        <td>30 km</td>
                                        <td>150 ngày</td>
                                        <td>12/4/2023</td>
                                        <td>Chờ xử lý</td>
                                    </tr>
                                    <tr>
                                        <td>#0022</td>
                                        <td>10h30 sáng</td>
                                        <td>12/4/2023</td>
                                        <td>13/4/2023</td>
                                        <td>Nguyễn Phú Vinh</td>
                                        <td>Nguyễn Phú Vinh</td>
                                        <td>Thái sơn - AL - HP</td>
                                        <td>Hoa quả các loại</td>
                                        <td>Đông lạnh</td>
                                        <td>12 tấn</td>
                                        <td>Thái sơn - AL - HP</td>
                                        <td>Thái sơn - AL - HP</td>
                                        <td>30 km</td>
                                        <td>12/4/2023</td>
                                        <td>150 ngày</td>
                                        <td>Đã duyệt</td>
                                    </tr>
                                    <tr>
                                        <td>#0021</td>
                                        <td>10h30 sáng</td>
                                        <td>12/4/2023</td>
                                        <td>13/4/2023</td>
                                        <td>Nguyễn Phú Vinh</td>
                                        <td>Nguyễn Phú Vinh</td>
                                        <td>Thái sơn - AL - HP</td>
                                        <td>Hoa quả các loại</td>
                                        <td>Đông lạnh</td>
                                        <td>12 tấn</td>
                                        <td>Thái sơn - AL - HP</td>
                                        <td>Thái sơn - AL - HP</td>
                                        <td>30 km</td>
                                        <td>12/4/2023</td>
                                        <td>150 ngày</td>
                                        <td>Đã hoàn thành</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard Content End Here -->
@endsection

@section('footer')
    <!-- jquery-->
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('public/js/plugins.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <!-- Counterup Js -->
    <script src="{{ asset('public/js/jquery.counterup.min.js') }}"></script>
    <!-- Moment Js -->
    <script src="{{ asset('public/js/moment.min.js') }}"></script>
    <!-- Waypoints Js -->
    <script src="{{ asset('public/js/jquery.waypoints.min.js') }}"></script>
    <!-- Scroll Up Js -->
    <script src="{{ asset('public/js/jquery.scrollUp.min.js') }}"></script>
    <!-- Full Calender Js -->
    <script src="{{ asset('public/js/fullcalendar.min.js') }}"></script>
    <!-- Data Table Js -->
    <script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('public/js/main.js') }}"></script>

    <script>
        if ($.fn.DataTable !== undefined) {
            $('#hoadon').DataTable({
                destroy: true,
                paging: false,
                searching: true,
                info: false,
                lengthChange: false,
                lengthMenu: [20, 50, 75, 100],
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false
                }],
            });
        }
    </script>
@endsection
