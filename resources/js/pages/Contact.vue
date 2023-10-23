<template>
    <div class="container-fluid" style=" margin-top : 150px;">
        <h3 class="fw-bold text-secondary text-center">CONTACTEZ NOUS POUR VOS PREOCCUPATIONS</h3>
        <p class="text-center fs-5">
            Si vous avez des préoccupations particulières, veuillez nous les soumettre en remplissant le formaulaire ci-dessus. <br>
            Notre équipe s'assurera de vous répondre dans les meilleurs délais.
        </p>

        <div class="p-5 row justify-content-center form-container mt-5">
            <div class="col-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.617661552107!2d2.0294545122100165!3d7.170119215278285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10251d11d44eb97b%3A0xc7ef008ddd0aecb4!2sSMCP!5e0!3m2!1sfr!2sbj!4v1697819269532!5m2!1sfr!2sbj"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100 h-100"></iframe>
            </div>
            <div class="col-6 shadow p-4">
                <form action="" class="w-100" @submit.prevent="store">
                    <h2 class="text-secondary">Laissez nous un message</h2>
                    <div class="row mt-3">
                        <div class="col-12 col-md-6 d-flex flex-column" >
                            <label class="mb-2" for="nom">Nom et prénom(s) :  <span class="text-danger">*</span></label>
                            <input type="text" placeholder="John Doe" class="p-2 " id="nom" v-model="nom" required>
                        </div>
                        <div class="col-12 col-md-6 d-flex flex-column">
                            <label class="mb-2" for="email">Adresse email :  <span class="text-danger">*</span></label>
                            <input type="email" placeholder="johndoe@gmail.com" class="p-2 " id="email" v-model="email" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-md-6 d-flex flex-column">
                            <label class="mb-2" for="telephone">Numero de téléphone :  <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Ex: +22995371154" class="p-2 " id="telephone" v-model="numero" required @input="testNumber" >
                            <p class="text-danger" v-if="showInValideMessage">Le format du numero n'est pas correct</p>
                        </div>
                        <div class="col-12 col-md-6 d-flex flex-column">
                            <label class="mb-2" for="sujet">Sujet :  <span class="text-danger">*</span></label>
                            <input type="text" placeholder="John Doe" class="p-2 " id="sujet" v-model="sujet" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col d-flex flex-column">
                            <label class="mb-2" for="message">Votre message: <span class="text-danger">*</span></label>
                            <textarea id="message" rows="10" class="p-2 " v-model="message" required>
                            </textarea>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-center">
                        <button class="btn btn-submit fw-bold p-2 px-4 mt-2">
                            SOUMETTRE
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="my-5 subscribe-conent">
        <div class="subscribe-conent-next">
            <div class="d-flex align-items-center justify-content-between container" style="height: 200px;">
                <h4 class="text-white">Abonnez-vous à notre newsletter pour être au parfum de nos actualités</h4>
                <form @submit.prevent="store_abonnement">
                    <div>
                        <div class="rounded-pill bg-white">
                            <input type="email" placeholder="Entrez votre adresse email" class="rounded-pill border-0 ps-3 p-2 email-input" v-model="email_abonnement">
                            <input value="S'abonner" type="submit" class="rounded-pill border-0 p-2 px-4 bg-success text-white fw-bold">
                        </div>
                        <p class="text-danger ps-2 pt-2" v-if="is_empty_email_abonnement">Merci de renseigner votre adresse mail</p>
                        <p class="text-danger ps-2 pt-2" v-if="is_saved_abonnement">Votre abonnement est effectué avec succès !</p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</template>

<script >
    import { useToastr } from '@/toastr.js';
    const toastr = useToastr();
    export default {
        name: 'Contact',
        data(){
            return {
                nom: "",
                email: "",
                numero: "",
                message: "",
                sujet: "",
                form : new FormData(),
                form_abonnement: new FormData(),
                showInValideMessage: false,
                email_abonnement: "",
                is_empty_email_abonnement: false,
                is_saved_abonnement: false
            }
        },
        methods: {

            store(){
                this.form.append('nom',this.nom)
                this.form.append('email',this.email)
                this.form.append('numero',this.numero)
                this.form.append('message',this.message)
                this.form.append('sujet',this.sujet)
                console.log(this.form)
                if(this.nom =="" || this.email == "" || this.numero == "" || this.message=="" || this.sujet==""){
                    toastr.error('Veillez remplir tous les champs')
                }
                if(this.showInValideMessage){
                    toastr.error('Le numero de téléphone n\'est pas correct')
                } else {
                    this.$url.post('messages', this.form).then(response=>{
                        toastr.success('Votre message est bien enrégistré. Un retour vous sera fait sous peu dans la mesure du possible !', {timeOut: 3000})
                    })
                    this.nom= "",
                    this.email= "",
                    this.numero= "",
                    this.message= "",
                    this.sujet= ""
                }

            },
            testNumber(){
                let format =/^\+\d{10,}$/;
                if(!format.test(this.numero)){
                    this.showInValideMessage = true;
                }else{
                    this.showInValideMessage = false;
                }
            },
            store_abonnement(){

                if(this.email_abonnement== ""){
                    this.is_empty_email_abonnement = true;
                    setTimeout(() => {
                        this.is_empty_email_abonnement = false;
                    }, 2000);
                }else{
                    this.form_abonnement.append('email', this.email_abonnement)
                    this.$url.post('abonnement',this.form_abonnement).then(response=>{
                        this.is_saved_abonnement = true,
                        setTimeout(() => {
                        this.is_saved_abonnement = false;
                    }, 2000);
                    })
                }

            }

        }
    }
</script>

<style lang="css" scoped>
    form input, textarea {
        border-radius: 5px;
        border: 1px solid #0891a4;

    }
    form input:focus{
        border-radius: 5px;
        border: 1px solid #0891a4;
    }


    .subscribe-conent{
        background-image: url('../../../public/assets/images/bg-img.jpg');
        background-size: 100%;
        object-fit: cover;
        height: 200px;
    }
    .subscribe-conent-next {
        height: 200px;
        background-color: black;
        opacity: 0.5;
    }
    .email-input:focus{
        border: none;
    }
</style>
