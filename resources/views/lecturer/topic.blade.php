@extends("layout")
@section("main-content")
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">

            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>

                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body" id="data-table" >
            <data-topic id_p="{{$id}}"></data-topic>

            <fieldset class="content-group" >
                <legend class="text-bold">Danh sách sinh viên đăng ký topic</legend>
                <data-table id="{{$id}} " ></data-table>

            </fieldset>





        </div>
    </div>


    <!-- /basic datatable -->
@endsection
@section("script")
    <script type="text/javascript" src="{{asset("assets/js/plugins/tables/datatables/datatables.min.js")}}"></script>
    <script type="text/javascriExamples of standard form controls suppt" src="{{asset("assets/js/plugins/tables/datatables/extensions/buttons.min.js")}}"></script>
    <script src="{{asset("assets/js/plugins/notifications/sweet_alert.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/selects/select2.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/core/app.js")}}"></script>
    <script src="{{asset("js/lecturer/topic.js")}}"></script>
    <script src="{{asset("js/buildstudentManage.js")}}"></script>
@endsection