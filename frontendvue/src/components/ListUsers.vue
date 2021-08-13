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
          <tr v-for="user in users" :key="user.id" class="table-active">
            <th scope="row"> </th>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.phone }}</td>
            <td> <a href="">Visualizar</a>  | Alterar | Deletar</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
import axios from 'axios';

export default {
  name: "ListUsers",
  props: {
  },
  data() {
    return{
      users: [],
    }
  },
  mounted(){
    this.getUsers();
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
    }
  }
}
</script>
<style scoped>
</style>
