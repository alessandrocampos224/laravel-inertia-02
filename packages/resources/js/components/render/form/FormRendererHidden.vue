<template>
    <input v-bind="column.attributes" v-model="form[column.name]">
</template>
<script>
    import AbstractField from "@/components/AbstractField";
    export default {
        name: "FormRendererHidden",
        extends:AbstractField
    }
</script>
<style scoped>

</style>
