<template>
    <div class="col-12">
        <div class="col-12">
            <h5 class="my-1">Periodo establecido desde: 01/01/2021 hasta: 31/12/2024</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-periodo" width="100%" cellspacing="0" >
                <thead>
                    <tr>
                        <th>Código meta</th>
                        <th>Nombre meta</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(meta, index) in metas" :key="index">
                        <td>{{ meta.codigo }}</td>
                        <td>{{ meta.nombre }}</td>
                        <td class="text-center d-flex">
                            <button type="button" class="btn btn-info btn-circle btn-sm me-1" @click="goToForm(meta.id)">Generar reporte</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default{
    data(){
        return{
            metas: [],
            data_meta: {},
            form_modal: false,
        }
    },
    created(){
        this.getData()
    },
    methods:{
        getData(){
            axios.get('/metas-productos-get-by-user').then(res=>{
                this.metas = res.data.metas
            }).catch(error => {
                console.log(error);
            })
        },

        goToForm(id){
            window.location = `/metas-productos/evidencias/form/${id}`
        }
    },
}
</script>
