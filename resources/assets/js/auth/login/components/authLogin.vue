<template>
    <form v-on:submit.prevent="submitLogin()"  >
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group">Login bằng tài khoản của bạn <small class="display-block" v-bind:style="error_s">{{successLogin}}</small></h5>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <input type="text" class="form-control" v-model="Auth.username" placeholder="Username">
                <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                </div>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <input type="password" class="form-control" placeholder="Password" v-model="Auth.password">
                <div class="form-control-feedback">
                    <i class="icon-lock2 text-muted"></i>
                </div>
            </div>
            <div class="form-group login-options">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="checkbox-inline">
                            <input type="checkbox" v-model="Auth.remember" class="styled" checked="checked">
                            Nhớ mật khẩu
                        </label>
                    </div>

                    <div class="col-sm-6 text-right">
                        <a href="login_password_recover.html">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn bg-blue btn-block">Đăng nhập <i class="icon-arrow-right14 position-right"></i></button>
            </div>



            <div class="content-divider text-muted form-group"><span>Không có tài khoản?</span></div>
            <a href="login_registration.html" class="btn btn-default btn-block content-group">Đăng ký</a>
            <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
        </div>
    </form>


</template>
<script>

    export default {



        mounted(){

        },
        methods: {
                submitLogin()
                {
                    axios.post("/api/login",this.Auth).then((data) => {
                        this.successLogin = ""
                        window.location="/";
                    }).catch((err) => {
                        if(err.response.data.code == 401)
                        {
                            this.successLogin = "Tài khoản hoặc mật khẩu không đúng. Xin thử lại"
                            this.error_s.color = "red"
                        }
                        else {
                            this.successLogin = "Đã có lỗi từ server. Vui lòng thử lại"
                        }
                    })
                },
        },
       watch: {

       },
        data(){
            return {
                Auth: {
                    username: "",
                    password: "",
                    remember: 0
                },
                successLogin: "Vui lòng điền đầy đủ thông tin",
                error_s: {
                    "color" : ""
                }
            }
        }


    }
</script>