<template>
    <div>

        <table class="table" id="datatable-basic" style="min-height: 100px">
            <thead>
            <tr>
                <th>Tên topic</th>
                <th>Mô tả</th>
                <th>Tình trạng</th>
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
                                    <label for="">Tên topic</label>
                                    <input type="text" v-model="dataEdit.name_topic" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea type="text" v-model="dataEdit.describe" class="form-control"></textarea>
                                </div>
                            </fieldset>


                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Đóng</button>
                            <button class="btn btn-primary" id="submit_edit" type="submit"><i class="icon-check"></i> Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="modalAdd" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Điền thông tin sinh viên</h5>
                    </div>

                    <form v-on:submit.prevent="submitAdd"  class="form-horizontal" id="form_add" action="#">
                        <div class="modal-body">

                            <fieldset class="content-group">
                                <legend class="text-bold">Điền đầy đủ thông tin</legend>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tên topic</label>
                                    <div class="col-lg-10">
                                        <input type="text" v-model="dataAdd.name_topic" name="name_lecturer" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Mô tả</label>
                                    <div class="col-lg-10">
                                        <input type="text " v-model="dataAdd.describe" name="address_lecturer" class="form-control">
                                    </div>
                                </div>

                            </fieldset>


                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Đóng</button>
                            <button class="btn btn-primary"  id="submit_add" type="submit"><i class="icon-check"></i> Lưu</button>
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
                    axios.get('/api/extent/lecturer/topic/'+this.$store.state.idData)
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
                                text: 'Thêm topic',
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

                    console.log(this.dataEdit)
                axios.put("/api/extent/lecturer/topic/"+this.$store.state.idData,this.dataEdit).then((data) => {

                    swal({
                        title: "Thành công!",
                        text: "Sửa đề tài thành công!",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    $("#modalInfo").modal("hide")
                    this.resetData()

                }).catch((err) => {
                    console.log(err)
                })
            },
            resetData(){
                axios.get("/api/extent/lecturer/topics").then((data) => {
                    $('#datatable-basic').dataTable().fnClearTable();
                    $('#datatable-basic').dataTable().fnAddData(this.filData(data.data));
                }).catch((err) => {
                    console.log(err)
                })
            },
            submitAdd(){
                console.log(this.dataAdd)
                axios.post("/api/extent/lecturer/topics",this.dataAdd).then((data) => {
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
            // edit
            filData(data){

                return data.map(function (value,index) {
                    var html = ""
                    if(value.accept == 1)
                    {
                        html+= '<span class="label label-success">Đang thực hiện</span>'
                    }
                    else {
                        html+= '<span class="label label-info">Đang đợt duyệt</span>'
                    }
                    return [
                        '<a href="/lecturer/topic-cua-toi/'+value.id+'">'+value.name_topic+'</a>',

                        value.describe,
                        html,

                        '<ul style="text-align: center;" class="icons-list">' +
                        '   <li class="dropdown">' +
                        '       <a href="#" class="dropdown-toggle" data-toggle="dropdown">' +
                        '           <i class="icon-menu9"></i>' +
                        '       </a>' +
                        '<ul class="dropdown-menu dropdown-menu-right">' +
                        '<li>' +
                        '   <a href="#" onclick="editInfo('+value.id+')">' +
                        '       <i class=" icon-user"></i> Sửa thông tin topic' +
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



// Thêm excel



            getData(){
                axios.get("/api/extent/lecturer/topics").then((data) => {
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

                dataAdd: {
                    name_topic: "",
                    describe: ""
                },
                //Thông tin data
                infoData: [

                ],
                dataEdit: {},

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