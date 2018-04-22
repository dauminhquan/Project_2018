<template>
    <form v-on:submit.prevent="submitEditTime" class="form-horizontal">
        <fieldset class="content-group">

            <legend class="text-bold">Thông tin về đợt bảo về</legend>

            <div class="form-group">
                <label class="control-label col-lg-2">Thời gian bắt đầu</label>
                <div class="col-lg-10">
                    <input type="date" v-model="dataEditTime.timeStart"  class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Thời gian kết thúc</label>
                <div class="col-lg-10">
                    <input type="date" v-model="dataEditTime.timeEnd" class="form-control">
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
    export default {
        mounted(){
            console.log(this.time_start)
            this.dataEditTime.timeStart = this.time_start
            this.dataEditTime.timeEnd = this.time_end
        },
        data(){
            return {
                dataEditTime: {
                    timeStart: "",
                    timeEnd: ""

                },
            }
        },
        props: ["time_start","time_end","id_p"],
        methods:{
            submitEditTime(){
                axios.put("/api/protection/"+this.id_p,this.dataEditTime).then((data) => {
                    console.log(data)
                    swal({
                        title: "Thành công!",
                        text: "Update thông tin thành công!",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                }).catch((err) =>{
                    console.log(err)
                })
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

            }
        }
    }
</script>