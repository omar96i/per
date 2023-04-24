<template>
    <div class="col-12">
        <div class="col-12">
            <button class="btn btn-primary m-1" :class="{'active' :loadTable}" @click="select()">Permisos</button>
            <button class="btn btn-primary" :class="{'active' :loadTableRoles }" @click="selectType('general')">Roles</button>
        </div>
        
        
    </div>
    <div class="col-12" v-if="loadTable">
        <table-permisos-vue></table-permisos-vue>
    </div>
    <div class="col-12" v-if="loadTableRoles">
        <table-roles-vue  :type="type" :id="id"></table-roles-vue>
    </div>
    <div>
        <modal-permisos ref="modal_form"></modal-permisos>
    </div>
    
    
    
</template>
<script>
    import axios from "axios";
    import ModalPermisos from "./ModalPermisos.vue";
    
    import TableRolesVue from './TableRoles.vue'
    import TablePermisosVue from './TablePermisos.vue'
    
    export default{
        components: {
            'modal-permisos' : ModalPermisos,
            TablePermisosVue,
            TableRolesVue
        },
        data(){
            return{
                file : '',
                items : [],
                loading : false,        
                type : 'general',                
                loadTable :true ,
                loadTableRoles :false ,
                id : '',
                loadPowerBi: false,
            }
        },        
        methods:{
            action(tipo,id = false){
                if(tipo == 'delete'){
                    this.deleteData(id)
                    return
                    
                }
                console.log(this.$refs.modal_form)
                this.$refs.modal_form.setData(tipo, id)
            },
            getData(){
                axios.get('/permisos/get').then(res=>{
                    this.items = res.data.permission
                    this.items = []
                    res.data.permissions.forEach(permission => {
                        this.items.push({
                            id :permission.id,
                            name: permission.name,
                            guard_name: permission.guard_name

                        })
                    });
                }).catch(res=>{
                    console.log(res.response)
                })
            },
           
            selectType(type, id = false){
                this.type = type
                if(id){
                    this.id = id
                }
                this.loadPowerBi = false
                this.loadTableRoles = true
                this.loadTable = false
            },
            select(){
                this.type = 'general'
                this.id = ''
                this.loadPowerBi = false
                this.loadTable = true
                this.loadTableRoles = false
            }

        }
    }

</script>
