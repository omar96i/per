<template>
    <div class="col-12 text-center">
    </div>
    <div class="col-12">
        <div class="col-12">
            <button type="button" class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#modalPeriodo" @click="action('insert')">
                Nuevo registro
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-periodo" id="tablaperiodo" width="100%" cellspacing="0" >
                <thead>
                    <tr>
                        <!-- <th></th> -->
                        <th>Nombre</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Final</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <!-- <th></th> -->
                        <th>Nombre</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Final</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr v-for="(periodo, index) in periodos" :key="index">
                        <td>{{ periodo.nombre }}</td>
                        <td>{{ periodo.fecha_ini }}</td>
                        <td>{{ periodo.fecha_fin }}</td>
                        <td>{{ periodo.estado }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-info btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#modalPeriodo" @click="action('edit',periodo.id)"><i class='bx bxs-edit' ></i></button>
                            <button type="button" class="btn btn-info btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#modalAsignacion" @click="openAsignarModal(periodo)">Asignar</button>
                            <button class="btn btn-danger btn-circle btn-sm"  @click="deleteData(periodo.id)"><i class='bx bxs-trash' ></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <modal-periodo ref="modal_form"></modal-periodo>
        <modal-asignar ref="modal_asignar" :users="users"></modal-asignar>
    </div>
</template>
<script>
    import axios from "axios";
    import Modal from "./Modal.vue";
    import ModalAsignar from "./ModalAsignar.vue"


    export default{
        components: {
            'modal-periodo' : Modal,
            ModalAsignar
        },
        data(){
            return{
                users : [],
                items: {},
                loading: false,
                load: false,
                periodos:{},
            }
        },

        created(){
            this.getData()
            this.getUsers()
        },

        methods:{
            action(tipo,id){
                this.$refs.modal_form.setData(tipo,id)
            },
            openAsignarModal(periodo){
                this.$refs.modal_asignar.setData(periodo)
            },
            getData(){
                axios.get('/periodo/get').then(res=>{
                    this.periodos = res.data.periodo
                    this.load=true
                    this.loading=true
                })
            },
            getUsers(){
                axios.get('/user/get').then(res=>{
                    this.users = res.data.user
                })
            },
            deleteData(id){
                console.log(id)
                        axios.get(`/periodo/delete/${id}`).then(res=>{
                            if(res.data.status){
                                this.getData()
                            }
                        })
                        return
                    },


            },
    }

</script>
