import TasksPage from '../pages/TasksPage.vue';
import LoginPage from '../pages/LoginPage.vue';
import RegisterPage from '../pages/RegisterPage.vue';
import SummaryPage from '../pages/SummaryPage.vue';
import NotFoundPage from '../pages/errors/NotFoundPage.vue'
import HomePage from '../pages/HomePage.vue';

const routes = [{
        path: "/",
        component: HomePage,
        name: 'home',
        // meta: {
        //     auth: true
        // }
    },
    {
        path: "/tasks",
        component: TasksPage,
        name: 'Tasks',
        // meta: {
        //     auth: true
        // }
    },
    {
        path: "/login",
        component: LoginPage,
        name: 'login'
    },
    {
        path: "/summary",
        component: SummaryPage,
        name: 'summary',
        // meta: {
        //     auth: true
        // }
    },
    {
        path: "/register",
        component: RegisterPage,
        name: 'register'
    },
    {
        path: "/:notFound(.*)",
        name: 'error.404',
        component: NotFoundPage
    },
]
export default routes