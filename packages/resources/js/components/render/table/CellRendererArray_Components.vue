<template>
    <div>
        <template v-if="item[column.name]">
            <template v-for="(item, i) in item[column.name]">
                <component :is="currentTabComponent(item.cellRenderFramework)"  :column="column" :item="item" :key="i"></component>
            </template>
        </template>
    </div>
</template>

<script>
    import AbstractTable from "@/components/AbstractTable";
    export default {
        name: "CellRendererArray_Components",
        extends: AbstractTable
    }
</script>

<style scoped>

</style>
