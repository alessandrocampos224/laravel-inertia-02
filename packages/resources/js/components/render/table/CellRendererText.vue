<template>
    <div>
        {{ item[column.name] }}
    </div>
</template>

<script>
    import AbstractTable from "@/components/AbstractTable";
    export default {
        name: "CellRendererText",
        extends: AbstractTable
    }
</script>

<style scoped>

</style>
