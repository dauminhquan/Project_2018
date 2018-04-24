<template>
    <div>
        <div class="form-group">
            <label for="">Chọn đợt bảo vệ</label>
            <select name="" v-model="idSelect" id="" class="form-control">
                <option v-for="protection in listPro" :value="protection.id">{{protection.time_start.replace(/-/g,"/")}} - {{protection.time_end.replace(/-/g,"/")}}</option>
            </select>
        </div>
        <p><b>Mô tả: </b>{{detail}}</p>
        <div class="text-right">
            <button type="submit" class="btn btn-primary" @click="reg">Đăng ký <i class="icon-arrow-right14 position-right"></i></button>
        </div>
        <h6 class="text-semibold">Danh sách giảng viên phản biện: {{listNameLec}} </h6>

    </div>

</template>
<script>
    export default {
        computed: {
          listNameLec(){
              var idSelect = this.idSelect

              var dt = this.listPro.find(function(value){

                  if(value.id == idSelect)
                  {
                      var tt = value.lis_lec.map(function (item) {
                          return item
                      })
                      return tt
                  }
              },idSelect)
             if(dt != undefined)
             {
                 return dt.lis_lec.map(function (value) {
                     return value
                 }).toString()
             }
          },
            detail(){
                var idSelect = this.idSelect

                var dt = this.listPro.find(function(value){

                    if(value.id == idSelect)
                    {

                        return value.detail

                    }
                },idSelect)

                if(dt!=undefined)
                {
                    return dt.detail
                }
            }

        },
        mounted(){
          this.getProtections()
        },
        data(){
            return {
                listPro: [],
                idSelect: -1
            }
        },
        methods:{
            getProtections(){
                axios.get("/api/extent/student/protections").then((data) => {
                    this.listPro = data.data
                }).catch((err) => {
                    console.dir(err)
                })
            },
            reg(){
                axios.post("/api/extent/student/protection/"+this.idSelect).then((data) => {
                    alert("Thanh cong")
                }).catch((err) => {

                })
            },
        },
        watch: {

        }
    }
</script>