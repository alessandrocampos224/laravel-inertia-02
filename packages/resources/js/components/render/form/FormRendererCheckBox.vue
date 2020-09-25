<template>
    <fieldset class="checkbox">
        <div class="vs-checkbox-con vs-checkbox-primary">
            <input
                v-bind="column.attributes"
                v-model="form[column.name]"
                v-bind:true-value="column.yes"
                v-bind:false-value="column.no"
            >
            <span class="vs-checkbox">
                <span class="vs-checkbox--check">
                    <i class="vs-icon feather icon-check"></i>
                </span>
            </span>
            <span class="">{{ __(column.label)}}</span>
        </div>
    </fieldset>
</template>
<script>
    import AbstractField from "@/components/AbstractField";
    export default {
        name: "FormRendererCheckBox",
        extends:AbstractField
    }
</script>

<style scoped>

</style>
