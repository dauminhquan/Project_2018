<template>
    <div>

        <table class="table" id="datatable-basic" style="min-height: 100px">
            <thead>
            <tr>
                <th>Tên sinh viên</th>
                <th>Chấp nhận hướng dẫn</th>
                <th>Đợt bảo vệ</th>
                <th>Thời gian bảo vệ</th>
                <th>Địa điểm</th>
                <th>Điểm số</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <div id="modalInfo" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Thông tin chủ đề</h5>
                    </div>
                    <input type="text" v-bind:value="showIdEdit"  hidden />
                    <form v-on:submit.prevent="submitEdit"  class="form-horizontal" id="" action="#">
                        <div class="modal-body">

                            <fieldset class="content-group">

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chấp nhận hướng dẫn sinh viên</label>
                                    <div class="col-lg-10">
                                        <input type="checkbox" v-model="dataEdit.ok" class="form-control">
                                    </div>
                                </div>

                            </fieldset>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Đóng</button>
                            <button class="btn btn-primary" id="submit_edit" type="submit"><i class="icon-check"></i> Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="modalDelete" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Xóa lĩnh vực</h6>
                    </div>

                    <div class="modal-body">
                        <h6 class="text-semibold">Bạn chắc chắn chứ</h6>
                        <p>Sau khi xóa, sẽ không thể phục hồi dữ liệu. Bạn chắc chắn chứ?</p>

                        <hr>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="button" id="deleteButton" @click="successDelete" class="btn btn-danger">Xóa</button>
                    </div>
                </div>
            </div>
        </div>




    </div>


