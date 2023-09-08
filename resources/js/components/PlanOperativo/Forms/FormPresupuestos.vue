<template>
    <!-- metas de productos -->
    <div class="row">
        <div class="col-12">
            <h5>Cifras presupuesto inicial:</h5>
            <form @submit.prevent="savePresupuestos" class="row">
                <div class="col-12 col-md-6">
                    <label for="input-codigo">Codigo presupestal:</label>
                    <input id="input-codigo" class="form-control" type="text" placeholder="Ingresa el codigo presupuestal"  v-model="form_presupuesto.codigo" required>
                </div>
                <div class="col-12 col-md-6">
                    <label for="input-inicial">Valor Inicial $:</label>
                    <input id="input-inicial" class="form-control" type="text" placeholder="Ingresa el valor inicial"  v-model="form_presupuesto.inicial" required> <!-- poner formato mneda en este input -->
                </div>
                <div class="col-12 text-center my-3">
                    <button v-if="form_presupuesto.id" class="btn btn-outline-secondary mx-1" type="button" @click="resetForm()">Cancelar</button>
                    <button class="btn btn-primary" type="submit">{{ form_presupuesto.id ? 'Actualizar presupuesto' : 'Añadir presupuesto' }}</button>
                </div>
            </form>
        </div>
        <div class="col-12 table-responsive">
            <table class="table table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>Código Presupuestal</th>
                        <th>Presupuesto Inicial $</th>
                        <th>Opción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="presupuesto in lista_presupuestos">
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
                inicial: ''
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
                inicial: ''
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
                         this.$swalMini('success', `${res.data.message}.`)
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
                         this.$swalMini('success', `${res.data.message}.`)
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
                     this.$swalMini('success', `${res.data.message}.`)
                    this.getProyectoPresupuesto()
                }
            }).catch(error=>{
                console.log(error.response)
            })
        },
    }
}

</script>
