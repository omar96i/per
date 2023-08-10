<template>
    <!-- Modal -->
    <div class="modal fade" id="modalMeta" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <form @submit.prevent="saveProduct">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFullTitle">Crear una nueva Meta:</h5>
                        <button type="button" class="btn-close" @click="$parent.closeFormModal()"
                        ></button>
                    </div>
                    <div class="modal-body py-0">
                            <div class="card-body row">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Selecciona un Hecho</label>
                                    <select class="form-select" name="" v-model="meta.hecho_id" required>
                                        <option v-for="(hecho, index) in hechos" :key="index" :value="hecho.id">{{ hecho.nombre }}</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Selecciona una Politica</label>
                                    <select class="form-select" name="" v-model="meta.politica_id" required>
                                        <option v-for="(politica, index) in politicas" :key="index" :value="politica.id">{{ politica.nombre }}</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Selecciona un Programa</label>
                                    <select class="form-select" name="" v-model="meta.programa_id" required>
                                        <option v-for="(programa, index) in programas" :key="index" :value="programa.id">{{ programa.nombre }}</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Código de meta</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" v-model="meta.codigo" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nombre de meta</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" v-model="meta.nombre" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Indicador de meta</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" v-model="meta.indicador_meta" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Peso (%)</label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" class="form-control" v-model="meta.peso" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Selecciona tipo de indicador</label>
                                    <select class="form-select" name="" v-model="meta.indicador_id" required>
                                        <option value="1">Ejemplo de indicador</option>
                                        <option v-for="(indicador, index) in indicadores" :key="index" :value="indicador.id">{{ indicador.nombre }}</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Línea base</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" v-model="meta.linea_base" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Año</label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" class="form-control" id="yearInput" v-model="meta.year" placeholder="Ingrese un año" min="1900" max="2099" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Meta cuatrienio</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" v-model="meta.meta_cuatrienio" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Meta año 1</label>
                                    <div class="input-group input-group-merge">
                                        <input type="year" class="form-control" v-model="meta.meta_year_1" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Meta año 2</label>
                                    <div class="input-group input-group-merge">
                                        <input type="year" class="form-control" v-model="meta.meta_year_2" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Meta año 3</label>
                                    <div class="input-group input-group-merge">
                                        <input type="year" class="form-control" v-model="meta.meta_year_3" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Meta año 4</label>
                                    <div class="input-group input-group-merge">
                                        <input type="year" class="form-control" v-model="meta.meta_year_4" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Recursos cuatrienio</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" v-model="meta.recurso_cuatrienio" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Recurso año 1</label>
                                    <div class="input-group input-group-merge">
                                        <input type="year" class="form-control" v-model="meta.recurso_year_1" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Recurso año 2</label>
                                    <div class="input-group input-group-merge">
                                        <input type="year" class="form-control" v-model="meta.recurso_year_2" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Recurso año 3</label>
                                    <div class="input-group input-group-merge">
                                        <input type="year" class="form-control" v-model="meta.recurso_year_3" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="basic-default-fullname">Recurso año 4</label>
                                    <div class="input-group input-group-merge">
                                        <input type="year" class="form-control" v-model="meta.recurso_year_4" required>
                                    </div>
                                </div>
                                <div class=" mb-3">
                                    <label class="form-label" for="basic-default-fullname">Gerente de meta</label>
                                    <div class="input-group input-group-merge">
                                        <select class="form-select" v-model="meta.user_id" required>
                                            <option value="1">Ejemplo de Gerente</option>
                                            <option v-for="(gerente, index) in gerentes" :key="index" :value="meta.id">{{ meta.nombre }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary me-1" @click="$parent.closeFormModal()">Close</button>
                        <button type="submit" class="btn btn-primary">{{ !this.meta.id ?  'Agregar' : 'Editar' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['data_meta'],
    data(){
        return{
            hechos: [],
            politicas: [],
            programas: [],
            indicadores: [],
            gerentes: [],
            meta: this.data_meta
        }
    },
    created() {
        this.getPerido()
        this.getHechos()
        this.getPoliticas()
        this.getProgramas()
        this.getIndicadores()
        this.getGerentes()
    },
    methods:{
        getPerido(){
            this.meta.periodo_id = 1
            // axios.get('/periodo-get').then(res=>{
            //     console.log(res);
            // }).catch(error => {
            //     console.log(error);
            // })
        },
        getHechos(){
            axios.get('/hechos-get').then(res=>{
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
        getProgramas(){
            axios.get('/programas-get').then(res=>{
                this.programas = res.data.programas
            }).catch(error => {
                console.log(error);
            })
        },
        getIndicadores(){
            // axios.get('/indicadores-get').then(res=>{
            //     console.log(res);
            // }).catch(error => {
            //     console.log(error);
            // })
        },
        getGerentes(){
            // axios.get('/gerentes-get').then(res=>{
            //     console.log(res);
            // }).catch(error => {
            //     console.log(error);
            // })
        },
        saveProduct(){
            if (this.meta.id) {
                console.log(this.meta);
                axios.put(`/metas-productos/${this.meta.id}`, this.meta).then(res=>{
                    console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        this.$parent.closeFormModal()
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            } else {
                axios.post('/metas-productos', this.meta).then(res=>{
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