</template>
<script>
    window.Vuex = require('vuex')
    Vue.use(Vuex)
    window.store = new Vuex.Store({
        state: {
            idData: 0
        },
        mutations: {
            idEdit (state,id) {
                // mutate state
                state.idData = id
            },
            idDelete (state,id) {
                // mutate state
                state.idData = id
            }
        }
    })
    export default {


        store: store,
        computed:{
            showIdEdit () {

                var idEdit_cr = this.$store.state.idData
                for (var i = 0;i<this.Data.length;i++)
                {
                    if(this.infoData[i].id_student = idEdit_cr)
                    {
                        this.dataEdit = this.Data[i]

                    }

                }

                return this.$store.state.idData



            },
            listLecturer(){
                var html ="<b>"
                for (var i = 0;i< this.dataEdit.listLecturer.length;i++)
                {
                    html+=this.dataEdit.listLecturer[i].name_lecturer+";"
                }
                html+="</b>"
                return html
            }
        },
        mounted(){

            this.getData()

        },
        methods: {


            drawTable(data){
                $.extend( $.fn.dataTable.defaults, {
                    autoWidth: false,
                    dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
                    language: {
                        search: '<span>Tìm kiếm:</span> _INPUT_',
                        lengthMenu: '<span>Hiển thị:</span> _MENU_',
                        paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                    }
                });


                $('#datatable-basic').dataTable({
                    data: data,
                    columnDefs: [],
                    buttons: {
                        dom: {
                            data: this.infoData,
                            button: {
                                className: 'btn btn-default'
                            }
                        },
                        buttons: [
                            {
                                text: 'Thêm đợt',
                                className: 'btn bg-teal-400',
                                action: function(e, dt, node, config) {
                                    $("#modalAdd").modal("show")
                                }
                            }

                        ]
                    }
                });

                $('.dataTables_filter input[type=search]').attr('placeholder','Nhập từ khóa...');


                $('.dataTables_length select').select2({
                    minimumResultsForSearch: Infinity,
                    width: 'auto'
                });

            },



            submitEdit(){
            
                axios.put("/api/extent/lecturer/topic-as-student/"+this.id,{
                    id_student: this.$store.state.idData,
                    ok: this.dataEdit.ok,
                }).then((data) => {

                    this.resetData()
                    swal({
                        title: "Thành công!",
                        text: "Chấp nhận hướng dẫn thành công!",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    $("#modalInfo").modal("hide")
                    this.resetData()
                }).catch((err) => {
                    console.log(err)
                })
            },


            filData(data){
                console.log(data)
                return data.map(function (value,index) {

                    var chapnhanhuongdan = ""
                    if(value.ok == 0)
                    {
                        chapnhanhuongdan='<span class="label label-info">Đang đợi chấp nhận</span>'
                    }
                    if(value.ok == 1)
                    {
                        chapnhanhuongdan='<span class="label label-success">Đang hướng dẫn</span>'
                    }
                    if(value.ok == -1)
                    {
                        chapnhanhuongdan='<span class="label label-danger">Không chấp nhận</span>'
                    }
                    var dis = ""
                    if(value.scores > 0)
                    {
                        dis = "1"
                        chapnhanhuongdan='<span class="label label-default">Đã hoàn thành</span>'
                    }
                    var dbv = ""
                    if(value.time_start  == null || value.time_end == null)
                    {
                        dbv = '<span class="label label-danger">Chưa đăng ký bảo vệ</span>'
                    }
                    else{
                        dbv = value.time_start.replace(/-/g,"/")+" - "+value.time_end.replace(/-/g,"/")
                    }
                    var diem = ""
                    if(value.scores != -1)
                    {
                        diem = value.scores
                    }
                    if(dis == "")
                    {
                        return [
                            value.student_name,
                            chapnhanhuongdan,
                            dbv,
                            value.time_run,
                            value.place,
                            diem,
                            '<ul style="text-align: center;" class="icons-list">' +
                            '   <li class="dropdown">' +
                            '       <a href="#" class="dropdown-toggle" data-toggle="dropdown">' +
                            '           <i class="icon-menu9"></i>' +
                            '       </a>' +
                            '<ul class="dropdown-menu dropdown-menu-right">' +
                            '<li >' +
                            '   <a href="#" onclick="editInfo('+value.id_student+')">' +
                            '       <i class=" icon-user"></i> Thao tác' +
                            '   </a>' +
                            '</li>' +
                            '<li >' +
                            '   <a href="#" onclick="deleteInfo('+value.id_student+')">' +
                            '       <i class="icon-user-cancel"></i> Xóa' +
                            '   </a>' +
                            '</li>' +
                            '</ul>' +
                            '</li>' +
                            '</ul>'
                        ]
                    }
                    return [
                        value.student_name,
                        chapnhanhuongdan,
                        dbv,
                        value.time_run,
                        value.place,
                        diem,
                        '<ul style="text-align: center;" class="icons-list">' +
                        '   <li class="dropdown">' +
                        '       <a href="#" class="dropdown-toggle" data-toggle="dropdown">' +
                        '           <i class="icon-menu9"></i>' +
                        '       </a>' +
                        '<ul class="dropdown-menu dropdown-menu-right">' +
                        '<li >' +
                        '   <a href="#" onclick="deleteInfo('+value.id_student+')">' +
                        '       <i class="icon-user-cancel"></i> Xóa ' +
                        '   </a>' +
                        '</li>' +
                        '</ul>' +
                        '</li>' +
                        '</ul>'
                    ]

                })
                // showInfor('+value.id+')

            },
            //reset lại dữ liệu bảng
            resetData(){
                axios.get("/api/extent/lecturer/topic-as-student/"+this.id).then((data) => {
                    $('#datatable-basic').dataTable().fnClearTable();
                    $('#datatable-basic').dataTable().fnAddData(this.filData(data.data));
                }).catch((err) => {
                    console.log(err)
                })
            },

            successDelete(){
                var id = $("#deleteButton").attr("data")
                axios.delete("/api/extent/lecturer/topic-as-student/"+this.id,{
                    params: {
                        idStudent: id
                    }
                }).then((data) =>{

                    swal({
                        title: "Thành công!",
                        text: "Yêu cầu đã được xóa!!",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    this.resetData()
                    $("#modalDelete").modal("hide")
                }).catch((err) => {
                    console.log(err)
                    swal({
                        title: "Oops...",
                        text: "Đã có lỗi xảy ra!",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                })

            },




            getData(){
                axios.get("/api/extent/lecturer/topic-as-student/"+this.id).then((data) => {
                    this.Data = data.data
                    this.infoData = this.filData(data.data)

                    this.drawTable(this.infoData)
                }).catch((err) =>
                {
                    console.log(err)
                })
            },


        },
        props: ["id"],
        data(){
            return {

                infoData: [],
                dataEdit: {},
                Data: []
            }
        },


    }
</script>