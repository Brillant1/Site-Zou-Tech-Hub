<template>
    <div class="container-fluid d-flex justify-content-center align-items-center login-main-div flex-column" style=" margin-top:150px;">



    <div class="col-8 col-md-6 shadow p-4 login-main-div-first-column">
        <div class="">
            <div class=" d-flex align-items-center  ">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0891a4"
                        class="bi bi-layers-fill" viewBox="0 0 16 16">
                        <path
                            d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z" />
                        <path
                            d="M2.125 8.567l-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z" />
                    </svg>
                </i>
                <p class="p-DEC-login ms-4 mt-3 text-secondary">ZOU TECH HUB</p>
            </div>

            <form method="POST" @submit.prevent="login">
            
                <h1 class="welcome-back pb-3">
                    Connexion</h1>
                <!-- Email Address -->
                <div>
                    <label for="email">Adresse email</label>
                    <input id="email" style="padding: 15px;" class="block mt-1 w-full form-control"
                        type="email" v-model="email" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4 form-group">
                    <label for="password" value="Mot de passe">Mot de passe</label>

                    <input id="password" style="padding: 15px;" class="block mt-1 w-full form-control"
                        type="password" v-model="password" required autocomplete="current-password" />
                </div>

                <div class="form-group my-5">
                    <button class="w-100 p-1 rounded text-white fw-bold fs-5 border-0 submit-btn">
                       Connexion
                    </button>
                </div>

            </form>
        </div>
    </div>


</div>
</template>

<script>
    import { useToastr } from '@/toastr'
    const toast = useToastr()
    export default {
        name: 'Login',
        data(){
            return{
                email: "",
                password: "",
                form: new FormData()
            }
        },
        methods: {
            login(){
                if(this.email=="" || this.password==""){
                    alert('Veuillez remplir tous les champs svp')
                }
                this.form.append('email', this.email)
                this.form.append('password', this.password)

                this.$url.post('login', this.form).then(response=> {
                    localStorage.setItem('token', response.data.token)
                    this.$store.dispatch("user", response.data.user);
                    this.$router.push('/admin/dashboard')
                }).catch((error) => {
                    toast.error(error.response.data.message, {
                        duration: 3000,
                    });
                });
            }
        }
    }
</script>

<style lang="css" scoped>
    .bg-image-login {
        background-image: url('/assets/images/dev_img1.jpg');
        background-size: 100%;
        background-repeat: no-repeat;

    }
     .login-main-div {
        margin-top: 100px;

        background-repeat: no-repeat;
        background-size: 100%;
        width: 100%;
    }

    .login-main-div-next {
        margin-bottom: 100px;
        width: 55%;
        margin-top: 120px;
    }

    .p-DEC-login {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        display: flex;
        color: #1117AB;
    }

    .login-main-div-first-column {
        margin-right: 0
    }

    .submit-btn{
        background-color: #0891a4!important;
    }

    @media screen and (max-width: 1360px) {
        .login-main-div-next {
            width: 80%;
            margin-top: 50px;
        }
    }
    @media screen and (max-width: 991px) {
        .login-main-div-next {
        margin-bottom: 100px;
        width: 100%;
        margin-top: 50px;
        }
    }
</style>
