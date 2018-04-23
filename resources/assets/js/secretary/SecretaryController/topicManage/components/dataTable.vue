<template>
    <div>

        <table class="table" id="datatable-basic" style="min-height: 100px">
            <thead>
            <tr>
                <th>Tên topic</th>
                <th>Giảng viên hướng dẫn</th>
                <th>Tình trạng</th>
                <th>Mô tả</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <!-- Iconified modal -->
        <div id="modalInfo" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Thông tin topic</h5>
                    </div>
                    <input type="text" id="id_lec" hidden />
                    <form v-on:submit.prevent="submitEdit"  class="form-horizontal" id="" action="#">
                        <div class="modal-body">

                            <fieldset class="content-group">

                                <input type="text" hidden :value="showIdEdit"/>
                                <div class="form-group">
                                    <p>Tên topic : <b>{{dataEdit.name_topic}}</b></p>

                                </div>
                                <div class="form-group">
                                    <p>Tên giảng viên hướng dẫn: <b>{{dataEdit.name_lecturer}}</b></p>

                                </div>
                                <div class="form-group">
                                    <p>Mô tả: <b>{{dataEdit.describe}}</b></p>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tình trạng:</label>
                                    <select v-model="dataEdit.accept" class="form-control">
                                        <option value="0">Đang đợi</option>
                                        <option value="1">Đang triển khai</option>
                                    </select>
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
                if(this.$store.state.idData != this.idEdit)
                {
                    console.log(this.$store.state.idData)
                    this.idEdit = this.$store.state.idData
                    axios.get('/api/topic/'+this.$store.state.idData)
                        .then( (response) => {
                            console.log(response)
                            this.dataEdit = response.data;
                            this.dataEdit.listLecturer = this.dataEdit.lecturers.map(function(value){
                                return value.id
                            })
                            console.log(this.dataEdit)
                        }).catch((err) =>{
                        console.log(err)
                    })
                    return this.$store.state.idData
                }


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
                            button: {
                                className: 'btn btn-default'
                            }
                        },
                        buttons: [
                            {
                                text: 'Tải xuống Excel',
                                className: 'btn bg-teal-400',
                                action: function(e, dt, node, config) {
                                    window.open('/excel/topics', '_blank');
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
                // $('#selectLecturer').select2({
                //     minimumResultsForSearch: Infinity,
                //
                // });
            },
            // them moi 1 data
            submitAdd(){

                axios.post("/api/field",this.dataAdd).then((data) => {
                    this.resetData()
                    swal({
                        title: "Thành công!",
                        text: "Thêm mới thành công!",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    $("#modalAdd").modal("hide")
                }).catch((err) => {
                    console.log(err)
                })
            },
            submitEdit(){

                axios.put("/api/topic/"+this.$store.state.idData,this.dataEdit).then((data) => {

                    this.resetData()
                    swal({
                        title: "Thành công!",
                        text: "Sửa lĩnh vực thành công!",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    $("#modalInfo").modal("hide")
                }).catch((err) => {
                    console.log(err)
                })
            },
//loc du lieu
            // edit
            filData(data){

                return data.map(function (value,index) {
                    var t = ""
                    if(value.accept == 0)
                    {
                        t+='<span class="label label-info">Đang đợi </span>'
                    }
                    if(value.accept == 1)
                    {
                        t+='<span class="label label-success">Đang thực hiện</span>'
                    }
                    return [
                        value.name_topic,
                        value.name_lecturer,
                        t,
                        value.describe,
                        '<ul style="text-align: center;" class="icons-list">' +
                        '   <li class="dropdown">' +
                        '       <a href="#" class="dropdown-toggle" data-toggle="dropdown">' +
                        '           <i class="icon-menu9"></i>' +
                        '       </a>' +
                        '<ul class="dropdown-menu dropdown-menu-right">' +
                        '<li>' +
                        '   <a href="#" onclick="editInfo('+value.id+')">' +
                        '       <i class=" icon-user"></i> Thông tin chi tiết' +
                        '   </a>' +
                        '</li>' +
                        '<li>' +
                        '   <a href="#"  onclick="deleteInfo('+value.id+')">' +
                        '<i class="icon-user-cancel"></i> Xóa' +
                        '</a>' +
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
                axios.get("/api/topic").then((data) => {
                    $('#datatable-basic').dataTable().fnClearTable();
                    $('#datatable-basic').dataTable().fnAddData(this.filData(data.data));
                }).catch((err) => {
                    console.log(err)
                })
            },
            // xác định delete người dùng
            successDelete(){
                var id = $("#deleteButton").attr("data")
                axios.delete("/api/topic/"+id).then((data) =>{

                    swal({
                        title: "Thành công!",
                        text: "Đề tài đã được xóa!!",
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
// Thêm excel



            getData(){
                axios.get("/api/topic").then((data) => {
                    this.infoData = this.filData(data.data)
                    console.log(this.infoData)
                    this.drawTable(this.infoData)
                }).catch((err) =>
                {
                    console.log(err)
                })
            },


        },
        data(){
            return {


                //Thông tin data
                infoData: [

                ],
                dataAdd: {
                    field_name: "",

                },
                dataEdit: {
                    name_lecturer: "",
                    name_topic: "",
                    describe: "",
                    accept: "",

                },

                idEdit: -1,
                idDelete: -1


            }
        },
       watch: {
            idEdit(value){

            }
       }


    }
</script>