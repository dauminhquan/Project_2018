<template>
    <div>
        <table class="table" id="datatable-basic" style="min-height: 100px">
            <thead>
            <tr>
                <th>Tên giảng viên</th>
                <th>Khoa giảng dạy</th>
                <th>Tài khoản</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <!-- Iconified modal -->
        <div id="modal_iconified" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Thông tin giảng viên</h5>
                    </div>
                    <input type="text" id="id_lec" hidden />
                    <form onsubmit="event.preventDefault()"  class="form-horizontal" id="form_infor" action="#">
                        <div class="modal-body">

                            <fieldset class="content-group">
                                <legend class="text-bold">Điền đầy đủ thông tin</legend>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tên giảng viên</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="name_lecturer" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Địa chỉ</label>
                                    <div class="col-lg-10">
                                        <input type="text"  name="address_lecturer" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email"  name="email_address_lecturer" class="form-control" placeholder="Điền Email của bạn">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Số điện thoại</label>
                                    <div class="col-lg-10">
                                        <input type="text"  name="phone_number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chọn khoa</label>
                                    <div class="col-lg-10">
                                        <select  name="id_department" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chọn chủ đề hướng dẫn</label>
                                    <div class="col-lg-10">
                                        <select  name="id_field" class="form-control">

                                        </select>
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
        <div id="modal_theme_danger" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Xóa thông tin giảng viên</h6>
                    </div>

                    <div class="modal-body">
                        <h6 class="text-semibold">Bạn chắc chắn chứ</h6>
                        <p>Sau khi xóa, sẽ không thể phục hồi dữ liệu. Bạn chắc chắn chứ?</p>

                        <hr>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="button" id="delete_button" @click="success_delete" class="btn btn-danger">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /default modal -->
        <!-- Iconified modal -->
        <div id="modal_add" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Thông tin giảng viên</h5>
                    </div>

                    <form onsubmit="event.preventDefault()"  class="form-horizontal" id="form_add" action="#">
                        <div class="modal-body">

                            <fieldset class="content-group">
                                <legend class="text-bold">Điền đầy đủ thông tin</legend>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tên giảng viên</label>
                                    <div class="col-lg-10">
                                        <input type="text" v-model="add_u.name_lecturer" name="name_lecturer" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Địa chỉ</label>
                                    <div class="col-lg-10">
                                        <input type="text " v-model="add_u.address_lecturer" name="address_lecturer" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email" v-model="add_u.email_address_lecturer"  name="email_address_lecturer" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Số điện thoại</label>
                                    <div class="col-lg-10">
                                        <input type="text"  v-model="add_u.phone_number" name="phone_number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chọn khoa</label>
                                    <div class="col-lg-10">
                                        <select  v-model="add_u.id_department"  name="id_department" class="form-control">
                                            <option v-for="department in departments" v-bind:value="department.id">{{department.department_name}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Chọn chủ đề hướng dẫn</label>
                                    <div class="col-lg-10">
                                        <select  v-model="add_u.id_field"  name="id_field" class="form-control">
                                            <option v-for="field in fields" v-bind:value="field.id">{{field.field_name}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Điền mật khẩu</label>
                                    <div class="col-lg-10">
                                        <input type="password" v-model="add_u.password"  name="password" class="form-control" placeholder="Nhập mật khẩu">
                                    </div>
                                </div>

                            </fieldset>


                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Đóng</button>
                            <button class="btn btn-primary" @click="submit_add()"  id="submit_add" type="submit"><i class="icon-check"></i> Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /iconified modal -->
        <!-- Inline form modal -->
        <div id="modal_form_inline" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title">Tải file Execl</h5>
                    </div>

                    <form action="#" v-on:submit.prevent="submit_file" class="form-inline">
                        <div class="modal-body">
                            <div class="form-group has-feedback">
                                <label>Chọn file Excel: </label>
                                <input type="file" required ref="file" v-on:change="add_excel" placeholder="Chọn file ..." class="form-control">
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
        <!-- /inline form modal -->
    </div>


</template>
<script>

    export default {
        mounted(){

            // this.drawTable()
            this.get_department()
            this.get_field()
            this.getLecturers()
            // console.log(this.department)
        },
        methods: {
            get_department(){

                axios.get('/api/department')
                    .then( (response) => {
                        this.departments = response.data;
console.log(this.departments)
                    }).catch((err) =>{
                    console.log(err)
                })

            },
            get_field(){
                axios.get('/api/field')
                    .then((response) => {
console.log(response.data)
                        this.fields = response.data;


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

                data = this.filData(data)
                console.log(data)
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
                                className: 'btn bg-success-400',
                                action: function (e, dt, node, config) {
                                    window.open('/excel/lecturer', '_blank');
                                }
                            }
                            ,
                            {
                                text: 'Thêm giảng viên',
                                className: 'btn bg-teal-400',
                                action: function(e, dt, node, config) {

                                    $("#modal_add").modal("show")
                                }
                            },
                            {
                                text: 'Thêm bằng Excel',
                                className: 'btn bg-info-400',
                                action: function(e, dt, node, config) {
                                     $("#modal_form_inline").modal("show")
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
            submit_add(){
                console.log(this.add_u)
                axios.post("/api/lecturer",this.add_u).then((data) => {
                    this.resetData()
                    swal({
                        title: "Thành công!",
                        text: "Thêm mới thành công!",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    $("#modal_add").modal("hide")
                }).catch((err) => {
                    console.log(err)
                })
            },
            getLecturers(){

                axios.get("/api/lecturer").then((data) => {
                    this.drawTable(data.data)
                }).catch((err) => {
                    console.log(err)
                })

            },
            filData(data_lec){

                var td = data_lec.map(function (value,index) {
                    var htmlAction = ''
                    return [
                        value.name_lecturer,
                        value.department_name,
                        value.email,
                        value.email_address_lecturer,
                        '<ul style="text-align: center;" class="icons-list">' +
                        '   <li class="dropdown">' +
                        '       <a href="#" class="dropdown-toggle" data-toggle="dropdown">' +
                        '           <i class="icon-menu9"></i>' +
                        '       </a>' +
                        '<ul class="dropdown-menu dropdown-menu-right">' +
                        '<li>' +
                        '   <a href="#" onclick="showModalLec('+value.id+')">' +
                        '       <i class=" icon-user"></i> Thông tin chi tiết' +
                        '   </a>' +
                        '</li>' +
                        '<li>' +
                        '   <a href="#" onclick="delete_lec('+value.id+')">' +
                        '<i class="icon-user-cancel"></i> Xóa' +
                        '</a>' +
                        '</li>' +
                        '</ul>' +
                        '</li>' +
                        '</ul>'
                    ]
                })

                console.log(td)
                return td;
            },
            resetData(){
                axios.get("/api/lecturer").then((data) => {
                    $('#datatable-basic').dataTable().fnClearTable();
                    $('#datatable-basic').dataTable().fnAddData(this.filData(data.data));
                }).catch((err) => {
                    console.log(err)
                })
            },
            success_delete(){
                var id = $("#delete_button").attr("data")
                axios.delete("/api/lecturer/"+id).then((data) =>{
                    console.log(data)
                    swal({
                        title: "Good job!",
                        text: "You clicked the button!",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    axios.get("/api/lecturer").then((data) => {
                        var data1 = filData(data.data)
                        console.log(data1)
                        $('#datatable-basic').dataTable().fnClearTable();
                        $('#datatable-basic').dataTable().fnAddData(data1);
                        $("#modal_theme_danger").modal("hide")

                    }).catch((err) => {
                        console.log(err)
                    })
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

            add_excel(){
                this.file_excel = this.$refs.file.files[0]
            },
            submit_file(){
                let formData = new FormData();

                formData.append('excel', this.file_excel);
                console.log(this.file_excel)
                axios.post( '/api/lecturer',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then((data) => {
                    if(data.data.length > 0)
                    {
                        var email_err = ""
                        console.log(data.data)
                        for (var i = 0;i<data.data.length;i++)
                        {
                            email_err+=data.data[i].email_address_lecturer+";"
                        }
                        $("#modal_form_inline").modal("hide")
                        swal({
                            title: "Thêm thành công!",
                            text: "Có "+data.data.length+" user không thể thêm. Tại vị trí "+email_err+"!",
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        this.resetData()
                        $("#modal_form_inline").modal("hide")
                    }
                })
                    .catch((err) => {
                        console.log(err)
                    });
            }

        },
        data(){
            return {

                file_excel: "",

                add_u : {
                    name_lecturer: "",
                    address_lecturer: "",
                    email_address_lecturer: "",
                    phone_number: "",
                    id_department: "",
                    id_field: "",
                    password: ""
                },
                departments: [],
                fields: []

            }
        },
        created(){



        },
        computed: {

        }

    }
</script>