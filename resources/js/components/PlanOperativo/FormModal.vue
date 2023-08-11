<template>
    <!-- Modal -->
    <div class="modal fade" id="modalProyect" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form @submit.prevent="saveProduct">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFullTitle">Crear un nuevo Proyecto:</h5>
                        <button type="button" class="btn-close" @click="$parent.closeFormModal()"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-pills mb-3 d-flex" id="pills-tab" role="tablist">
                            <li class="nav-item d-flex" role="presentation">
                                <button class="nav-link active" id="form_1_tab" data-bs-toggle="tab" data-bs-target="#form_1" type="button" role="tab" aria-controls="form_1" aria-selected="true">Datos Generales</button>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <button class="nav-link" id="form_2_tab" data-bs-toggle="tab" data-bs-target="#form_2" type="button" role="tab" aria-controls="form_2" aria-selected="false">Metas y presupuestos</button>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <button class="nav-link" id="form_3_tab" data-bs-toggle="tab" data-bs-target="#form_3" type="button" role="tab" aria-controls="form_3" aria-selected="false">Movimientos financieros</button>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <button class="nav-link" id="form_4_tab" data-bs-toggle="tab" data-bs-target="#form_4" type="button" role="tab" aria-controls="form_4" aria-selected="false">Certificado</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="nav-tabContent">

                            <!-- datos generales -->
                            <div class="tab-pane fade show active" id="form_1" role="tabpanel" aria-labelledby="form_1_tab">
                                <h5>Datos Generales</h5>
                                <form class="col d-flex flex-column">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label>Hecho:</label>
                                            <select class="form-select" name="" v-model="proyecto.hecho_id" required>
                                                <option value="" selected disabled>Seleccionar...</option>
                                                <option v-for="(item, index) in select_hechos" :key="index" :value="item.id">{{ item.nombre }}</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label>Politica:</label>
                                            <select class="form-select" name="" v-model="proyecto.politica_id" required>
                                                <option value="" selected disabled>Seleccionar...</option>
                                                <option v-for="(item, index) in select_politicas" :key="index" :value="item.id">{{ item.nombre }}</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label>Programa:</label>
                                            <select class="form-select" name="" v-model="proyecto.programa_id" required>
                                                <option value="" selected disabled>Seleccionar...</option>
                                                <option v-for="(item, index) in select_programas" :key="index" :value="item.id">{{ item.nombre }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label>Nombre del proyecto:</label>
                                        <input class="form-control" type="text"  v-model="proyecto.nombre" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Vigencia</label>
                                        <input class="form-control" type="date"  v-model="proyecto.vigencia">
                                    </div>
                                    <div class="text-center my-2 mt-auto">
                                        <button class="btn btn-primary" type="button" @click="saveProyecto()" required>
                                            {{proyecto_id ? 'Actualizar proyecto' : 'Crear Proyecto'}}
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- metas y preupuestos, se podria dividir en 2 el tab -->
                            <div class="tab-pane fade" id="form_2" role="tabpanel" aria-labelledby="form_2_tab">
                                <div class="row">
                                    <div class="col-6 d-flex flex-column border-end border-2">
                                        <h5>Meta de Productos</h5>
                                        <div class="mb-2">
                                            <label>Dependencia (metas deproducto):</label>
                                            <select class="form-select"  v-model="form_meta_producto.meta_producto_id">
                                                <option value="" selected disabled>Seleccionar...</option>
                                                <option v-for="meta in select_metas_productos" :value="meta.id">{{meta.nombre}}</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="my-select">Indicadores de Producto:</label>
                                            <select class="form-select"  v-model="form_meta_producto.indicador_id">
                                                <option value="" selected disabled>Seleccionar...</option>
                                                <option value="1">Ejemplo indicador</option>
                                                <!-- <option v-for="meta in select_metas_productos" :value="meta.id">meta.nombre</option> -->
                                            </select>
                                        </div>
                                        <div class="text-center my-3">
                                            <button class="btn btn-primary" type="button" @click="saveMetaDeProductos()">
                                                <i class='bx bx-plus'></i>Guardar Meta de producto
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex flex-column">
                                        <h5>Cifras presupuesto inicial</h5>
                                        <div class="mb-2">
                                            <label>Codigo presupestal:</label>
                                            <input id="my-input" class="form-control" type="text"  v-model="form_presupuesto.codigo">
                                        </div>
                                        <div class="mb-2">
                                            <label for="my-select">Inicial $:</label>
                                            <input id="my-input" class="form-control" type="text"  v-model="form_presupuesto.inicial">
                                        </div>
                                        <div class="mb-2">
                                            <label for="my-select">Definitivo $:</label>
                                            <input id="my-input" class="form-control" type="text"  v-model="form_presupuesto.definitivo">
                                        </div>
                                        <div class="mb-2">
                                            <label for="my-select">Certificado $:</label>
                                            <input id="my-input" class="form-control" type="text"  v-model="form_presupuesto.certificado">
                                        </div>
                                        <div class="mb-2">
                                            <label for="my-select">Comprometido $:</label>
                                            <input id="my-input" class="form-control" type="text"  v-model="form_presupuesto.comprometido">
                                        </div>
                                        <div class="mb-2">
                                            <label for="my-select">Ordenes de pago $:</label>
                                            <input id="my-input" class="form-control" type="text"  v-model="form_presupuesto.ordenes_de_pago">
                                        </div>
                                        <div class="text-center my-3">
                                            <button class="btn btn-primary" type="button" @click="savePresupuestos()">
                                                <i class='bx bx-plus'></i>Guardar presupuesto inicial
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6 table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>Meta de producto</th>
                                                    <th>Quitar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="meta in lista_metas_productos">
                                                    <td>{{ meta.meta_producto.nombre }}</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-danger btn-sm" type="button"><i class='bx bx-x'></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-6 table-responsive">
                                        <table class="table table table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>Id</th>
                                                    <th>Código Presupuestal</th>
                                                    <th>Presupuesto Inicial $</th>
                                                    <th>Opción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="presupuesto in lista_presupuestos">
                                                    <td>{{ presupuesto.id }}</td>
                                                    <td>{{ presupuesto.codigo }}</td>
                                                    <td>{{ presupuesto.inicial }}</td>
                                                    <td class="text-center d-flex">
                                                        <button type="button" class="btn btn-info btn-sm me-1"><i class='bx bxs-edit' ></i></button>
                                                        <button class="btn btn-danger btn-sm"><i class='bx bxs-trash' ></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- movimientos financieros -->
                            <div class="tab-pane fade" id="form_3" role="tabpanel" aria-labelledby="form_3_tab">
                                <h5>Movimientos Financieros</h5>
                                <div class="row mt-2">
                                    <div class="col-5 border-2 border-end">
                                        <div class="mb-2">
                                            <b>Nombre del proyecto:</b>
                                            <p>Aqui va el nombre del proyecto</p>
                                        </div>
                                        <div class="mb-2">
                                            <b>Codigo presupuestal:</b>
                                            <p>Aqui va el codigo del proyecto</p>
                                        </div>
                                        <div class="mb-2">
                                            <label>Codigo presupuestal:</label>
                                            <select class="form-select" v-model="form_movimiento.proyecto_presupuesto_id">
                                                <option value="">---Seleccionar---</option>
                                                <option v-for="presupuesto in lista_presupuestos" :value="presupuesto.id">{{presupuesto.codigo}}</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label>Movimiento financiero:</label>
                                            <select class="form-select" v-model="form_movimiento.tipo_movimiento">
                                                <option value="">---Seleccionar---</option>
                                                <option value="adicion">Adicion</option>
                                                <option value="inicial">Inicial</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label>Valor a ingresar $:</label>
                                            <input class="form-control" type="number" v-model="form_movimiento.valor">
                                        </div>
                                        <div class="text-center my-2 mt-auto">
                                            <button class="btn btn-primary" type="button" @click="saveMovimiento()">
                                                Guardar movimiento <i class='bx bx-skip-next'></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-7 table-responsive">
                                        <b>Desglose ingreso de movimientos financieros:</b>
                                        <table class="table table table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>Tipo Movimiento</th>
                                                    <th>Valor</th>
                                                    <!-- <th>Total</th> -->
                                                    <th>Fecha</th>
                                                    <th>Opción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-for="presupuesto in lista_presupuestos">
                                                    <tr v-for="movimiento in presupuesto.movimiento_financieros">
                                                        <td>{{movimiento.tipo_movimiento}}</td>
                                                        <td>{{movimiento.valor}}</td>
                                                        <!-- <td>{{movimiento.}}</td> -->
                                                        <td>{{(new Date(movimiento.created_at)).toLocaleString()}}</td>
                                                        <td class="text-center d-flex">
                                                            <button type="button" class="btn btn-info btn-sm me-1"><i class='bx bxs-edit' ></i></button>
                                                            <button class="btn btn-danger btn-sm"><i class='bx bxs-trash' ></i></button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- certificado -->
                            <div class="tab-pane fade" id="form_4" role="tabpanel" aria-labelledby="form_4_tab">
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
                            </div>

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
export default {
    props: ['proyecto_id'],
    data(){
        return{
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

            form_meta_producto: {
                proyecto_id: '',
                meta_producto_id: '',
                indicador_id: '1'
            },

            form_presupuesto: {
                proyecto_id: '',
                codigo: '',
                inicial: '',
                definitivo: '',
                certificado: '',
                comprometido: '',
                ordenes_de_pago: ''
            },

            form_movimiento: {
                proyecto_presupuesto_id: '',
                valor: '',
                tipo_movimiento: '',
            },

            lista_metas_productos: [],
            lista_presupuestos: [],
            lista_movimientos: []
        }
    },
    created() {
        this.getDataSelect()
        if (this.proyecto_id) {
            // this.getMetasDeProductos()
            this.getProyecto()
        }
    },
    methods:{
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

            axios.get('metas-productos-get').then(res => {
                console.log(res.data);
                this.select_metas_productos = res.data.metas
            }).catch(error => {
                console.log(error);
            })
        },
        getProyecto(){
            axios.get(`/proyectos-get-all/${this.proyecto_id}`).then(res => {
                console.log(res)
                this.proyecto = res.data.proyecto
                this.lista_metas_productos = res.data.proyecto.productos
                this.lista_presupuestos = res.data.proyecto.presupuestos
                this.lista_movimientos = res.data.movimientos
            }).catch(error => {
                console.log(error);
            })
        },
        saveProyecto(){
            if (this.proyecto_id) {
                axios.put(`/proyectos/${this.proyecto.id}`, this.proyecto).then(res=>{
                    console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        // this.$parent.closeFormModal()
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            } else {
                axios.post('/proyectos', this.proyecto).then(res=>{
                    console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        // this.$parent.closeFormModal()
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            }
        },
        saveMetaDeProductos(){
            if (this.proyecto_id) {
                this.form_meta_producto.proyecto_id = this.proyecto.id
                axios.post('/proyectos-productos', this.form_meta_producto).then(res=>{
                    console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        // this.$parent.closeFormModal()
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            }else{
                alert('proyecto sin crear')
            }
        },
        savePresupuestos(){
            this.form_presupuesto.proyecto_id = this.proyecto.id
            axios.post('/proyecto-presupuestos', this.form_presupuesto).then(res=>{
                console.log(res)
                if (res.data.status) {
                    alert(res.data.message)
                    // this.$parent.closeFormModal()
                }
            }).catch(error=>{
                console.log(error.response)
            })
        },
        saveMovimiento(){
            axios.post('/proyectos-movimientos', this.form_movimiento).then(res=>{
                console.log(res)
                if (res.data.status) {
                    alert(res.data.message)
                    // this.$parent.closeFormModal()
                }
            }).catch(error=>{
                console.log(error.response)
            })
        }

    }
}

</script>
