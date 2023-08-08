<template>
    <!-- Modal -->
    <div class="modal fade" id="modalAsignacion" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFullTitle">Formulario de Asignacion</h5>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    ></button>
                </div>
                    <div class="modal-body">
                        <div class="card-body row">
                            <Label>Asignar usuarios al periodo {{periodo.nombre}}</Label>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname"></label>
                                <select class="form-select" v-model="data.user_id">
                                    <option v-for="(user, index) in users" :key="index" :value="user.id">{{user.nombre}}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname"></label>
                                <select class="form-select" v-model="data.tipo_acceso">
                                    <option value="">Selecciona una opcion</option>
                                    <option value="lectura">Lectura</option>
                                    <option value="escritura">Escritura</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-periodo" id="tablaperiodo" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <!-- <th></th> -->
                                        <th>Nombre</th>
                                        <th>Tipo de acceso</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <!-- <th></th> -->
                                        <th>Nombre</th>
                                        <th>Tipo de acceso</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr v-for="(user, index) in periodo.users" :key="index">
                                        <td>{{ user.user.nombre }}</td>
                                        <td>{{ user.tipo_acceso }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-danger btn-circle btn-sm"  @click="deleteData(user.id)"><i class='bx bxs-trash' ></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" id="cierrame" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cerrar
                    </button>
                    <button type="submit" class="btn btn-primary" @click="action">Asignar Usuario</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props:['users'],

        data(){
            return{
                data : {
                    user_id : '',
                    tipo_acceso : ''
                },
                periodo : {}
            }
        },
        methods:{

            setData(periodo){
                this.periodo = periodo
            },

            deleteData(id){
                axios.get(`/periodo/delete/asignacion/${id}`).then(res=>{
                    window.location.reload()
                }).catch(error=>{
                    console.log(error.response)
                })
            },

            action(){
                var request = {
                    'periodo_id' : this.periodo.id,
                    'user_id' : this.data.user_id,
                    'tipo_acceso' : this.data.tipo_acceso
                }
                axios.post('/periodo/asignar', request).then(res=>{
                    this.data = {
                        user_id : '',
                        tipo_acceso : ''
                    }
                    this.periodo = res.data.periodo
                    this.$parent.getData()
                    setTimeout(()=>{
                        document.getElementById("cierrame").click()
                    },200)
                }).catch(res=>{
                    console.log(res.response)
                })
            }
        }
}

</script>
