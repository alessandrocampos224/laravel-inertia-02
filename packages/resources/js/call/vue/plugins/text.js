export default {
    functional: true,
    props: {
        value:
            {
                type: String,
                default:'',
            }
    },
    render: function (createElement) {
        var self = this
        return createElement('input', {
            domProps: {
                value: ''
            },
            on: {
                input: function (event) {
                    self.$emit('input', event.target.value)
                }
            }
        })
    }
}
