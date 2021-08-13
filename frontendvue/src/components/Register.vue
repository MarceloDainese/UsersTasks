<template>
    <div class="Register">
        <form @submit.prevent="DataForm">
           <div class="form-group">
              <p class="h2 text-secondary">Novo Usuário</p>
           </div>
           <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nome</label>
                <input type="text" class="form-control form-control-sm" v-model="name" placeholder="Nome" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input type="text" class="form-control" v-model="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Telefone</label>
                <input type="text" class="form-control" v-model="phone" placeholder="Telefone" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Endereço</label>
                <input type="text" class="form-control" v-model="adress" placeholder="Endereço" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Senha</label>
                <input type="password" class="form-control form-control-pw" v-model="password" placeholder="Senha" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Confirme Senha</label>
                <input type="password" class="form-control form-control-pw" v-model="password_confirm" placeholder="Repita a Senha" required>
            </div>
            <div>
                <p v-if="erroSenha" class="text-danger">{{ erroSenha }}</p>
                <button class="btn btn-primary btn-block"> Registrar</button>
            </div>
        </form>
    </div>
</template>
<script>
import axios from 'axios'

    export default {
        name: 'Register',
        data(){
            return {
                name : '',
                email: '',
                phone: '',
                adress: '',
                password: '',
                password_confirm: '',
                erroSenha : '',
                senhaMenos6: '',
            }
        },
        methods: {
        async DataForm(){
                const form = {
                    name : this.name,
                    email: this.email,
                    phone: this.phone,
                    adress: this.adress,
                    password: this.password,
                    password_confirm: this.password_confirm
                }
                if((this.password != this.password_confirm) || (this.password.length <= 6)){
                    if(this.password != this.password_confirm ){
                      var erroSenha = "- A senha precisa ser igual";
                    }
                    else{
                        erroSenha = "";
                    }
                    if(this.password.length < 6 ){
                      erroSenha = erroSenha + ' - Ter no míninmo 6 digitos';
                    }
                }
                if(!erroSenha){
                    this.erroSenha = "";

                    const response = await axios.post('main/store', form)
                    if(response.status == 200){
                        //console.log(response);
                        this.$router.push('/ListUsers');
                    }
                    else {
                        console.error("Ocorreu um erro no API de Inserir Usuário");
                    }
                }
                else{
                    this.erroSenha = erroSenha;
                }
            }
        }
    }
</script>
<style lang="scss" scoped>
.Register {

    display: flex;
    justify-content: center;

}
.form-control-sm {
    width: 20rem;
}
.form-control-pw {
    width: 10rem;
}
</style>
