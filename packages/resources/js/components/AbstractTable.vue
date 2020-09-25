<script>
    export default {
        name: "AbstractTable",
        props: {
            column: {
                type: [Object, Array, String],
                required: true
            },
            item: {
                type: [Object],
                default: null
            },
        },
        methods: {
            __(value) {
                return value;
            },
            currentTabComponent: function (Component) {
                return Component;
            }
        }
    }
</script>
