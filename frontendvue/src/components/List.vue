<template>
          <tr>                   
            <th scope="row"> </th>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.phone }}</td>
            <td>
              <button class="btn btn-secondary btn-sm" @click="$emit('visualizar', user.id)">Visualizar</button>
              <a href="#" @click="$emit('alterar', user.id)">| Alterar</a> 
              <a href="#" @click="$emit('deletar', user.id)">| Deletar</a>
            </td>
          </tr>


</template>
<script>
//import axios from 'axios';

export default {
  name: "ListUsers",
  props: {
    user:{
        type: Object,
        require: true
    }
  },
  data() {
    return{
        keysData: ['user.name','user.email','user.phone'],
    }
  },
  methods: {
    // async getUsers(){
    //   const response = await axios.get('users');
    //     if(response.status == 200){
    //       this.users = response.data;
    //     }
    //     else {
    //       console.error("Ocorreu um erro no API Users");

    //     }
    // }
  },
  computed: {

  },
  mounted(){
    //this.getUsers();
  }
}
</script>
<style scoped>
</style>
