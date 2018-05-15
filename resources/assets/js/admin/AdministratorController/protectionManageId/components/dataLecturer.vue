<template>
    <div class="form-group">
        <label class="control-label col-lg-2">Điểm giảng viên {{lecturer.name_lecturer}}:</label>
        <div class="col-lg-5">
            <input type="number" step="0.01" max="1" min="0" v-model="score" placeholder="Điểm giảng viên"  class="form-control" />
        </div>
        <div class="col-lg-5">
            <input type="number" step="0.01" max="1" placeholder="Hệ số" min="0" v-model="factor"   class="form-control" />
        </div>
    </div>
</template>
<script>
    export default {
        props:["lecturer"],
        data(){
            return {
                score: 0,
                factor:0
            }
        }
        ,
        watch:{
            score:{
                handler(){

                },
                deep:true
            },
            factor:{
                handler(){

                },
                deep:true
            }
        }
    }
</script>