<template>
    <div class="Register">
        <form @submit.prevent="DataForm" class="form-new-task" :class="{'exceeded': newTaskCharacterCount > 45 || erroDone !=''}" autocomplete="on">
           <div class="form-group">
              <p class="h2 text-secondary">Nova Tarefa</p>
           </div>
           <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Tarefa</label> ( {{ newTaskCharacterCount }} / 45)
                <input type="text" class="form-control form-control-sm" v-model="task" placeholder="Tarefa" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Data de Conclusão</label>
                    {{ newDateTask }}
                <input type="date" class="form-control" v-model="done" placeholder="Data de Conlusão" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Hora de Conclusão</label>                    
                <input type="time" class="form-control" v-model="time" placeholder="Data de Conlusão" required>
            </div>            
            <div>
                <p v-if="erroTask">Excedeu o limite máximo do campo Tarefa </p>
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
                time: '',
                erroTask: '',
                erroDone: ''
            }
        },
        computed: {

            newTaskCharacterCount(){ // validação Task
                if(this.task.length <= 45){
                    this.erroTask = "";
                    return this.task.length;
                }
                else{                     
                    this.erroTask = "Passou o limite de characters";
                    return this.task.length;
                 }                
            },

            newDateTask(){ // validação data de conclusão
                if(this.done){                
                    if(this.done < this.nowDate() ){
                        this.erroDone = "é menor que a data atual";
                        return  this.erroDone;
                    }
                    else{
                        this.erroDone = '';
                    }
                }
            }                    
        },        
        methods: {

            nowDate() {
                var dateMachine = new Date();
                var dia = this.addZero(dateMachine.getDate());
                var mes = this.addZero(dateMachine.getMonth() + 1);
                var ano = dateMachine.getFullYear();
                var dateAtualFormated = `${ano}-${mes}-${dia}`;                
                return dateAtualFormated;
            },
            addZero(numero){
                if (numero <= 9){ 
                    return "0" + numero;
                }
                else{
                    return numero; 
                }
            },

            async DataForm(){                
            if((!this.erroTask)&&(!this.erroDone)){
            var doneTime = this.done +' '+ this.time; 
                const response = await axios.post('task/store', {
                        task : this.task,
                        done: doneTime,
                    })
                if(response.status == 200){
                    this.$router.push('/Tasks');
                }
                else {
                    console.error("Ocorreu um erro no API de Inserir Tarefa");
                }
            }            
            }
        },
        mounted(){
           //this.nowDate()
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
.form-new-task {
    color: dimgray;
    &.exceeded {
        border-color: red;
        color: red;

        input{
            border-color: red;            
        }
        
        button{
            background-color: red;
            border: none;
            color: white;
        }
    }
}
</style>
