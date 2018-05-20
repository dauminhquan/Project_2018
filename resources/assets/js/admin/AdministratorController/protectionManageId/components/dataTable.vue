<template>
    <div>

        <table class="table" id="datatable-basic" style="min-height: 100px">
            <thead>
            <tr>
                <th>Tên topic</th>
                <th>Sinh viên đăng ký</th>
                <th>Giảng viên hướng dẫn</th>
                <th>Tình trạng</th>
                <th>Qua môn</th>
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
                    <input type="text"  hidden />
                    <form v-on:submit.prevent="submitEdit"  class="form-horizontal" id="" action="#">
                        <div class="modal-body">

                            <fieldset class="content-group">
                                <legend class="text-bold">Tên chủ đề: {{dataEditTopic.name_topic}}</legend>
                                <legend class="text-bold">Mô tả: </legend>
                                <p>{{dataEditTopic.describe}}</p>
                                <legend class="text-bold">Tên sinh viên: {{dataEditTopic.student_name}}</legend><span> dsadsa</span>
                                <legend class="text-bold">Giảng viên hướng dẫn: {{dataEditTopic.lecturer.name_lecturer_top_lec}}</legend>
                                <input type="text" hidden :value="showIdEdit"/>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Trạng thái</label>
                                    <div class="col-lg-10">
                                        <select type="text" v-model="dataEditTopic.status"   class="form-control">
                                            <option value="0"> Đang đợi duyệt</option>
                                            <option value="1"> Đã hoàn thành</option>
                                            <option value="2"> Đã hủy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" v-if="dataEditTopic.status == 0">
                                    <label class="control-label col-lg-2">Thời gian bắt đầu bảo vệ</label>
                                    <div class="col-lg-10">
                                        <input v-model="dataEditTopic.time_run" type="datetime-local" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group" v-if="dataEditTopic.status == 0">
                                    <label class="control-label col-lg-2">Địa điểm bảo vệ</label>
                                    <div class="col-lg-10">
                                        <input v-model="dataEditTopic.place" class="form-control"></input>
                                    </div>
                                </div>
                                <!--<data-lecturer v-for="lecturer in dataEditTopic.listLecturer" :key="lecturer.id" :lecturer="lecturer">-->
                                <!--</data-lecturer>-->
                                <div class="form-group" v-if="dataEditTopic.status == 1" v-for="(lecturer,index) in dataEditTopic.listLecturer" :key="lecturer.position">
                                    <label class="control-label col-lg-2">Điểm GV: <b>{{lecturer.name_lecturer}}</b>:</label>
                                    <div class="col-lg-5">
                                        <input type="number" step="0.01" max="10" min="0" v-model="all_score[index].score" placeholder="Điểm giảng viên"  class="form-control" />
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="number" step="0.01" max="1" :placeholder="showHeso(lecturer.position)" min="0"  v-model="all_score[index].factor"   class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group" v-if="dataEditTopic.status == 1">
                                    <label class="control-label col-lg-2">Điểm</label>
                                    <div class="col-lg-10">
                                        <input type="number" step="0.01" readonly v-model="dataEditTopic.scores" max="10" min="0"   class="form-control" />
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
    import dtlec from './dataLecturer.vue'
    export default {
        store: store,
        components:{
          'data-lecturer' : dtlec
        },
        computed:{

            showIdEdit () {
                //thong tin topic co id
                var idEdit_cr = this.$store.state.idData
                if(idEdit_cr != this.idEdit)
                {
                    for (var i = 0;i<this.infoDataJson.length;i++)
                    {
                        if(this.infoDataJson[i].id = idEdit_cr)
                        {

                            var rt = {
                                listLecturer: [],//hoi dong bao ve
                                status: "",
                                scores: -1
                            }
                            rt.name_topic = this.infoDataJson[i].name_topic
                            rt.lecturer = this.infoDataJson[i].lecturer
                            rt.status = this.infoDataJson[i].status
                            rt.scores = this.infoDataJson[i].scores
                            rt.student_name = this.infoDataJson[i].student_name
                            rt.describe = this.infoDataJson[i].describe
                            rt.listLecturer = this.infoDataJson[i].listLecturer
                            rt.idTopic = this.infoDataJson[i].id
                            if(this.infoDataJson[i].time_run!= null)
                            {
                                rt.time_run = this.infoDataJson[i].time_run.replace(" ","T")
                            }

                            rt.place = this.infoDataJson[i].place

                            this.dataEditTopic = rt
                            console.log(this.dataEditTopic)

                        }

                    }
                    this.idEdit = idEdit_cr
                }
                return this.$store.state.idData



            },
            listLecturer(){
                var html ="<b>"
                for (var i = 0;i< this.dataEditTopic.listLecturer.length;i++)
                {
                    html+=this.dataEditTopic.listLecturer[i].name_lecturer+";"
                }
                html+="</b>"
                return html
            }
        },
        mounted(){

            this.getData()
            this.getLecturers()

        },
        methods: {

            showHeso(i){
                switch (i){
                    case (1) : {
                        return 'Hệ số của Trưởng hội đồng'
                    }
                    case (2) : {
                        return 'Hệ số của Thư ký'
                    }
                    case (3) : {
                        return 'Hệ số của Giảng viên phản biện 1'
                    }
                    case (4) : {
                        return 'Hệ số của Giảng viên phản biện 2'
                    }
                    default :
                    {
                        return "Không rõ chức vụ"
                    }
                }
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

                if(data[0][0] == null)
                {
                    data = []
                }
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
                if(this.dataEditTopic.status == 0 && this.dataEditTopic.time_run != "" && this.dataEditTopic.place != "")
                {
                    axios.put("/api/protection/"+this.id,{
                        idTopic: this.dataEditTopic.idTopic,
                        time_run: this.dataEditTopic.time_run,
                        place: this.dataEditTopic.place
                    }).then((data) => {

                        this.resetData()
                        swal({
                            title: "Thành công!",
                            text: "Hẹn thời gian thành công!",
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        $("#modalInfo").modal("hide")
                    }).catch((err) => {
                        console.log(err)
                    })
                }
                else{
                    axios.put("/api/protection/"+this.id,{
                        idTopic: this.dataEditTopic.idTopic,
                        scores: this.dataEditTopic.scores,
                        length: this.all_score,
                        status: this.dataEditTopic.status
                    }).then((data) => {

                        this.resetData()
                        swal({
                            title: "Thành công!",
                            text: "Update thông tin thành công!",
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        $("#modalInfo").modal("hide")

                    }).catch((err) => {
                        console.log(err)
                    })
                }
            },

            getLecturers(){

                axios.get("/api/lecturer").then((data) => {
                    this.lecturers = data.data
                }).catch((err) => {
                    console.log(err)
                })

            },
            filData(data){

                return data.map(function (value,index) {
                    var t = ""
                    if(value.status == 0)
                    {
                        t+='<span class="label label-info">Đang đợi điểm</span>'
                    }
                    if(value.status == 1)
                    {
                        t+='<span class="label label-success">Đã hoàn thành</span>'
                    }
                    if(value.status == 2)
                    {
                        t+='<span class="label label-danger">Đã hủy</span>'
                    }
                    var p =""
                    if(value.pass == 1)
                    {
                        p+='<span class="label label-info">Vượt qua</span>'
                    }
                    if(value.pass == 0)
                    {
                        p+='<span class="label label-danger">Không qua</span>'
                    }

                    return [
                        value.name_topic,
                        value.student_name,
                        value.lecturer.name_lecturer_top_lec,
                        t,
                        p,
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
                axios.get("/api/protection/"+this.id).then((data) => {
                    $('#datatable-basic').dataTable().fnClearTable();
                    $('#datatable-basic').dataTable().fnAddData(this.filData(data.data.topics));
                }).catch((err) => {
                    console.log(err)
                })
            },
            // xác định delete người dùng
            successDelete(){
                var id = $("#deleteButton").attr("data")
                axios.delete("/api/protection/"+this.id,{
                    params: {
                        idTopic: id
                    }
                }).then((data) =>{

                    swal({
                        title: "Thành công!",
                        text: "Topic đã được xóa!!",
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
                axios.get("/api/protection/"+this.id).then((data) => {
                    console.log(data.data)
                    this.infoData = this.filData(data.data.topics)
                    this.infoDataJson = data.data.topics

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
                infoDataJson: [],
                infoData: [],
                //Thông tin data

                dataEditTopic: {
                    name_topic:"",
                    describe: "",
                    lecturer: "",
                    listLecturer: [],//hoi dong bao ve
                    status: "",
                    scores: -1,
                    student_name: "",
                    idTopic: "",
                    time_run: "",
                    place: ""
                },

                lecturers: [],
                idEdit: 0,
                idDelete: -1,
                all_score: [
                    {
                        id_lec: "",
                        score:"",
                        factor:""
                    },
                    {
                        id_lec: "",
                        score:"",
                        factor:""
                    },
                    {
                        id_lec: "",
                        score:"",
                        factor:""
                    },
                    {
                        id_lec: "",
                        score:"",
                        factor:""
                    },

                ],
                old_all_score: []

            }
        },
       watch: {
           all_score: {
               handler(newval){
                  let t = 0
                   let sum_st = 0
                  for (let i = 0;i< this.all_score.length;i++)
                  {
                      let sc = !isNaN(parseFloat(this.all_score[i].score))?parseFloat(this.all_score[i].score):0
                      let ft = !isNaN(parseFloat(this.all_score[i].factor))?parseFloat(this.all_score[i].factor):0
                      sum_st+=ft
                     t+= sc*ft
                  }
                    if(sum_st > 1)
                    {
                        swal({
                            title: "Oops...",
                            text: "Tổng hệ số phải nhỏ hơn 1!",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    }
                   else{
                        this.dataEditTopic.scores = t
                    }
               },
               deep:true
           }
       }


    }
</script>