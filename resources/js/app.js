import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import Layout from "./Shared/Layout.vue";
 
createInertiaApp({
  resolve: name => {
    const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
    page.then((module) => {
      module.default.layout ??= Layout;
    });
    return page;
  },
  
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link", Link)
      .component("Head", Head)
      .mount(el)
  },

  // This title template receives titles from Home, Settings & Users.
  // Result in the following page title:  'My App - Home', 'My App - Settings' & 'My App - Users'.
  title: title => `My App - ${title}`,

  progress: {
    showSpinner: true,
  },
});
