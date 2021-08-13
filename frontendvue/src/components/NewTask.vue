<template>
    <div class="Register">
        <form @submit.prevent="DataForm">
           <div class="form-group">
              <p class="h2 text-secondary">Nova Tarefa</p>
           </div>
           <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Tarefa</label>
                <input type="text" class="form-control form-control-sm" v-model="task" placeholder="Tarefa" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Data de Conclusão</label>
                <input type="date" class="form-control" v-model="done" placeholder="Data de Conlusão" required>
            </div>
            <div>
                <p v-if="erroSenha" class="text-danger"></p>
                <button class="btn btn-primary btn-block"> Registrar</button>
            </div>
        </form>
    </div>
</template>
<script>
import axios from 'axios'

    export default {
        name: 'RegisterTask',
        props: ['userLogin'],
        data(){
            return {
                task : '',
                done: '',
                erroSenha: '',
            }
        },
        methods: {
        async DataForm(){
                // const form = {
                //     task : this.task,
                //     done: this.done,
                // }
                const response = await axios.post('task/store', {
                    task : this.task,
                    done: this.done,
                })
                if(response.status == 200){
                   //console.log(response);
                   this.$router.push('/ListTasksView');
                }
                else {
                   console.error("Ocorreu um erro no API de Inserir Tarefa");
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
