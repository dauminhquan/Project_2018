<template>
    <div>

        <table class="table" id="datatable-basic" style="min-height: 100px">
            <thead>
            <tr>
                <th>Mã sinh viên</th>
                <th>Tên</th>
                <th>Khoa</th>
                <th>Ngành</th>
                <th>Khóa</th>
                <th>Địa chỉ</th>
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
                        <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Thông tin sinh viên</h5>
                    </div>
                    <input type="text" id="id_lec" hidden />
                    <form v-on:submit.prevent="submitEdit"  class="form-horizontal" id="" action="#">
                        <div class="modal-body">
                            <fieldset class="content-group">
                                <legend class="text-bold">Điền đầy đủ thông tin</legend>
                                <input type="text" hidden :value="showIdEdit"/>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tên sinh viên</label>
                                    <div class="col-lg-10">
                                        <input type="text" v-model="dataEdit.student_name"   class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Địa chỉ</label>
                                    <div class="col-lg-10">
                                        <input type="text"  v-model="dataEdit.address"  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chọn khoa</label>
                                    <div class="col-lg-10">
                                        <select v-model="dataEdit.id_department"  name="id_department" class="form-control">
                                            <option v-for="department in departments" v-bind:value="department.id">{{department.department_name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chọn ngành</label>
                                    <div class="col-lg-10">
                                        <select  v-model="dataEdit.id_branch"  class="form-control">
                                            <option v-for="branch in branchs" v-bind:value="branch.id">{{branch.name_branch}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chọn khóa</label>
                                    <div class="col-lg-10">
                                        <select  v-model="dataEdit.id_course" class="form-control">
                                            <option v-for="course in courses" v-bind:value="course.id">{{course.name_course}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Điền mật khẩu</label>
                                    <div class="col-lg-10">
                                        <input type="password" v-model="dataAdd.password"  class="form-control"/>
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
        <!-- /iconified modal -->
        <!-- Danger modal -->
        <!--modal cảnh báo-->
        <div id="modalDelete" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Xóa thông tin sinh viên</h6>
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
        <!-- /default modal -->
        <!-- Iconified modal -->
        <!--thêm mới 1 sinh viên-->
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
                                    <label class="control-label col-lg-2">Mã sinh viên</label>
                                    <div class="col-lg-10">
                                        <input type="text" v-model="dataAdd.code"  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tên sinh viên</label>
                                    <div class="col-lg-10">
                                        <input type="text " v-model="dataAdd.student_name"  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Địa chỉ</label>
                                    <div class="col-lg-10">
                                        <input type="text" v-model="dataAdd.address"   class="form-control" placeholder="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chọn khoa</label>
                                    <div class="col-lg-10">
                                        <select  v-model="dataAdd.id_department"   class="form-control">
                                            <option v-for="department in departments" v-bind:value="department.id">{{department.department_name}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chọn ngành</label>
                                    <div class="col-lg-10">
                                        <select  v-model="dataAdd.id_branch"   class="form-control">
                                            <option v-for="branch in branchs" v-bind:value="branch.id">{{branch.name_branch}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chọn khóa</label>
                                    <div class="col-lg-10">
                                        <select  v-model="dataAdd.id_course"   class="form-control">
                                            <option v-for="course in courses" v-bind:value="course.id">{{course.name_course}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Điền mật khẩu</label>
                                    <div class="col-lg-10">
                                        <input type="password" v-model="dataAdd.password"  class="form-control">
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
        <!--&lt;!&ndash; /iconified modal &ndash;&gt;-->
        <!--&lt;!&ndash; Inline form modal &ndash;&gt;-->
        <div id="modalAddExcel" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title">Tải file Execl</h5>
                    </div>

                    <form action="#" v-on:submit.prevent="submitFile" class="form-inline">
                        <div class="modal-body">
                            <div class="form-group has-feedback">
                                <label>Chọn file Excel: </label>
                                <input type="file" required ref="file" v-on:change="addExcel" placeholder="Chọn file ..." class="form-control">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-primary">Thêm mới <i class="icon-plus22"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--&lt;!&ndash; /inline form modal &ndash;&gt;-->
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
                    this.idEdit = this.$store.state.idData
                    axios.get('/api/student/'+this.$store.state.idData)
                        .then( (response) => {

                            this.dataEdit = response.data;

                        }).catch((err) =>{
                        console.log(err)
                    })
                    return this.$store.state.idData
                }


            }
        },
        mounted(){
//hien thi thong tin sinh vien
            this.getData()
            this.getDepartment()
            this.getBranch()
            this.getCourse()

        },
        methods: {
            // lấy thông tin khoa
            getDepartment(){

                axios.get('/api/department')
                    .then( (response) => {
                        this.departments = response.data;
                    }).catch((err) =>{
                    console.log(err)
                })

            },
            //lay thong tin nganh

            getBranch(){

                axios.get('/api/branch')
                    .then( (response) => {
                        this.branchs = response.data;

                    }).catch((err) =>{
                    console.log(err)
                })

            },
            //lay thong khoa hoc
            getCourse(){

                axios.get('/api/course')
                    .then( (response) => {
                        this.courses = response.data;
                    }).catch((err) =>{
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
                            button: {
                                className: 'btn btn-default'
                            }
                        },
                        buttons: [
                            {
                                text: 'Tải xuống Excel',
                                className: 'btn bg-success',
                                action: function(e, dt, node, config) {
                                    window.open('/excel/student', '_blank');
                                }
                            },
                            {
                                text: 'Thêm sinh viên',
                                className: 'btn bg-teal-400',
                                action: function(e, dt, node, config) {
                                    $("#modalAdd").modal("show")
                                }
                            },
                            {
                                text: 'Thêm bằng Excel',
                                className: 'btn bg-info-400',
                                action: function(e, dt, node, config) {
                                     $("#modalAddExcel").modal("show")
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
            // them moi 1 data
            submitAdd(){

                axios.post("/api/student",this.dataAdd).then((data) => {
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

                axios.put("/api/student/"+this.$store.state.idData,this.dataEdit).then((data) => {
                    console.log(data)
                    this.resetData()
                    swal({
                        title: "Thành công!",
                        text: "Sửa sinh viên thành công!",
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
                    return [
                        value.code,
                        value.student_name,
                        value.department_name,
                        value.name_branch,
                        value.name_course,
                        value.address,
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
                axios.get("/api/student").then((data) => {
                    $('#datatable-basic').dataTable().fnClearTable();
                    $('#datatable-basic').dataTable().fnAddData(this.filData(data.data));
                }).catch((err) => {
                    console.log(err)
                })
            },
            // xác định delete người dùng
            successDelete(){
                var id = $("#deleteButton").attr("data")
                axios.delete("/api/student/"+id).then((data) =>{
                    console.log(data)
                    swal({
                        title: "Thành công!",
                        text: "Sinh viên đã được xóa!!",
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
            addExcel(){
                this.file_excel = this.$refs.file.files[0]
            },
            //gửi file excel
            submitFile(){
                let formData = new FormData();

                formData.append('excel', this.file_excel);

                axios.post( '/api/student',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then((data) => {
                    if(data.data.length > 0)
                    {
                        var code = ""
                        console.log(data.data)
                        for (var i = 0;i<data.data.length;i++)
                        {
                            code+=data.data[i].code+";"
                        }
                        $("#modalAddExcel").modal("hide")
                        swal({
                            title: "Thêm thành công!",
                            text: "Có "+data.data.length+" user không thể thêm. Tại mã sinh viên "+code+"!",
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        this.resetData()
                        $("#modalAddExcel").modal("hide")
                    }
                   else{
                        swal({
                            title: "Thêm thành công!",
                            text: "Danh sách sinh viên đã được thêm vào!",
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        this.resetData()
                        $("#modalAddExcel").modal("hide")
                    }
                })
                    .catch((err) => {
                        console.log(err)
                    });
            },
            getData(){
                axios.get("/api/student").then((data) => {
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

                fileExcel: "",
                //Thông tin data
                infoData: [

                ],
                dataAdd: {
                    code: "",
                    student_name: "",
                    address: "",
                    id_department: "",
                    id_course: "",
                    id_branch: "",
                    password: ""
                },
                dataEdit: {
                    code: "",
                    student_name: "",
                    address: "",
                    id_department: "",
                    id_course: "",
                    id_branch: "",
                },
                // chuyen nganh
                departments: [],
                branchs: [],
                courses: [],
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