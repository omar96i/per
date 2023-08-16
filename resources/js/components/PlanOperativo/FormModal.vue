<template>
    <!-- Modal -->
    <div class="modal fade" id="modalProyect" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form @submit.prevent="saveProduct">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFullTitle">{{ proyecto_id ? 'Crear un nuevo Proyecto:' : 'Editar Proyecto:' }}</h5>
                        <button type="button" class="btn-close" @click="$parent.closeFormModal()"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-pills mb-3 d-flex" id="pills-tab" role="tablist">
                            <li class="nav-item d-flex" role="presentation">
                                <button class="nav-link active" id="form_1_tab" data-bs-toggle="tab" data-bs-target="#form_1" type="button" role="tab" aria-controls="form_1" aria-selected="true">Datos Generales</button>
                            </li>
                            <li class="nav-item d-flex" role="presentation" v-if="proyecto_id">
                                <button class="nav-link" id="form_2_tab" data-bs-toggle="tab" data-bs-target="#form_2" type="button" role="tab" aria-controls="form_2" aria-selected="false">Meta de Productos</button>
                            </li>
                            <li class="nav-item d-flex" role="presentation" v-if="proyecto_id">
                                <button class="nav-link" id="form_3_tab" data-bs-toggle="tab" data-bs-target="#form_3" type="button" role="tab" aria-controls="form_3" aria-selected="false">Presupuestos</button>
                            </li>
                            <li class="nav-item d-flex" role="presentation" v-if="proyecto_id">
                                <button class="nav-link" id="form_4_tab" data-bs-toggle="tab" data-bs-target="#form_4" type="button" role="tab" aria-controls="form_4" aria-selected="false" @click="recargarPresupuestos()">Movimientos financieros</button>
                            </li>
                            <!-- <li class="nav-item d-flex" role="presentation">
                                <button class="nav-link" id="form_5_tab" data-bs-toggle="tab" data-bs-target="#form_5" type="button" role="tab" aria-controls="form_5" aria-selected="false">Certificado</button>
                            </li> -->
                        </ul>
                        <div class="tab-content" id="nav-tabContent">

                            <!-- datos generales -->
                            <div class="tab-pane fade show active" id="form_1" role="tabpanel" aria-labelledby="form_1_tab">
                                <form-proyecto :proyecto_id="proyecto_id" @set-id="setIdProyecto"></form-proyecto>
                            </div>

                            <!-- metas y preupuestos, se podria dividir en 2 el tab -->
                            <div v-if="proyecto_id" class="tab-pane fade" id="form_2" role="tabpanel" aria-labelledby="form_2_tab">
                                <form-metas-de-productos :proyecto_id="proyecto_id"></form-metas-de-productos>
                            </div>

                            <!-- metas y preupuestos, se podria dividir en 2 el tab -->
                            <div v-if="proyecto_id" class="tab-pane fade" id="form_3" role="tabpanel" aria-labelledby="form_3_tab">
                                <form-presupuestos :proyecto_id="proyecto_id"></form-presupuestos>
                            </div>

                            <!-- movimientos financieros -->
                            <div v-if="proyecto_id" class="tab-pane fade" id="form_4" role="tabpanel" aria-labelledby="form_4_tab">
                                <form-movimientos-financieros :proyecto_id="proyecto_id" ref="formMovimientosFinancieros"></form-movimientos-financieros>
                            </div>

                            <!-- certificado -->
                            <!-- <div class="tab-pane fade" id="form_5" role="tabpanel" aria-labelledby="form_5_tab">
                                <div class="col">
                                    <h5>Certificado</h5>
                                    <div class="mb-2">
                                        <b>Nombre del proyecto:</b>
                                        <p>{{ proyecto.nombre }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <label>Codigo presupuestal:</label>
                                        <select class="form-select">
                                            <option value="">---Seleccionar---</option>
                                            <option v-for="presupuesto in lista_presupuestos" :value="presupuesto.id">{{presupuesto.codigo}}</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <b>Presupuesto definitivo $:</b>
                                        <p>valor calculado</p>
                                    </div>
                                    <div class="mb-2">
                                        <b>Ultima ejecución $:</b>
                                        <p>valor calculado</p>
                                    </div>
                                    <div class="mb-2">
                                        <label>Valor certificado $:</label>
                                        <input class="form-control" type="number">
                                    </div>
                                    <div class="text-center my-2 mt-auto">
                                        <button class="btn btn-primary" type="button" @click="alert('vista previa sin funcion')">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary me-1" @click="$parent.closeFormModal()">Cerrar</button>
                        <!-- <button type="submit" class="btn btn-primary">{{ !this.hecho.id ?  'Agregar' : 'Editar' }}</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import FormProyecto from './FormProyecto.vue'
import FormMetasDeProductos from './FormMetasDeProductos.vue'
import FormPresupuestos from './FormPresupuestos.vue'
import FormMovimientosFinancieros from './FormMovimientosFinancieros.vue'
export default {
    components:{
        FormProyecto,
        FormMetasDeProductos,
        FormPresupuestos,
        FormMovimientosFinancieros
    },
    props: ['id'],
    data(){
        return{
            proyecto_id: this.id,
            select_hechos: [],
            select_politicas: [],
            select_programas: [],
            select_metas_productos: [],
            select_indicadores: [],

            proyecto: {
                hecho_id: '',
                politica_id: '',
                programa_id: '',
                periodo_id: '',
                vigencia: '',
                nombre: '',
            },
        }
    },
    created() {
        this.getDataSelect()
    },
    methods:{
        setIdProyecto(new_id){
            this.proyecto_id = new_id
        },
        recargarPresupuestos(){
            this.$refs.formMovimientosFinancieros.getProyectoMovimientos();
        },
        getDataSelect(){
            // periodo
            this.proyecto.periodo_id = 1
            // axios.get('/periodo-get').then(res=>{
            //     console.log(res);
            // }).catch(error => {
            //     console.log(error);
            // })

            // hechos
            axios.get('/hechos-get').then(res=>{
                // console.log(res);
                this.select_hechos = res.data.hechos
            }).catch(error => {
                console.log(error);
            })

            // politicas
            axios.get('/politicas-get').then(res=>{
                // console.log(res);
                this.select_politicas = res.data.politicas
            }).catch(error => {
                console.log(error);
            })

            // programas
            axios.get('/programas-get').then(res=>{
                // console.log(res);
                this.select_programas = res.data.programas
            }).catch(error => {
                console.log(error);
            })
        },

    }
}

</script>
