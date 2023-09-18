<template>
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between mb-2">
                <h5 class="my-auto">Reportes realizados</h5>
                <button class="btn btn-primary" @click="openModal(null)">Nuevo reporte</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-periodo" width="100%" cellspacing="0" >
                    <thead class="table-primary">
                        <tr>
                            <th>Fecha del reporte</th>
                            <th>Meta alcanzada</th>
                            <th>Nueva Actividad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(reporte, index) in reportes" :key="index">
                            <td>{{ reporte.fecha_reporte }}</td>
                            <td>{{ reporte.meta_alcanzada }}</td>
                            <td>{{ reporte.actividad }}</td>
                            <td class="text-center d-flex">
                                <button type="button" class="btn btn-primary btn-sm mx-1" @click="openModal(reporte)"><i class='bx bxs-edit' ></i> Editar</button>
                                <button type="button" class="btn btn-info btn-sm" @click="openModalEvidencias(reporte)"><i class='bx bx-show-alt'></i> Evidencias</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <modal-reporte v-if="modal_reporte" :meta_producto_id="meta.id" :reporte="reporte"></modal-reporte>
        <modal-evidencias v-if="modal_evidencias" :reporte_id="reporte.id">></modal-evidencias>
    </div>
</template>

<script>
import ModalReporte from './ModalReporte.vue';
import ModalEvidencias from "./ModalEvidencias.vue"
export default {
    props: ['meta'],
    components: {
        ModalReporte,
        ModalEvidencias
    },
    data() {
        return {
            reporte: {},
            reportes: this.meta.reportes,
            modal_reporte: false,
            modal_evidencias: false,
        };
    },
    methods: {
        openModal(data_reporte){
            this.modal_reporte = true
            this.reporte = data_reporte
            setTimeout(() => {
                $('#modalReporte').modal({backdrop: 'static', keyboard: false}).modal('show')
            }, 300);
        },
        openModalEvidencias(data_reporte){
            this.modal_evidencias = true
            this.reporte = data_reporte
            setTimeout(() => {
                $('#modalEvidencias').modal({backdrop: 'static', keyboard: false}).modal('show')
            }, 300);
        },
        closeModal(ModalId, reload = true){
            $(`#${ModalId}`).modal('hide')
            setTimeout(() => {
                this.modal_reporte = false
                this.modal_evidencias = false
                if (reload) {
                    this.getProyectos()
                }
            }, 300);
        },
    }
};
</script>
