<template>
    <div>
        <form @submit.prevent="submitForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="meta_alcanzada" class="form-label">Meta Alcanzada</label>
                    <input v-model="formData.meta_alcanzada" type="text" class="form-control" id="meta_alcanzada" required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="nueva_actividad" class="form-label">Nueva Actividad</label>
                    <textarea class="form-control" v-model="formData.nueva_actividad"></textarea>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="codigo" class="form-label">Código</label>
                    <input v-model="formData.codigo" type="text" class="form-control" id="codigo">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="linea_base" class="form-label">Linea base</label>
                    <input v-model="formData.linea_base" type="text" class="form-control" id="linea_base">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="definiciones" class="form-label">Definiciones</label>
                    <input v-model="formData.definiciones" type="text" class="form-control" id="definiciones">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="medicion" class="form-label">Medicion</label>
                    <input v-model="formData.medicion" type="text" class="form-control" id="medicion">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="formula" class="form-label">Formula</label>
                    <input v-model="formData.formula" type="text" class="form-control" id="formula">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="variables" class="form-label">Variables</label>
                    <input v-model="formData.variables" type="text" class="form-control" id="variables">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="fuente" class="form-label">Fuente</label>
                    <input v-model="formData.fuente" type="text" class="form-control" id="fuente">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="localizacion" class="form-label">Localizacion</label>
                    <input v-model="formData.localizacion" type="text" class="form-control" id="localizacion">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="poblacion" class="form-label">Poblacion</label>
                    <input v-model="formData.poblacion" type="text" class="form-control" id="poblacion">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="periocidad" class="form-label">Periocidad</label>
                    <input v-model="formData.periocidad" type="text" class="form-control" id="periocidad">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <input v-model="formData.observaciones" type="text" class="form-control" id="observaciones">
                </div>
                <div class="col-12 col-sm-6">
                    <label for="actividades_realizadas" class="form-label">Actividades realizadas</label>
                    <textarea class="form-control" v-model="formData.actividades_realizadas"></textarea>
                </div>

                <div class="col-12 col-sm-6">
                    <label for="tipo" class="form-label">Tipo de Documento</label>
                    <select v-model="formData.tipo" class="form-select" id="tipo" required @change="handleTipoChange">
                    <option value="imagen">Imagen</option>
                    <option value="documento">Documento</option>
                    <option value="video">Video</option>
                    </select>
                </div>

                <div class="col-12 mt-3">
                    <div class="input-group">
                        <label class="input-group-text btn btn-primary" for="archivos">
                            Seleccionar Archivos
                        </label>
                        <input
                            type="file"
                            id="archivos"
                            class="visually-hidden"
                            multiple
                            style="display: none;"
                            :accept="archivosPermitidos"
                            @change="handleFileChange"
                        >
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <h5>Archivos Seleccionados:</h5>
                    <div v-for="(archivo, index) in archivosSeleccionados" :key="index" class="card mb-2">
                        <div class="card-body">
                            {{ archivo.name }}
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</template>

<script>
export default {
    props:['meta'],
    data() {
        return {
            formData: {
                meta_de_producto_id: 1,
                meta_alcanzada: '',
                nueva_actividad: '',
                codigo: '',
                tipo: 'imagen',
                linea_base : '',
                definiciones : '',
                medicion : '',
                formula : '',
                variables : '',
                fuente : '',
                localizacion : '',
                poblacion : '',
                periocidad : '',
                observaciones : '',
                actividades_realizadas : '',
                archivos: [],
            },
            archivosPermitidos: 'image/*',
            archivosSeleccionados: [],
        };
    },
    methods: {
        submitForm() {

            const formData = new FormData();

            for (const key in this.formData) {
                if (key === 'archivos') {
                    for (let i = 0; i < this.formData.archivos.length; i++) {
                        formData.append('archivos[]', this.formData.archivos[i]);
                    }
                } else {
                    formData.append(key, this.formData[key]);
                }
            }

            axios.post('/metas-productos/store/reporte', formData)
                .then(response => {
                    console.log(response)
                })
                .catch(error => {
                    console.log(error.response)
                });
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
};
</script>
