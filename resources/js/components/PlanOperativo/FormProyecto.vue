<template>
    <!-- datos generales -->
    <div>
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
        <spinner v-if="false"></spinner>
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
            proyecto: {
                hecho_id: '',
                politica_id: '',
                programa_id: '',
                periodo_id: '',
                vigencia: '',
                nombre: '',
            },
        }
    },
    created() {
        this.getDataSelect()
        if (this.proyecto_id) {
            this.getProyecto()
        }
    },
    methods:{
        getDataSelect(){
            // periodo
            axios.get('/periodo/get-by-user').then(res=>{
                console.log(res);
                this.proyecto.periodo_id = res.data.periodo.periodo.id
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
        getProyecto(){
            axios.get(`/proyectos-get-all/${this.proyecto_id}`).then(res => {
                // console.log(res)
                this.proyecto = res.data.proyecto
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
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            } else {
                axios.post('/proyectos', this.proyecto).then(res=>{
                    console.log(res)
                    if (res.data.status) {
                        alert(res.data.message)
                        this.$emit('set-id', res.data.ultimo_creado);
                    }
                }).catch(error=>{
                    console.log(error.response)
                })
            }
        },
    }
}

</script>
