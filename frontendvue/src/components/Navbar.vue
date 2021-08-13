<template>
  <div class="nav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
      <div class="container-fluid justify-content-end">
        <ul class="nav justify-content-end" v-if="!userLogin.email">
          <li class="nav-item ">
            <router-link
              :to="{ name: 'Login' }"
              class="nav-link active" aria-current="page"
              >Login {{ userLogin.email }}
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              :to="{ name: 'Register' }"
              class="nav-link active" aria-current="page"
              >Registre
            </router-link>
          </li>
        </ul>
        <ul class="nav justify-content-end" v-if="userLogin.email">
          <li class="nav-item">
            <router-link
              :to="{ name: 'ListUsers' }"
              class="nav-link active" aria-current="page"
              >Usuários
            </router-link>
         </li>
          <li class="nav-item">
            <router-link
              :to="{ name: 'Tasks' }"
              class="nav-link active" aria-current="page"
              >Tarefas
            </router-link>
         </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" @click="LogoutForm">Logout</a>

          </li>
        </ul>

      </div>
    </nav>
  </div>
</template>
<script>
import axios from 'axios';

export default {

  name: 'Nav',
  data (){
    return {
      logout: false,
    }
  },
  props: ['userLogin'],
  methods: {
      async LogoutForm(){
        const response = await axios.post('auth/logout');
        if(response.status == 200){
          this.users = response.data;
        }
        else {
          console.error("Ocorreu um erro no API de logout");

        }
        localStorage.removeItem('token');
        localStorage.removeItem('email');
        this.logout = true;
        this.$router.push('/');
    }
  }
}
</script>
<style lang="scss">
.nav{
  justify-content: flex-end;
}
</style>
