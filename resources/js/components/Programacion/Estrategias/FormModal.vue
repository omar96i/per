<template>
    <!-- Modal -->
    <div class="modal fade" id="modalEstrategia" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form @submit.prevent="saveProduct">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFullTitle">Crear un nuevo Estrategia:</h5>
                        <button type="button" class="btn-close" @click="$parent.closeFormModal()"
                        ></button>
                    </div>
                    <div class="modal-body py-0">
                            <div class="card-body row">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Selecciona un Hecho</label>
                                    <select class="form-select" name="" v-model="estrategia.hecho_id">
                                        <option v-for="(hecho, index) in hechos" :key="index" :value="hecho.id">{{ hecho.nombre }}</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Selecciona una Politica</label>
                                    <select class="form-select" name="" v-model="estrategia.politica_id">
                                        <option v-for="(politica, index) in politicas" :key="index" :value="politica.id">{{ politica.nombre }}</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nombre</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" v-model="estrategia.nombre" >
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Peso (%)</label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" class="form-control" v-model="estrategia.peso">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Descripción</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" v-model="estrategia.descripcion">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary me-1" @click="$parent.closeFormModal()">Close</button>
                        <button type="submit" class="btn btn-primary">{{ !this.estrategia.id ?  'Agregar' : 'Editar' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['data_estrategia'],
    data(){
        return{
            hechos: [],
            politicas: [],
            estrategia: this.data_estrategia
        }
    },
    created() {
        this.getPerido()
        this.getHechos()
        this.getPoliticas()
    },
    methods:{
        getPerido(){
            this.estrategia.periodo_id = 1
        },
        getHechos(){
            axios.get('/hechos-get').then(res=>{
                console.log(res);
                this.hechos = res.data.hechos
            }).catch(error => {
                console.log(error);
            })
        },
        getPoliticas(){
            axios.get('/politicas-get').then(res=>{
                console.log(res);
                this.politicas = res.data.politicas
            }).catch(error => {
                console.log(error);
            })
        },
        saveProduct(){
            if (this.estrategia.id) {
                axios.put(`/estrategias/${this.estrategias.id}`, this.estrategia).then(res=>{
                    console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        this.$parent.closeFormModal()
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            } else {
                axios.post('/estrategias', this.estrategia).then(res=>{
                    console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        this.$parent.closeFormModal()
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            }

        }
    }
}

</script>
