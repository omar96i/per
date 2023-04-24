<template>
    <!-- Modal -->
    <div class="modal fade" id="modalRoles" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content" v-if="!loading_data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFullTitle">Formulario de registro</h5>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    ></button>
                </div>
                    <div class="modal-body">
                        <div class="card-body row">
                            <Label>Rol</Label>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nombre</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" v-model="roles.name" >
                                    </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Guard Name</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" v-model="roles.guard_name" >
                                </div>
                            </div>
                        </div>
                    </div>  
                <div class="modal-footer" v-if="!loading">
                    <button type="button" id="cierrame" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                    </button>
                    <button type="submit" class="btn btn-primary" @click="action">{{ (tipo == 'insert') ?  'Agregar' : 'Editar' }}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


    import axios from 'axios';
    export default {
        
        props:['id', 'tipo'],

        data(){
            return{
                
                data:{},
                roles:{
                    name:"",
                    guard_name:""  
                
                },
                tipo: '',
                loading: false,
                loading_data : false,
                ruta:''
                
                
            }
        },
        methods:{
            
            
            getData(id){
            axios.get(`/roles/getData/${id}`).then(res=>{
                
                this.roles = res.data.roles;
                console.log("Datos de Roles", this.roles)
                this.loading_data = false
            }).catch(res=>{
                
                console.log(res.response)
            })
            },
            
            setData(tipo, id){
                console.log(tipo + ' ' + id)
                
                if(tipo == 'insert'){
                    this.loading_data = true
                    console.log(tipo)
                    this.resetData()
                    this.tipo = tipo

                }
                if(tipo == 'edit'){
                    this.loading_data = true
                    console.log(tipo)
                    this.getData(id)
                    this.tipo = tipo
                }
            },
            resetData(){
                this.data = {}
                setTimeout(()=>{
                    this.loading_data = false
                },200)
            },

            action(){
                console.log(this.roles)
        
            axios.post((this.tipo == 'insert') ? '/roles/store' : `/roles/update/${this.roles.id}`,this.roles
            ).then(res=>{
                this.loading = false
                
                console.log(res.data)
                
                if(res.data.status){
                    this.alert('Registro', (this.tipo=='insert') ? 'Agregado' : 'Actualizado', 'success')
                }
                this.$parent.getData()
                
                setTimeout(()=>{
                   document.getElementById("cierrame").click()  
                },200)
                
                
            }).catch(res=>{
                this.alert('Registro', 'Error en el servidor', 'error')
                console.log(res.response)
                this.loading = false
            })
            }
        }
}
                
</script>
