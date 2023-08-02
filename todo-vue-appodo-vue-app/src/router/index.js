import { createRouter, createWebHistory } from "vue-router";
import routes from "./routes.js";

const router = createRouter({
    routes,
    history: createWebHistory(),
    linkActiveClass: "active"
})
router.beforeEach((to, from) => {
    console.log("Global before each", to, from);
    // return false;
    // return { name: "login" };
    // if (to.path === "/tasks") {
    //     return { name: "login" };
    // }
    if (to.meta.auth) {
        return {
            name: "login",
            query: {
                redireck: to.fullPath
            }
        };
    }

})

export default router;