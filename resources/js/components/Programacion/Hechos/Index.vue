<template>
    <div class="col-12">
        <h5 class="my-1">Periodo establecido desde: 01/01/2021 hasta: 31/12/2024</h5>
        <div class="col-12">
            <button type="button" class="btn btn-info my-2" @click="openFormModal('insert', null)">
                Nuevo registro
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-periodo" width="100%" cellspacing="0" >
                <thead>
                    <tr>
                        <!-- <th>Periodo</th> -->
                        <th>Nombre</th>
                        <th>Peso(%)</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(hecho, index) in hechos" :key="index">
                        <!-- <td>{{ hecho.periodo }}</td> -->
                        <td>{{ hecho.nombre }}</td>
                        <td>{{ hecho.peso }}</td>
                        <td>{{ hecho.descripcion }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-info btn-circle btn-sm me-1" @click="openFormModal('edit', hecho)"><i class='bx bxs-edit' ></i></button>
                            <button class="btn btn-danger btn-circle btn-sm"  @click="deleteData(hecho.id)"><i class='bx bxs-trash' ></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form-modal v-if="form_modal" :data_hecho="this.data_hecho"></form-modal>
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
            hechos: [],
            data_hecho: {},
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
                this.data_hecho = {
                    id: '',
                    nombre: '',
                    peso: '',
                    descripcion: ''
                }
            } else {
                this.data_hecho = data
            }
            this.form_modal = true
            setTimeout(() => {
                $('#modalHecho').modal('show')
            }, 300);
        },
        closeFormModal(){
            $('#modalHecho').modal('hide')
            setTimeout(() => {
                this.form_modal = false
                this.getData()
            }, 300);
        },
        getData(){
            axios.get('/hechos-get').then(res=>{
                console.log(res);
                this.hechos = res.data.hechos
            }).catch(error => {
                console.log(error);
            })
        },
        deleteData(id){
            axios.delete(`/hechos/${id}`).then(res=>{
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
