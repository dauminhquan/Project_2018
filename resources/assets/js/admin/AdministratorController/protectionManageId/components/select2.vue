<template>
    <select name="" v-model="value" class="form-control">
        <option v-for="lecturer in lecturers" :value="lecturer.id">{{lecturer.name_lecturer}}</option>
    </select>
</template>
<script>
    export default {
        props: ['lecturers', 'value'],
        mounted: function () {

            var vm = this
            console.log(vm.value)

                $(this.$el)
                // init select2
                    .select2()
                    .val(this.value)
                    .trigger('change')
                    // emit event on change.
                    .on('change', function () {
                        if(this.value != undefined)
                        {
                            vm.$emit('updateValue', this.value)
                        }
                    })

        },
        watch: {
            value: function (value) {
                // update value

                if(value!=undefined)
                {
                    $(this.$el)
                        .val(value)
                        .trigger('change')
                }
            }
        },
        destroyed: function () {
            $(this.$el).off().select2('destroy')
        }
    }
</script>