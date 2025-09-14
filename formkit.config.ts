import { genesisIcons } from '@formkit/icons';
import { defaultConfig } from '@formkit/vue';
import { rootClasses } from './formkit.theme';
import { createProPlugin, repeater, toggle, togglebuttons } from '@formkit/pro';

const proPlugin = createProPlugin('fk-36c75313d', {
    repeater,
    toggle,
    togglebuttons,
})

export default defaultConfig({
    plugins: [proPlugin],
    icons: {
        ...genesisIcons
    },
    config: {
        rootClasses,
    }
});
