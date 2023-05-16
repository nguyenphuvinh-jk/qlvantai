@extends('index')

@section('title')
    <title>NESOL | Phiếu điều xe</title>
@endsection

@section('header')
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/normalize.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/datepicker.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('public/fonts/flaticon.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/animate.min.css') }}">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/select2.min.css') }}">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/jquery.dataTables.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/hoa_don_style.css') }}">
    <!-- Modernize js -->
    <script src="{{ asset('public/js/modernizr-3.6.0.min.js') }}"></script>
@endsection

@section('menu')
    <div class="row">
        <div class="cs-container">
            <div class="card height-auto">
                <div class="card-body p-50 printId" id="download_section">
                    <div class="heading-layout1 border-bottom mb-5">
                        <div class="item-title">
                            <p class="lh-15"><b class="text-dark">Mã hóa đơn:</b> #SM75692</p>
                            <p class=""><b class="text-dark">Ngày: </b>05.01.2022</p>
                        </div>
                    </div>

                    <div class="cs-invoice_head cs-mb10" style="line-height: 1.5em">
                        <div class="cs-invoice_left">
                            <b class="text-dark">Chủ hàng:</b>
                            <p>
                                Người mua hàng: Jennifer Richards <br>
                                Tên đơn vị: cái gì đó <br>
                                Địa chỉ: 365 Bloor Street East, Toronto, Ontario, M4W 3L4, Canada <br>
                                Mã số thuế: 0098890
                            </p>
                        </div>
                        <div class="text-dark">
                            <b class="cs-primary_color">Đơn vị vận chuyển:</b>
                            <p>
                                Tên đơn vị: cái gì đó <br>
                                Địa chỉ: 365 Bloor Street East, Toronto, Ontario, M4W 3L4, Canada <br>
                                Mã số thuế: 0098890
                            </p>
                        </div>
                    </div>

                    <div class="cs-invoice_head cs-mb10">
                        <div class="cs-invoice_left">
                            <b class="text-dark">Thông tin đơn hàng:</b>
                            <p>
                                Ngày vận chuyển: cái gì đó <br>
                                Điểm lấy hàng: 365 Bloor Street East, Toronto, Ontario, M4W 3L4, Canada <br>
                                Điểm giao hàng: 365 Bloor Street East, Toronto, Ontario, M4W 3L4, Canada <br>
                                Loại hàng: 0098890 <br>
                                Trọng lượng: 12 tấn <br>
                            </p>
                            <p></p>
                        </div>

                    </div>

                    <table class="table">
                        <h5 class="text-center text-uppercase font-bold">Đơn giá thuê xe</h5>
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Loaị xe</th>
                            <th class="cs-text_right">Giá tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Doe</td>
                            <td class="cs-text_right">john@example.com</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Moe</td>
                            <td class="cs-text_right">mary@example.com</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Dooley</td>
                            <td class="cs-text_right">july@example.com</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table font-bold">
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="cs-text_right">$7560</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table">
                        <h5 class="text-center text-uppercase font-bold">Chi phí phát sinh</h5>
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nội dung chi</th>
                            <th class="cs-text_right">Giá tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Doe</td>
                            <td class="cs-text_right">john@example.com</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Moe</td>
                            <td class="cs-text_right">mary@example.com</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Dooley</td>
                            <td class="cs-text_right">july@example.com</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table font-bold">
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="cs-text_right">$7560</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table font-bold">
                        <tbody>
                        <tr>
                            <td></td>
                            <td>Thuế</td>
                            <td class="cs-text_right">$7560</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Tổng đơn</td>
                            <td class="cs-text_right">$7560</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-body">
                    <div class="cs-invoice_btns">
                        <a href="javascript:window.print()" class="cs-invoice_btn cs-color1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24"/></svg>
                            <span>In</span>
                        </a>
                        <button id="download_btn" class="cs-invoice_btn cs-color2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M176 272l80 80 80-80M256 48v288"/></svg>
                            <span>Tải xuống</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contents')
    <div class="row">
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Thêm hóa đơn</h3>
                        </div>
                    </div>
                    <form class="new-added-form">
                        <div class="row">
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Mã đơn hàng</label>
                                <select class="select2">
                                    <option value="">Chọn mã đơn</option>
                                    <option value="1">1 tấn</option>
                                    <option value="2">1,5 tấn</option>
                                    <option value="3">2,5 tấn</option>
                                    <option value="4">3,5 tấn</option>
                                    <option value="5">5 tấn</option>
                                    <option value="6">8 tấn</option>
                                    <option value="7">10 tấn</option>
                                </select>
                            </div>
                            <div class="col-12 form-group mg-t-8">
                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Tạo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Danh sách hóa đơn</h3>
                        </div>
                    </div>
                    <form class="mg-b-20">
                        <div class="row gutters-8 d-flex justify-content-end">
                            <div class="col-lg-2 col-12 form-group">
                                <a href="#" class="btn fw-btn-fill btn-gradient-yellow text-white" id="btn_hoadon">Tải xuống</a>
                            </div>
                            <div class="col-lg-4 col-12 form-group">
                            </div>
                            <div class="col-lg-6 col-12 form-group">
                                <input type="text" placeholder="Tìm kiếm ...." class="form-control" id="hoadon-search">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap" id="hoadon-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã đơn hàng</th>
                                <th>Ngày tạo</th>
                                <th>Chi phí thuê xe</th>
                                <th>Chi phí phát sinh</th>
                                <th>Thuế GTGT</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>#0021</td>
                                <td>Accounting</td>
                                <td>Accounting</td>
                                <td>Mathematics</td>
                                <td>Mathematics</td>
                                <td>4</td>
                                <td>4</td>
                                <td>4</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Xóa</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Cập nhật</a>
                                            <a class="dropdown-item" href="chi-tiet-hoa-don.html"><i class="fas fa-solid fa-eye text-dark-pastel-green"></i>Xem</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <!-- Select 2 Js -->
    <script src="{{ asset('public/js/select2.min.js') }}"></script>
    <!-- Scroll Up Js -->
    <script src="{{ asset('public/js/jquery.scrollUp.min.js') }}"></script>
    <!-- Data Table Js -->
    <script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
    <!-- Date Picker Js -->
    <script src="{{ asset('public/js/datepicker.min.js') }}"></script>

    <script src="{{ asset('public/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/js/jszip.min.js') }}"></script>
    <script src="{{ asset('public/js/buttons.html5.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('public/js/main.js') }}"></script>

@endsection
