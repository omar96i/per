<template>
    <!-- Modal -->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFullTitle">{{ column.toUpperCase() }}</h5>
                    <button type="button" class="btn-close" @click="$parent.closeModal('modalAdd')"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="saveColumn()" class="col">
                        <div class="mb-2">
                            <b>Nombre del proyecto:</b>
                            <p>{{ presupuesto.proyecto?.nombre }}</p>
                        </div>
                        <div class="mb-2">
                            <div class="mb-2">
                                <b>Codigo presupuestal:</b>
                                <p>{{  presupuesto.codigo }}</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <b>Ultima Actualización:</b>
                            <p>{{  presupuesto.disponibilidad == 0 ? 'No ejecutado' : 'Ejecutado' }}</p>
                        </div>
                        <div class="mb-2">
                            <b>Presupuesto definitivo $:</b>
                            <p>{{  presupuesto.definitivo }}</p>
                        </div>
                        <div class="mb-2">
                            <b>Ultima ejecución $:</b>
                            <p>{{  presupuesto[`${column}`] }}</p>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <label for="input_valor" class="col-sm-4 col-form-label"><b>Valor {{ column }}$:</b></label>
                            <div class="col-sm-8">
                            <input type="number" class="form-control" id="input_valor" v-model="presupuesto[`${column}`]">
                            </div>
                        </div>
                        <div class="text-center my-2 mt-auto">
                            <button class="btn btn-primary" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-secondary me-1"
                        @click="$parent.closeModal('modalAdd')">Cerrar</button>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['presupuesto_id', 'column'],
    data() {
        return {
            presupuesto: {},
        }
    },
    created() {
        this.getPresupuesto()
    },
    methods: {
        getPresupuesto(){
            axios.get(`/get-presupuesto/${this.presupuesto_id}`).then(res => {
                console.log(res.data);
                if (res.data.status) {
                    this.presupuesto = res.data.presupuesto
                }
            }).catch(error => {
                console.log(error.response)
            })
        },
        saveColumn(){
            axios.put(`/proyecto-presupuestos/${this.presupuesto.id}`, this.presupuesto).then(res=>{
                console.log(res)
                if (res.data.status) {
                    this.$swalMini('success', `${this.column} actualizada con exito!`);
                    this.$parent.closeModal('modalAdd')
                }
            }).catch(error=>{
                console.log(error.response)
                this.$swalMini('error', `Se ha producido un error al realizar la acción.`);
            })
        }
    }
}

</script>
