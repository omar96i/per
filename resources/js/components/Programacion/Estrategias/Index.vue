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
                        <th>Programas</th>
                        <th>Nombre</th>
                        <th>Peso(%)</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(estrategia, index) in estrategias" :key="index">
                        <!-- <td>{{ hecho.periodo }}</td> -->
                        <td>{{ estrategia.hecho.nombre }}</td>
                        <td>{{ estrategia.politica.nombre }}</td>
                        <td>{{ estrategia.nombre }}</td>
                        <td>{{ estrategia.peso }}</td>
                        <td>{{ estrategia.descripcion }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-info btn-circle btn-sm me-1" @click="openFormModal('edit', estrategia)"><i class='bx bxs-edit' ></i></button>
                            <button class="btn btn-danger btn-circle btn-sm"  @click="deleteData(estrategia.id)"><i class='bx bxs-trash' ></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form-modal v-if="form_modal" :data_estrategia="this.data_estrategia"></form-modal>
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
            estrategias: [],
            data_estrategia: {},
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
                this.data_estrategia = {
                    id: '',
                    hecho_id: '',
                    periodo_id: '',
                    politica_id: '',
                    nombre: '',
                    peso: '',
                    descripcion: ''
                }
            } else {
                this.data_estrategia = data
            }
            this.form_modal = true
            setTimeout(() => {
                $('#modalEstrategia').modal('show')
            }, 300);
        },
        closeFormModal(){
            $('#modalEstrategia').modal('hide')
            setTimeout(() => {
                this.form_modal = false
                this.getData()
            }, 300);
        },
        getData(){
            axios.get('/estrategias-get').then(res=>{
                console.log(res);
                this.estrategias = res.data.estrategias
            }).catch(error => {
                console.log(error);
            })
        },
        deleteData(id){
            axios.delete(`/estrategias/${id}`).then(res=>{
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
