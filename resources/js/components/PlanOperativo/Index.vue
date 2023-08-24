<template>
    <div class="col-12">
        <h5 class="my-2">Periodo establecido desde: {{ periodo.fecha_ini }} hasta: {{ periodo.fecha_fin }}</h5>
        <div class="col-12 row">
            <div class="col">
                <label>Hecho:</label>
                <select class="form-select" name="" v-model="hecho_id" required>
                    <option value="" selected disabled>Seleccionar...</option>
                    <option v-for="(item, index) in select_hechos" :key="index" :value="item.id">{{ item.nombre }}</option>
                </select>
            </div>
            <div class="col">
                <label>Politica:</label>
                <select class="form-select" name="" v-model="politica_id" required>
                    <option value="" selected disabled>Seleccionar...</option>
                    <template v-for="(item, index) in select_politicas" :key="index">
                        <option v-if="hecho_id == item.hecho_id" :value="item.id">{{ item.nombre }}</option>
                    </template>
                </select>
            </div>
            <div class="col">
                <label>Programa:</label>
                <select class="form-select" name="" v-model="programa_id" required>
                    <option value="" selected disabled>Seleccionar...</option>
                    <template v-for="(item, index) in select_programas" :key="index">
                        <option v-if="politica_id == item.politica_id" :value="item.id">{{ item.nombre }}</option>
                    </template>
                </select>
            </div>
            <div class="col">
                <label>Año</label>
                <div class="input-group input-group-merge">
                    <input type="number" class="form-control" id="yearInput" v-model="año" placeholder="Ingrese un año" min="1900" max="2099" required>
                </div>
            </div>
            <div class="col row align-items-end">
                <button class="btn btn-primary" type="button">Consultar</button>
            </div>
            <div>
                <button type="button" class="btn btn-info my-2" @click="openFormModal(null)">
                    Crear nuevo Proyecto
                </button>
            </div>
        </div>
        <div class="col-12 my-3">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" >
                    <thead>
                        <tr class="table-primary">
                            <th rowspan="2" class="text-center">Proyecto</th>
                            <th colspan="6">Codigos presupuestales</th>
                            <th rowspan="2">Metas Asociadas</th>
                            <th rowspan="2" class="text-center"></th>
                        </tr>
                        <tr class="table-primary">
                            <th>Codigo</th>
                            <th>Inicial</th>
                            <th>Definitivo</th>
                            <th>Certificados</th>
                            <th>Compremitido</th>
                            <th>Ordenes de pago</th>
                        </tr>
                    </thead>
                    <tbody v-for="proyecto in proyectos">
                        <tr v-if="proyecto.presupuestos.length > 0" v-for="(presupuesto, index) in proyecto.presupuestos" :key="index">
                            <td rowspan="0" v-if="index == 0">{{ proyecto.nombre }}</td>
                            <td>{{presupuesto.codigo}}</td>
                            <td>{{presupuesto.inicial}}</td>
                            <td>{{presupuesto.definitivo}}</td>
                            <td>{{presupuesto.certificado}}</td>
                            <td>{{presupuesto.comprometido}}</td>
                            <td>{{presupuesto.ordenes_de_pago}}</td>
                            <td rowspan="0" v-if="index == 0">
                                <!-- for de las metas (creo) -->
                                <p v-for="producto in proyecto.productos">
                                    {{ producto.meta_producto.nombre }}
                                </p>
                            </td>
                            <td rowspan="0" v-if="index == 0">
                                <button class="col-12 btn btn-sm btn-primary mb-1" @click="openFormModal(proyecto.id)"><i class='bx bxs-edit-alt'></i> Editar</button>
                                <!-- <button class="col-12 btn btn-sm btn-primary mb-1"><i class='bx bx-plus'></i> Movimientos financieros</button> -->
                                <!-- <button class="col-12 btn btn-sm btn-primary mb-1"><i class='bx bx-plus'></i> Certificado</button> -->
                            </td>
                        </tr>
                        <tr v-else>
                            <td rowspan="0">{{ proyecto.nombre }}</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td rowspan="0">
                                <!-- for de las metas (creo) -->
                                <p v-for="producto in proyecto.productos">
                                    {{ producto.meta_producto.nombre }}
                                </p>
                            </td>
                            <td rowspan="0">
                                <button class="col-12 btn btn-sm btn-primary mb-1" @click="openFormModal(proyecto.id)"><i class='bx bxs-edit-alt'></i> Editar</button>
                                <!-- <button class="col-12 btn btn-sm btn-primary mb-1"><i class='bx bx-plus'></i> Movimientos financieros</button> -->
                                <!-- <button class="col-12 btn btn-sm btn-primary mb-1"><i class='bx bx-plus'></i> Certificado</button> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <form-modal v-if="form_modal" :id="modal_proyecto_id"></form-modal>
    </div>
</template>
<script>
import FormModal from './FormModal.vue';
export default{
    components: {
        FormModal
    },
    data(){
        return{
            select_hechos: [],
            select_politicas: [],
            select_programas: [],
            select_metas_productos: [],
            select_indicadores: [],

            form_modal: false,
            periodo: {},
            hecho_id: '',
            politica_id: '',
            programa_id: '',
            año: (new Date).getFullYear(),

            proyectos: [],
            modal_proyecto_id: null
        }
    },
    created(){
        this.getDataSelect()
        this.getProyectos()
    },
    methods:{
        getDataSelect(){
            // periodo
            axios.get('/periodo/get-by-user').then(res=>{
                console.log(res);
                this.periodo = res.data.periodo.periodo
            }).catch(error => {
                console.log(error);
            })

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
        getProyectos(){
            axios.get('/proyectos-get').then(res=>{
                // console.log(res);
                this.proyectos = res.data.proyectos
            }).catch(error => {
                console.log(error);
            })
        },
        openFormModal(id){
            this.form_modal = true
            this.modal_proyecto_id = id
            setTimeout(() => {
                $('#modalProyect').modal({backdrop: 'static', keyboard: false}).modal('show')
            }, 300);
        },
        closeFormModal(){
            $('#modalProyect').modal('hide')
            setTimeout(() => {
                this.form_modal = false
            }, 300);
        },

    },
}
</script>
