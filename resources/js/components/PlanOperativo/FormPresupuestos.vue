<template>
    <!-- metas de productos -->
    <div class="row">
        <div class="col-5 border-end border-2">
            <h5>Cifras presupuesto inicial</h5>
            <form>
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
                        <i class='bx bx-plus'></i>{{ form_presupuesto.id ? 'Actualizar presupuesto' : 'Guardar presupuesto' }}
                    </button>
                </div>
            </form>
        </div>
        <div class="col-7 table-responsive">
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
                            <button type="button" class="btn btn-info btn-sm me-1"><i class='bx bxs-edit' @click="editPresupuesto(presupuesto)"></i></button>
                            <button class="btn btn-danger btn-sm" @click="deletePresupuestos(presupuesto.id)"><i class='bx bxs-trash' ></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <spinner v-if="false"></spinner>
    </div>
</template>

<script>
export default {
    props: ['proyecto_id'],
    data(){
        return{
            lista_presupuestos: [],
            form_presupuesto: {
                proyecto_id: '',
                codigo: '',
                inicial: '',
                definitivo: '',
                certificado: '',
                comprometido: '',
                ordenes_de_pago: ''
            },
        }
    },
    created() {
        if (this.proyecto_id) {
            this.getProyectoPresupuesto()
        }
    },
    methods:{
        resetForm(){
            this.form_presupuesto = {
                proyecto_id: '',
                codigo: '',
                inicial: '',
                definitivo: '',
                certificado: '',
                comprometido: '',
                ordenes_de_pago: ''
            }
        },
        getProyectoPresupuesto(){
            axios.get(`/proyectos-get-all/${this.proyecto_id}`).then(res => {
                // console.log(res)
                this.lista_presupuestos = res.data.proyecto.presupuestos
            }).catch(error => {
                console.log(error);
            })
        },
        editPresupuesto(presupuesto){
            this.form_presupuesto = presupuesto
        },
        savePresupuestos(){
            if (this.form_presupuesto.id) {
                axios.put(`/proyecto-presupuestos/${this.form_presupuesto.id}`, this.form_presupuesto).then(res=>{
                    // console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        this.getProyectoPresupuesto()
                        this.resetForm()
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            } else {
                this.form_presupuesto.proyecto_id = this.proyecto_id
                axios.post('/proyecto-presupuestos', this.form_presupuesto).then(res=>{
                    // console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        this.getProyectoPresupuesto()
                        this.resetForm()
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            }
        },
        deletePresupuestos(id){
            axios.delete(`/proyecto-presupuestos/${id}`).then(res=>{
                console.log(res)
                if (res.data.status) {
                    alert(res.data.message)
                    this.getProyectoPresupuesto()
                }
            }).catch(error=>{
                console.log(error.response)
            })
        },
    }
}

</script>
