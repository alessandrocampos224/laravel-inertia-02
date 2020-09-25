<template>
    <call-link :href="route(item.attributes.href.name,item.attributes.href.params)"> {{ item.attributes.text }}</call-link>
</template>

<script>
    import AbstractTable from "@/components/AbstractTable";
    export default {
        name: "CellRendererEdit",
        extends: AbstractTable
    }
</script>

<style scoped>

</style>
