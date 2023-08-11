import { createApp } from 'vue';
window.axios = require('axios');

import UserIndex from './components/Users/Index.vue';
import PeriodosIndex from './components/Periodos/Index.vue';
import DependenciasIndex from './components/Dependencias/Index.vue';
import UnidadIndex from './components/Unidades/Index.vue';
import RolesIndex from './components/Roles/Index.vue';

import HechosIndex from './components/Programacion/Hechos/Index.vue';
import PoliticasIndex from './components/Programacion/Politicas/Index.vue';
import ProgramasIndex from './components/Programacion/Programas/Index.vue';
import MetasIndex from './components/Programacion/Metas/Index.vue';
import EjecucionMetaIndex from './components/EjecucionMetas/Index.vue'
import EjecucionMetaForm from './components/EjecucionMetas/Form.vue'

import PlanOperativo from './components/PlanOperativo/Index.vue';

const app = createApp({});

app.component('user-index', UserIndex);
app.component('periodo-index', PeriodosIndex);
app.component('dependencia-index', DependenciasIndex);
app.component('unidad-index', UnidadIndex);
app.component('roles-index', RolesIndex);
app.component('hechos-index', HechosIndex);
app.component('politicas-index', PoliticasIndex);
app.component('programas-index', ProgramasIndex);
app.component('metas-index', MetasIndex);
app.component('plan-operativo-index', PlanOperativo);
app.component('ejecucion-meta-index', EjecucionMetaIndex);
app.component('ejecucion-meta-form', EjecucionMetaForm);
app.mount('#app');
