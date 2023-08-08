<template>
    <div class="col-12">
        <div class="col-12">
            <h5 class="my-1">Periodo establecido desde: 01/01/2021 hasta: 31/12/2024</h5>
            <button type="button" class="btn btn-info my-2" @click="openFormModal('insert', null)">
                Nuevo registro
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-periodo" width="100%" cellspacing="0" >
                <thead>
                    <tr>
                        <!-- <th>Periodo</th> -->
                        <th>Hecho</th>
                        <th>Periodo</th>
                        <th>Nombre</th>
                        <th>Peso(%)</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(programa, index) in programas" :key="index">
                        <!-- <td>{{ hecho.periodo }}</td> -->
                        <td>{{ programa.hecho.nombre }}</td>
                        <td>{{ programa.politica.nombre }}</td>
                        <td>{{ programa.nombre }}</td>
                        <td>{{ programa.peso }}</td>
                        <td>{{ programa.descripcion }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-info btn-circle btn-sm me-1" @click="openFormModal('edit', programa)"><i class='bx bxs-edit' ></i></button>
                            <button class="btn btn-danger btn-circle btn-sm"  @click="deleteData(programa.id)"><i class='bx bxs-trash' ></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form-modal v-if="form_modal" :data_programa="this.data_programa"></form-modal>
    </div>
</template>
<script>
import FormModal from './FormModal.vue'
export default{
    components: {
        FormModal
    },
    data(){
        return{
            programas: [],
            data_programa: {},
            form_modal: false,
        }
    },
    created(){
        this.getData()
    },
    methods:{
        openFormModal(tipo, data){
            this.form_modal = false
            if (tipo == 'insert') {
                console.log('entro');
                this.data_programa = {
                    id: '',
                    hecho_id: '',
                    politica_id: '',
                    nombre: '',
                    peso: '',
                    descripcion: ''
                }
            } else {
                this.data_programa = data
            }
            this.form_modal = true
            setTimeout(() => {
                $('#modalPrograma').modal('show')
            }, 300);
        },
        closeFormModal(){
            $('#modalPrograma').modal('hide')
            setTimeout(() => {
                this.form_modal = false
                this.getData()
            }, 300);
        },
        getData(){
            axios.get('/programas-get').then(res=>{
                console.log(res);
                this.programas = res.data.programas
            }).catch(error => {
                console.log(error);
            })
        },
        deleteData(id){
            axios.delete(`/programas/${id}`).then(res=>{
                if(res.data.status){
                    alert(res.data.message)
                    this.getData()
                }
            }).catch(error => {
                console.log(error);
            })
        },
    },
}
</script>
