import { Call } from './../../call'
import Link from './link'
import Input from './plugins/input'
import Button from './plugins/button'
import Text from './plugins/text'
import Remember from './remember'

let app = {}

export default {
    name: 'Call',
    props: {
        initialPage: {
            type: Object,
            required: true,
        },
        resolveComponent: {
            type: Function,
            required: true,
        },
        transformProps: {
            type: Function,
            default: props => props,
        },
    },
    data() {
        return {
            component: null,
            props: {},
            key: null,
        }
    },
    created() {
        app = this
        Call.init({
            initialPage: this.initialPage,
            resolveComponent: this.resolveComponent,
            updatePage: async (component, props, { preserveState }) => {
                this.component = component
                this.props = this.transformProps(props)
                this.key = preserveState ? this.key : Date.now()
            },
        })
    },
    render(h) {
        if (this.component) {
            const child = h(this.component, {
                key: this.key,
                props: this.props,
                scopedSlots: this.$scopedSlots,
            })

            if (this.component.layout) {
                if (typeof this.component.layout === 'function') {
                    return this.component.layout(h, child)
                } else if (Array.isArray(this.component.layout)) {
                    return this.component.layout
                        .concat(child)
                        .reverse()
                        .reduce((child, layout) => h(layout, [child]))
                }

                return h(this.component.layout, [child])
            }

            return child
        }
    },
    install(Vue) {
        Object.defineProperty(Vue.prototype, '$call', { get: () => Call })
        Object.defineProperty(Vue.prototype, '$page', { get: () => app.props })
        Vue.mixin(Remember)
        Vue.component('CallLink', Link)
        Vue.component('CallInput', Input)
        Vue.component('CallButton', Button)
        Vue.component('CallText', Text)
    },
}
