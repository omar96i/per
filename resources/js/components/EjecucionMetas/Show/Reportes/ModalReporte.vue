<template>
    <!-- Modal -->
    <div class="modal fade" id="modalReporte" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFullTitle">Nuevo reporte</h5>
                    <button type="button" class="btn-close" @click="$parent.closeModal('modalReporte', false)"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submitForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="fecha_reporte" class="form-label">Fecha del reporte</label>
                                <input v-model="formData.fecha_reporte" type="date" class="form-control" id="fecha_reporte"
                                    required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="meta_alcanzada" class="form-label">Meta Alcanzada</label>
                                <input v-model="formData.meta_alcanzada" type="text" class="form-control"
                                    id="meta_alcanzada" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="actividad" class="form-label">Nueva Actividad</label>
                                <textarea class="form-control" v-model="formData.actividad" id="actividad"></textarea>
                            </div>


                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['meta_producto_id', 'reporte'],
    data() {
        return {
            formData: {
                fecha_reporte: '',
                meta_alcanzada: '',
                actividad: '',
                tipo: 'imagen',
                archivos: [],
            },
            archivosPermitidos: 'image/*',
            archivosSeleccionados: [],
        };
    },
    created() {
        if (this.reporte?.id) {
            this.formData = this.reporte
        }
    },
    methods: {
        submitForm() {
            if (this.reporte.id) {
                axios.put(`/metas-productos/update/reporte/${this.reporte.id}`, this.formData)
                .then(res => {
                    // console.log(res)
                    if (res.data.status) {
                        this.$swalMini('success', `${res.data.message}`);
                    }
                })
                .catch(error => {
                    console.log(error.response)
                    this.$swalMini('error', `Se ha producido un error al realizar la acción.`);
                }).finally(f => {
                    this.$parent.closeModal('modalReporte', false)
                });
            } else {
                axios.post('/metas-productos/store/reporte', this.formData)
                .then(res => {
                    // console.log(res)
                    if (res.data.status) {
                        this.$swalMini('success', `${res.data.message}`);
                    }
                })
                .catch(error => {
                    console.log(error.response)
                    this.$swalMini('error', `Se ha producido un error al realizar la acción.`);
                }).finally(f => {
                    this.$parent.closeModal('modalReporte', false)
                });
            }
        },

        handleTipoChange() {
            if (this.formData.tipo === 'imagen') {
                this.archivosPermitidos = 'image/*';
            } else if (this.formData.tipo === 'documento') {
                this.archivosPermitidos = '.pdf';
            } else if (this.formData.tipo === 'video') {
                this.archivosPermitidos = 'video/*';
            }
        },

        handleFileChange(event) {
            this.formData.archivos = event.target.files;

            // Actualizar la vista previa de archivos seleccionados
            this.archivosSeleccionados = Array.from(this.formData.archivos);
        }
    }
}

</script>