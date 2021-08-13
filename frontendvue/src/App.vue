<template>
  <div class="app">
    <Nav :userLogin="userLogin" />

  <router-view :userLogin="userLogin" />
  </div>
</template>
<script>
import Nav from "./components/Navbar.vue"
import axios from 'axios';

export default {
  name: 'App',
    components :{
      Nav
    },
    data() {
        return{
        userLogin : '',
    }
    },
    async created(){
      const response = await axios.get('user?email='+localStorage.getItem('email'));
          this.userLogin = response.data;
          console.log(this.userLogin);
    }
}
</script>
<style scoped>
*{
  padding: 2px;
}
</style>
