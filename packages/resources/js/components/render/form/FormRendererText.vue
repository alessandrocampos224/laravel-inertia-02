<template>
    <fieldset class="form-label-group form-group position-relative has-icon-left">
        <input v-bind="column.attributes" v-model="form[column.name]">
            <div class="form-control-position">
                <i class="feather icon-user"></i>
            </div>
            <label :for="column.attributes.id">{{ __(column.label)}}</label>
            <span v-if="errors" class="invalid-feedback" role="alert" style="display: block;">
               <strong>{{ errors }}</strong>
            </span>
    </fieldset>
</template>
<script>
    import AbstractField from "@/components/AbstractField";
    export default {
        name: "FormRendererText",
        extends:AbstractField
    }
</script>

<style scoped>

</style>
