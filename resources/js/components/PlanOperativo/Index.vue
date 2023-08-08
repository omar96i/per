<template>
    <div class="col-12">
        <h5 class="my-2">Periodo establecido desde: 01/01/2021 hasta: 31/12/2024</h5>
        <div class="col-12 row">
            <div class="col">
                <label for="my-select">Hecho:</label>
                <select id="my-select" class="form-select" name="">
                    <option>Text</option>
                </select>
            </div>
            <div class="col">
                <label for="my-select">Politica:</label>
                <select id="my-select" class="form-select" name="">
                    <option>Text</option>
                </select>
            </div>
            <div class="col">
                <label for="my-select">Programa:</label>
                <select id="my-select" class="form-select" name="">
                    <option>Text</option>
                </select>
            </div>
            <div class="col">
                <label for="my-select">Vigencia:</label>
                <select id="my-select" class="form-select" name="">
                    <option>Text</option>
                </select>
            </div>
            <div class="col row align-items-end">
                <button class="btn btn-primary" type="button">Consultar</button>
            </div>
        </div>
        <div class="col-12 my-3">
            <button type="button" class="btn btn-info my-2" @click="openFormModal('insert', null)">
                Crear nuevo Proyecto
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0" >
                <thead>
                    <tr>
                        <th>Proyecto</th>
                        <th colspan="6">Codigos presupuestales</th>
                        <th>Metas Asociadas</th>
                    </tr>
                </thead>
                <tbody>
                    <td rowspan="0">Nombre del proyecto</td>
                    <tr v-for="(item, index) in 5" :key="index">
                        <td>Codigo</td>
                        <td>Inicial</td>
                        <td>Incial</td>
                        <td>Certificados</td>
                        <td>Compremitido</td>
                        <td>Ordenes de pago</td>
                    </tr>
                    <td>Metas aso</td>
                </tbody>
            </table>
        </div>
        <!-- <form-modal v-if="form_modal" :data_hecho="this.data_hecho"></form-modal> -->
    </div>
</template>
<script>
// import FormModal from './FormModal.vue'
export default{
    data(){
        return{
            hechos: [],
            data_hecho: {},
            form_modal: false,
        }
    },
    created(){
        
    },
    methods:{

    },
}
</script>
