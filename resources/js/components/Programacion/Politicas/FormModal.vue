<template>
    <!-- Modal -->
    <div class="modal fade" id="modalPolitica" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form @submit.prevent="saveProduct">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFullTitle">Crear un nuevo Politica:</h5>
                        <button type="button" class="btn-close" @click="$parent.closeFormModal()"
                        ></button>
                    </div>
                    <div class="modal-body py-0">
                            <div class="card-body row">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Selecciona un Hecho</label>
                                    <select class="form-select" name="" v-model="politica.hecho_id">
                                        <option v-for="(hecho, index) in hechos" :key="index" :value="hecho.id">{{ hecho.nombre }}</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nombre</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" v-model="politica.nombre" >
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Peso (%)</label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" class="form-control" v-model="politica.peso">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Descripción</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" v-model="politica.descripcion">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary me-1" @click="$parent.closeFormModal()">Close</button>
                        <button type="submit" class="btn btn-primary">{{ !this.politica.id ?  'Agregar' : 'Editar' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['data_politica'],
    data(){
        return{
            hechos: [],
            politica: this.data_politica
        }
    },
    created() {
        this.getPerido()
        this.getHechos()
    },
    methods:{
        getPerido(){
            this.politica.periodo_id = 1
        },
        getHechos(){
            axios.get('/hechos-get').then(res=>{
                console.log(res);
                this.hechos = res.data.hechos
            }).catch(error => {
                console.log(error);
            })
        },
        saveProduct(){
            if (this.politica.id) {
                axios.put(`/politicas/${this.politica.id}`, this.politica).then(res=>{
                    console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        this.$parent.closeFormModal()
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            } else {
                axios.post('/politicas', this.politica).then(res=>{
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
