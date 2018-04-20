@extends("layout")
@section("main-content")
    <!-- Basic datatable -->
    <div class="panel panel-flat" id="data-table">
        <div class="panel-heading">
            <h5 class="panel-title">Quản lý lĩnh vực</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    {{--<li><a data-action="close"></a></li>--}}
                </ul>
            </div>
        </div>

        <div class="panel-body">
           Id lĩnh vực
            Tên lĩnh vực
            Thông tin chi tiết: Tên lĩnh vực + Danh sách giáo viên đăng ký lĩnh vực
        </div>

        <data-table></data-table>

    </div>
    <div id="action">

    </div>
    <!-- /basic datatable -->
@endsection
@section("script")
    <script type="text/javascript" src="{{asset("assets/js/plugins/tables/datatables/datatables.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/tables/datatables/extensions/buttons.min.js")}}"></script>
    <script src="{{asset("assets/js/plugins/notifications/sweet_alert.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/selects/select2.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/core/app.js")}}"></script>
    <script src="{{asset("js/fieldManage.js")}}"></script>
    <script src="{{asset("js/buildstudentManage.js")}}"></script>
    {{--<script src="{{asset("js/build_lecturersManage.js")}}"></script>--}}
@endsection