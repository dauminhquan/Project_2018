@extends("layout")
@section("main-content")
    <!-- Stacked columns -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Sinh viên đăng ký khóa luận</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="chart-container">
                <div class="chart has-fixed-height" id="stacked_columns"></div>
            </div>
        </div>
    </div>
    <!-- /stacked columns -->
@endsection
@section("script")
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/visualization/echarts/echarts.js")}}"></script>
    <script src="{{asset("assets/js/plugins/notifications/sweet_alert.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/charts/echarts/columns_waterfalls.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/charts/echarts/timeline_option.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/core/app.js")}}"></script>

@endsection