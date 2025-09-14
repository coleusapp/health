import '../css/app.css';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import { ZiggyVue } from 'ziggy-js';
import ui from '@nuxt/ui/vue-plugin';
import { plugin as formkitPlugin } from '@formkit/vue';
import formkitConfig from "../../formkit.config";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title: string) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(ui)
            .use(formkitPlugin, formkitConfig);
        app.config.globalProperties.$toast = useToast();
        app.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
