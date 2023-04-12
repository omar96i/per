<template>
    <div>
        <h1>{{ title }}</h1>
        <p>{{ message }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
        title: 'Mi componente Vue',
        message: '¡Hola desde Vue!'
        }
    }
}
</script>
