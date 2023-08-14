<template>
    <!-- metas de productos -->
    <div class="row">
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
                        {{ form_movimiento.id ? 'Actualizar movimiento' : 'Guardar movimiento' }}
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
                                    <button type="button" class="btn btn-info btn-sm me-1" @click="editMovimiento(movimiento)"><i class='bx bxs-edit' ></i></button>
                                    <button class="btn btn-danger btn-sm"><i class='bx bxs-trash' @click="deleteMovimiento(movimiento.id)"></i></button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
        <spinner v-if="false"></spinner>
    </div>
</template>

<script>
export default {
    props: ['proyecto_id'],
    data(){
        return{
            lista_movimientos: [],
            lista_presupuestos: [],
            form_movimiento: {
                proyecto_presupuesto_id: '',
                valor: '',
                tipo_movimiento: '',
            },
        }
    },
    created() {
        if (this.proyecto_id) {
            this.getProyectoMovimientos()
        }
    },
    methods:{
        resetForm(){
            this.form_movimiento = {
                proyecto_presupuesto_id: '',
                valor: '',
                tipo_movimiento: '',
            }
        },
        editMovimiento(movimiento){
            this.form_movimiento = movimiento
        },
        getProyectoMovimientos(){
            axios.get(`/proyectos-get-all/${this.proyecto_id}`).then(res => {
                // console.log(res)
                this.lista_movimientos = res.data.movimientos
                this.lista_presupuestos = res.data.proyecto.presupuestos
            }).catch(error => {
                console.log(error);
            })
        },
        saveMovimiento(){
            if (this.form_movimiento.id) {
                axios.put(`/proyectos-movimientos/${this.form_movimiento.id}`, this.form_movimiento).then(res=>{
                    // console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        this.getProyectoMovimientos()
                        this.resetForm()
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            }else{
                axios.post('/proyectos-movimientos', this.form_movimiento).then(res=>{
                    // console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        this.getProyectoMovimientos()
                        this.resetForm()
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            }
        },
        deleteMovimiento(id){
            axios.delete(`/proyectos-movimientos/${id}`).then(res=>{
                console.log(res)
                if (res.data.status) {
                    alert(res.data.message)
                    this.getProyectoMovimientos()
                }
            }).catch(error=>{
                console.log(error.response)
            })
        }
    }
}

</script>
