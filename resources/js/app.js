import { createApp } from 'vue';
import UserIndex from './components/Users/Index.vue';
import PeriodosIndex from './components/Periodos/Index.vue';
import DependenciasIndex from './components/Dependencias/Index.vue';
import UnidadIndex from './components/Unidades/Index.vue';
import RolesIndex from './components/Roles/Index.vue';

const app = createApp({});

app.component('user-index', UserIndex);
app.component('periodo-index', PeriodosIndex);
app.component('dependencia-index', DependenciasIndex);
app.component('unidad-index', UnidadIndex);
app.component('roles-index', RolesIndex);
app.mount('#app');
