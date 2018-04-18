<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            axios.put('/api/student/1',{
                student_name: "Đậu Minh Quân 2",
                address : "Kim Giang, Hà Nội",
                id_department: 1,
                id_branch: 1
            }).then((data) => {
                console.log("ok")
                console.log(data)
            }).catch((err) => {
                console.log(err)
            })
        }
    }
</script>
