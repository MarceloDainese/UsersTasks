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
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" v-if="task.status==1" checked>
                <label class="form-check-label" for="exampleRadios1">
                  A Fazer
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" v-if="task.status==2" checked>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" v-if="task.status!=2">
                <label class="form-check-label" for="exampleRadios2">
                  Em Andamento
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" v-if="task.status==3" checked>
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" v-if="task.status!=3">
                <label class="form-check-label" for="exampleRadios3">
                  Concluido
                </label>
              </div>
            </td>
            <td>Alterar | Deletar
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
    }
  }
}
</script>
<style scoped>
</style>
