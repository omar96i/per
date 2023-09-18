<template>
    <div class="row row-bordered border-bottom-0">
        <div class="col-12 col-md-6 px-4">
            <div class="mb-2">
                <h5 class="my-0">Nombre de la meta:</h5>
                <p>{{ meta.nombre }}</p>
            </div>
            <div class="mb-2">
                <h5 class="my-0">Indicador de Producto:</h5>
                <p>{{ meta.indicador_meta }}</p>
            </div>
            <div class="mb-2">
                <h5 class="my-0">Tipo de Indicador:</h5>
                <p>{{ meta.indicador.nombre }}</p>
            </div>
            <div class="mb-2 row">
                <div class="col-6 d-flex">
                    <h5 class="my-0 me-1">Linea base:</h5>
                    <p>{{ meta.linea_base }}</p>
                </div>
                <div class="col-6 d-flex">
                    <h5 class="my-0 me-1">Meta de Cuaternio:</h5>
                    <p>{{ meta.meta_cuatrienio }}</p>
                </div>
            </div>
            <div class="mb-2">
                <!-- lista de proyectos relacionados -->
                <h5 class="my-0">Proyectos:</h5>
                <p v-for="(proyecto, index) in meta.proyectos" :key="index">{{ proyecto.proyecto.nombre }}</p>
            </div>
        </div>
        <div class="col-12 col-md-6 px-4">
            <div class="table-responsive">
                <div class="d-flex justify-content-between mb-2">
                    <h5 class="my-auto">Programacion de la meta:</h5>
                    <button class="btn btn-primary btn-sm" @click="changeProgramacion()">Editar</button>
                </div>
                <table v-if="!form_programacion" class="table table-bordered table-periodo" width="100%" cellspacing="0" >
                    <thead>
                        <tr class="table-primary">
                            <th>Año</th>
                            <th>Meta Alcanzada</th>
                            <th>Porcentaje de ejcución</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(n, index) in 4" :key="index">
                            <td>{{ parseInt(meta.year) + index }}</td>
                            <td>
                                {{ meta[`meta_year_${n}`] }}
                            </td>
                            <td>
                                {{ meta[`ejecucion_year_${n}`] }}%
                            </td>
                        </tr>
                        <tr>
                            <td>Acumulado</td>
                            <td>{{ acumulado_metas }}</td>
                            <td class="text-nowrap">Promedio:  {{ acumulado_porcentaje }} %</td>
                        </tr>
                    </tbody>
                </table>
                <form v-else @submit.prevent="saveMeta()">
                    <table class="table table-bordered table-periodo" width="100%" cellspacing="0">
                        <thead>
                            <tr class="table-primary">
                                <th>Año</th>
                                <th>Meta Alcanzada</th>
                                <th>Porcentaje de ejcución</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(n, index) in 4" :key="index">
                                <td>{{ parseInt(meta.year) + index }}</td>
                                <td>
                                    {{ meta[`meta_year_${n}`] }}
                                </td>
                                <td class="p-0">
                                    <input v-model="meta[`ejecucion_year_${n}`]" id="input_porcentaje" type="number" class="form-control" placeholder="%">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center my-2">
                        <button class="btn btn-primary" type="submit">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['meta'],
    data() {
        return {
            form_programacion: false,
            acumulado_metas: 0,
            acumulado_porcentaje: 0,
        }
    },
    created() {
        this.calcularAcumulado()
    },
    methods: {
        changeProgramacion(){
            this.form_programacion ? this.form_programacion = false : this.form_programacion = true
            this.calcularAcumulado()

        },
        calcularAcumulado(){
            this.acumulado_metas = parseInt(this.meta.meta_year_1) + parseInt(this.meta.meta_year_2) + parseInt(this.meta.meta_year_3) + parseInt(this.meta.meta_year_4)
            this.acumulado_porcentaje = (this.meta.ejecucion_year_1 + this.meta.ejecucion_year_2 + this.meta.ejecucion_year_3 + this.meta.ejecucion_year_4) / 4
        },
        saveMeta(){
            axios.put(`/metas-productos/${this.meta.id}`, this.meta).then(res=>{
                console.log(res)
                if (res.data.status) {
                     this.$swalMini('success', `${res.data.message}`)
                     this.changeProgramacion()
                }
            }).catch(error=>{
                console.log(error.response)
            })
        },

    },
}
</script>
