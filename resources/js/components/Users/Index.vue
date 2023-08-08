<template>
    <div class="col-12 text-center">
    </div>
    <div class="col-12">
        <div class="col-12">
            <button type="button" class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#modalUser" @click="action('insert')">
                Nuevo registro
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-user" id="tablauser" width="100%" cellspacing="0" >
                <thead>
                    <tr>
                        <!-- <th></th> -->
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>E-Mail</th>
                        <th>Documento</th>
                        <th>Usuario</th>
                        <th>Password</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <!-- <th></th> -->
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>E-Mail</th>
                        <th>Documento</th>
                        <th>Usuario</th>
                        <th>Password</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr v-for="(user, index) in users" :key="index">
                        <td>{{ user.nombre }}</td>
                        <td>{{ user.apellido }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.documento }}</td>
                        <td >{{ user.usuario }}</td>
                        <td>{{ user.password }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-info btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#modalUser" @click="action('edit',user.id)"><i class='bx bxs-edit' ></i></button>
                            <button class="btn btn-danger btn-circle btn-sm"  @click="deleteData(user.id)"><i class='bx bxs-trash' ></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <modal-user ref="modal_form"></modal-user>
    </div>
</template>
<script>
    import axios from "axios";
    import Modal from "./Modal.vue";
    export default{

        components: {
            'modal-user' : Modal,
        },
        data(){
            return{

                items: {},
                loading: false,
                load: false,
                users:{},
                roles: []
            }
        },
        created(){
            this.getData()
            this.getRoles()
        },

        methods:{

            action(tipo,id){
                this.$refs.modal_form.setData(tipo,id, this.roles)
            },

            getData(){
                axios.get('/user/get').then(res=>{
                    this.users = res.data.user
                    this.load=true
                    this.loading=true
                })
            },

            deleteData(id){
                axios.get(`/user/delete/${id}`).then(res=>{
                    if(res.data.status){
                        this.getData()
                    }
                })
            },

            getRoles(){
                axios.get('/roles/get').then(res=>{
                    this.roles = res.data.roles
                })
            }


        },
    }

</script>
