<template>
    <div>

        <table class="table" id="datatable-basic" style="min-height: 100px">
            <thead>
            <tr>
                <th>Tên topic</th>
                <th>Giảng viên hướng dẫn</th>
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

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" required class="styled" v-model="reg.check">
                                        Đăng ký đề tài
                                    </label>
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
                    axios.get('/api/extent/student/topics/'+this.$store.state.idData)
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
                                text: 'Thêm lĩnh vực',
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

            submitEdit(){
                this.reg.id = this.$store.state.idData,

                axios.post("/api/extent/student/topics/"+this.$store.state.idData,this.reg).then((data) => {

                    swal({
                        title: "Thành công!",
                        text: "Đăng ký đề tài thành công!",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    $("#modalInfo").modal("hide")
                    setTimeout(function () {
                        window.location= "/student/de-tai-cua-ban"
                    }, 3000);

                }).catch((err) => {
                    console.log(err)
                })
            },
//loc du lieu
            // edit
            filData(data){

                return data.map(function (value,index) {


                    return [
                        value.name_topic,
                        value.name_lecturer,

                        value.describe,
                        '<ul style="text-align: center;" class="icons-list">' +
                        '   <li class="dropdown">' +
                        '       <a href="#" class="dropdown-toggle" data-toggle="dropdown">' +
                        '           <i class="icon-menu9"></i>' +
                        '       </a>' +
                        '<ul class="dropdown-menu dropdown-menu-right">' +
                        '<li>' +
                        '   <a href="#" onclick="editInfo('+value.id+')">' +
                        '       <i class=" icon-user"></i> Đăng ký topic' +
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
                axios.get("/api/extent/student/topics").then((data) => {
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

                reg: {
                    id:"",
                    check: false
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