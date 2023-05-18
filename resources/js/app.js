import { createApp, h } from 'vue';
import { createInertiaApp, Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import Layout from "./Shared/Layout.vue";
 
createInertiaApp({
  // resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  
  /* 
  An update of the above line, to include a default layout (imported above).
  The default can be overridden by an individual, if required (see settings.vue).
  */
  resolve: name => {
    const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
    page.then((module) => {
      // if (module.default.layout === undefined) {
      //   module.default.layout = Layout;
      // }
      module.default.layout ??= Layout; // Allows an alternative layout to override this one (equivalent to previous 3 lines)
    });
    return page;
  },
  
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(plugin)
      // Registering components globally here saves having to import them individually.
      .component("Link", Link)
      .mount(el)
  },
  progress: {
    showSpinner: true,
  },
});
