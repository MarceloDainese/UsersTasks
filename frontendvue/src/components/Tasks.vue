<template>
  <div class="contents-pages">
    <div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tarefas</th>
            <th scope="col">Data de Conclusão</th>
            <th scope="col">Status</th>
            <th scope="col">
                <router-link :to="{ name: 'NewTask' }"
                    class="nav-link active btn-sm" aria-current="page"> + Inserir Nova Tarefa
                </router-link>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="task in tasks" :key="task.id" class="table-active">
            <th scope="row"> </th>
            <td>{{ task.task }}</td>
            <td>{{ task.done }}</td>
            <td>
              <div class="form-check">
                <input class="form-check-input" type="radio" v-model="status[task.id]" id="aFazer" value="1" v-if="task.status==1" checked>
                <label class="form-check-label" for="aFazer">
                  A Fazer
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" v-model="status[task.id]" id="emAndamento" value="2" v-if="task.status==2" checked>
                <input class="form-check-input" type="radio" v-model="status[task.id]" id="emAndamento" value="2" v-if="task.status!=2">
                <label class="form-check-label" for="emAndamento">
                  Em Andamento
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" v-model="status[task.id]" id="Concluido" value="3" v-if="task.status==3" checked>
                <input class="form-check-input" type="radio" v-model="status[task.id]" id="Concluido" value="3" v-if="task.status!=3">
                <label class="form-check-label" for="Concluido">
                  Concluido
                </label>
              </div>
            </td>
            <td>
              <button class="btn btn-primary btn-sm" @click="updateTask(task.id)">Alterar</button> | 
              <button class="btn btn-danger btn-sm" @click="deleteTask(task.id)">Deletar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
import axios from 'axios';

export default {
  name: "Tasks",
  props: {

  },
  data() {
    return{
      tasks: [],
      status: [],
    }
  },
  mounted(){
    this.gettasks();
  },
  methods: {
    async gettasks(){
        const response = await axios.get('tasks');
        if(response.status == 200){
          this.tasks = response.data;
        }
        else {
          console.error("Ocorreu um erro no API tasks");

        }
    },
    updateTask(id){
        alert(id);
    },

    async deleteTask(id){
        const responseDelete = await axios.delete('tasks/delete?id='+id);
        if(responseDelete.status == 200){
          //alert('Deletou');
          //this.$router.push('/Tasks');
          this.gettasks();
        }
        else {
          console.error("Ocorreu um erro no API tasks");

        }
    }
  }
}
</script>
<style scoped>
.ListTask{
  font-weight: bold;
  color: blueviolet;
}
</style>
