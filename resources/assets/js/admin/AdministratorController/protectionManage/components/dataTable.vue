<template>
    <div>

        <table class="table" id="datatable-basic" style="min-height: 100px">
            <thead>
            <tr>
                <th>Đợt bảo vệ</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>Mô tả</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <!-- Iconified modal -->

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

        <div id="modalAdd" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Điền thông đợt bảo vệ</h5>
                    </div>

                    <form v-on:submit.prevent="submitAdd"  class="form-horizontal" id="form_add" action="#">
                        <div class="modal-body">

                            <fieldset class="content-group">
                                <legend class="text-bold">Điền đầy đủ thông tin</legend>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Thời gian bắt đầu</label>
                                    <div class="col-lg-10">
                                        <input type="date" v-model="dataAdd.timeStart"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Thời gian kết thúc</label>
                                    <div class="col-lg-10">
                                        <input type="date" v-model="dataAdd.timeEnd"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Danh sách giáo viên phản biện</label>
                                    <div class="col-lg-10">
                                        <select name="" multiple v-model="dataAdd.listLecturer" class="form-control">
                                            <option v-for="lecturer in listLecturer" :value="lecturer.id">{{lecturer.name_lecturer}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Mô tả</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" v-model="dataAdd.detail"></textarea>
                                    </div>
                                </div>



                            </fieldset>


                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Đóng</button>
                            <button class="btn btn-primary"  id="submit_add" type="submit"><i class="icon-check"></i> Thêm mới</button>
                        </div>
                    </form>
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

            idDelete (state,id) {
                // mutate state
                state.idData = id
            }
        }
    })
    export default {


        store: store,
        computed:{

        },
        mounted(){

            this.getData()
            this.getLecturers()


        },
        methods: {

            getLecturers(){

                axios.get("/api/lecturer").then((data) => {

                    this.listLecturer = data.data
                    console.log(data)
                }).catch((err) => {
                    console.log(err)
                })

            },
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
                // $('#selectLecturer').select2({
                //     minimumResultsForSearch: Infinity,
                //
                // });
            },
            // them moi 1 data
            submitAdd(){

                axios.post("/api/protection",this.dataAdd).then((data) => {
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

//loc du lieu
            // edit
            filData(data){

                return data.map(function (value,index) {
                    return [
                        '<a href="/quan-ly-dot-bao-ve/'+value.id+'">'+value.id+'</a>',
                        value.time_start,
                        value.time_end,
                        value.detail
                    ]
                })
                // showInfor('+value.id+')

            },
            //reset lại dữ liệu bảng
            resetData(){
                axios.get("/api/protection").then((data) => {
                    $('#datatable-basic').dataTable().fnClearTable();
                    $('#datatable-basic').dataTable().fnAddData(this.filData(data.data));
                }).catch((err) => {
                    console.log(err)
                })
            },
            // xác định delete người dùng
            successDelete(){
                var id = $("#deleteButton").attr("data")
                axios.delete("/api/protection/"+id).then((data) =>{

                    swal({
                        title: "Thành công!",
                        text: "Xóa thành công đợt!!",
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
                axios.get("/api/protection").then((data) => {
                    this.infoData = this.filData(data.data)
                    this.drawTable(this.infoData)
                }).catch((err) =>
                {
                    console.log(err)
                })
            },


        },
        data(){
            return {

                infoData: [],
                //Thông tin data
                dataAdd: {
                    time_start: "",
                    time_end: "",
                    detail: "",
                    listLecturer: []

                },
                listLecturer: [],
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