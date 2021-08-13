<template>
    <div class="login" >
        <form @submit.prevent="DataForm">
            <div>
              <p class="h2 text-secondary">Login</p>
            </div>
            <div v-if="error" class="alert alert-danger" role="alert">
                {{ error }}
            </div>
            <div class="mb-3 text-primary">
                <label>Email</label>
                <input type="email" class="form-control" v-model="email" placeholder="Email" required>
            </div>
            <div class="mb-3 text-primary">
                <label>Senha</label>
                <input type="password" class="form-control" v-model="password" placeholder="Senha" required>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary btn-block">Login</button>
            </div>

        </form>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'Login',
        data(){
            return {
                email: '',
                password: '',
                error: '',
            }
        },
        methods:{
            async DataForm(){
                try {
                    const response = await axios.post('auth/login',{
                        'email': this.email,
                        'password': this.password
                    });
                    //console.log(response);
                    this.logout = true;
                    localStorage.setItem('token', response.data.access_token);
                    localStorage.setItem('email', response.data.email);
                    //this.$store.dispatch('userLogin', response.data.email);
                    this.$router.push('/listusers');
                } catch (e){
                    this.error = 'Email ou senha invalido!';
                }
            }
        }
    }
</script>
<style lang="scss">
.login {
    display: flex;
    justify-content: center;
    padding: 10px;

}
</style>
