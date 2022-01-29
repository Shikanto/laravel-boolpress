import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import About from "./pages/About.vue";
import Contact from "./pages/Contact.vue";
import NotFound from "./pages/NotFound.vue";
import PostsShow from "./pages/posts/Show.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history", //o possiamo usare hash la differenza sta che history è più moderno ma hash viene letto anche dai brower più vecchi
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about",
            name: "about",
            component: About
        },
        {
            path: "/contact",
            name: "contact",
            component: Contact
        },
        {
            path: "/posts/:slug", //rotta dinamica mettiamo i duepunti
            name: "posts.show",
            component: PostsShow
        },
        {
            path: "/*", //rotta generica
            name: "not-found",
            component: NotFound,
        },
    ]

});

export default router;