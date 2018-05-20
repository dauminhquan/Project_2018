<template>
    <form v-on:submit.prevent="submitEditTime" class="form-horizontal">
        <fieldset class="content-group">

            <legend class="text-bold">Thông tin về đợt bảo về</legend>

            <div class="form-group">
                <label class="control-label col-lg-2"><b>Thời gian bắt đầu:</b></label>
                <div class="col-lg-10">
                    <input type="date" required v-model="dataEditTime.timeStart"  class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2"><b>Thời gian kết thúc:</b></label>
                <div class="col-lg-10">
                    <input type="date" required v-model="dataEditTime.timeEnd" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2"><b>Hội đồng bảo vệ:</b></label>
                <div class="col-lg-10">
                    <div class="form-group">
                        <label class="control-label">Trưởng hội đồng</label>
                        <select2   @updateValue="updateValue($event,0)" :lecturers="lecturers" :value="listLecturerOld[0]"></select2>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Thư ký</label>
                        <select2   @updateValue="updateValue($event,1)" :lecturers="lecturers" :value="listLecturerOld[1]"></select2>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Giảng viên phản biện</label>
                        <select2   @updateValue="updateValue($event,2)" :lecturers="lecturers" :value="listLecturerOld[2]"></select2>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Giảng viên phản biện</label>
                        <select2   @updateValue="updateValue($event,3)" :lecturers="lecturers" :value="listLecturerOld[3]"></select2>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2"><b>Mô tả:</b></label>
                <div class="col-lg-10">
                    <textarea class="form-control" required v-model="dataEditTime.detail"></textarea>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Lưu chỉnh sửa <i class="icon-arrow-right14 position-right"></i></button>
                <button type="button" @click="showModel" class="btn btn-danger">Xóa đợt bảo vệ<i class="icon-arrow-right14 position-right"></i></button>
            </div>

        </fieldset>
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
    </form>
</template>
<script>
    import Vue from 'vue'
    import select2 from './select2.vue'
    Vue.component('select2',select2)
    export default {
        computed: {
          listLect_bv(){
              return this.dataEditTime.listLecturer
          }
        },
        mounted(){
            this.getLecturers()

            this.dataEditTime.timeStart = this.time_start
            this.dataEditTime.timeEnd = this.time_end
            this.dataEditTime.detail = this.detail

            this.dataEditTime.listLecturer = this.listlecturer.split(",")
            this.listLecturerOld = this.listlecturer.split(",")
            // $('select').select2()
        },
        data(){
            return {
                dataEditTime: {
                    timeStart: "",
                    timeEnd: "",
                    detail: "",
                    listLecturer:[]
                },
                lecturers : [],
                listLecturerOld: []
            }
        },
        props: ["time_start","time_end","id_p","detail","listlecturer"],
        methods:{
            updateValue(value,index)
            {
                // console.log(value)
                if(value != "" && value != undefined)
                {
                    this.dataEditTime.listLecturer[index] = value
                }
               // console.log(this.dataEditTime.listLecturer)

                // console.log(this.dataEditTime.listLecturer[index])
            },
            getLecturers(){
            // có thể sẽ phải update lại
                axios.get("/api/lecturer").then((data) => {

                    this.lecturers = data.data

                }).catch((err) => {
                    console.log(err)
                })

            },
            submitEditTime(){

                if(this.checkLecturer() == true)
                {
                    axios.put("/api/protection/"+this.id_p,this.dataEditTime).then((data) => {

                        swal({
                            title: "Thành công!",
                            text: "Update thông tin thành công!",
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        location.reload();
                    }).catch((err) =>{
                        console.log(err)
                    })
                }

            },
            checkLecturer()
            {
                let vle = true;

                this.dataEditTime.listLecturer.forEach(value => {

                    let ll = this.dataEditTime.listLecturer
                    let l = []
                    for (let i= 0;i<ll.length;i++)
                    {
                        if(ll[i] == value)
                        {
                            l.push(ll[i])
                        }
                    }
                    if (l.length>1)
                    {
                        swal({
                            title: "Oops...",
                            text: "Một thành viên không thể có 2 chức vụ!",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                        vle = false;
                    }
                })
                return vle
            },
            successDelete(){



                axios.delete("/api/protection/"+this.id_p,{
                    params: {
                        id: this.id_p
                    }
                }).then((data) =>{

                    swal({
                        title: "Thành công!",
                        text: "Topic đã được xóa!!",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    $("#modalDelete").modal("hide")
                    setTimeout(function () {
                        window.location= "/quan-ly-dot-bao-ve"
                    },2000)
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
            showModel(){
                $("#modalDelete").modal("show")
            },
        },
        watch: {


        }
    }
</script>