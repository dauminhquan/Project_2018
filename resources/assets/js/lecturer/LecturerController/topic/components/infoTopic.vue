<template>
    <form v-on:submit.prevent="submitEdit" class="form-horizontal">
        <fieldset class="content-group">

            <legend class="text-bold">Thông tin về topic</legend>

            <div class="form-group">
                <label class="control-label col-lg-2">Tên topic</label>
                <div class="col-lg-10">
                    <input type="text" required v-model="dataEdit.name_topic"  class="form-control">
                    <p v-if="error.name_topic == 1" class="text text-danger left">Trùng tên topic</p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Mô tả</label>
                <div class="col-lg-10">
                    <textarea class="form-control" required v-model="dataEdit.describe"></textarea>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Lưu chỉnh sửa <i class="icon-arrow-right14 position-right"></i></button>
                <button type="button" @click="showModel" class="btn btn-danger">Xóa topic<i class="icon-arrow-right14 position-right"></i></button>
            </div>

        </fieldset>
        <div id="modalDelete" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">Xóa topic</h6>
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
                this.getData()
        },
        data(){
            return {
                dataEdit: {
                    describe: "",
                    name_topic: "",
                },
                error: {
                    name_topic: -1,

                }
            }
        },
        props: ["id_p"],
        methods:{
            getData(){

                axios.get("/api/extent/lecturer/topic/"+this.id_p).then((data) => {

                    this.dataEdit = data.data

                }).catch((err) => {
                    console.log(err)
                })

            },
            submitEdit(){
                axios.put("/api/extent/lecturer/topic/"+this.id_p,this.dataEdit).then((data) => {
                    this.error.name_topic = -1
                    swal({
                        title: "Thành công!",
                        text: "Update thông tin thành công!",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                }).catch((err) =>{
                    console.dir(err)
                    if(err.response.data.code == 403)
                    {
                        this.error.name_topic = 1
                    }
                    else {
                        this.error.name_topic = -1
                    }
                })
            },
            successDelete(){
                axios.delete("/api/extent/lecturer/topic/"+this.id_p,{
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
                        window.location= "/lecturer/de-tai-cua-toi  "
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