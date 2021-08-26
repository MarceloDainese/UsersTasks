<template>
  <div class="contents-pages">
    <div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">
                <router-link :to="{ name: 'Register' }"
                    class="nav-link active btn-sm" aria-current="page"> + Inserir Novo Usuário
                </router-link>
            </th>
          </tr>
        </thead>
        <tbody>
          <List v-for="(user, index) in users" :key="user.id" :user="user" :index="index" @visualizar="visualizar" @alterar="alterar" @deletar="deletar" class="table-active" />          
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
import List from './List.vue';

export default {
  name: "ListUsers",
  props: {
  },
  components:{
      List
  },
  data() {
    return{
      users: [],

    }
  },
  methods: {
    async getUsers(){
      const response = await axios.get('users');
        if(response.status == 200){
          this.users = response.data;
        }
        else {
          console.error("Ocorreu um erro no API Users");

        }
    },
    visualizar(id){
      alert(id);
    }
  },
  mounted(){
     this.getUsers();
  }
}
</script>
<style scoped>
</style>
