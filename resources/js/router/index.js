import { createWebHistory, createRouter } from "vue-router";
import { publicRoutes } from '@/router/routes/public-routes'
const routes = [ ...publicRoutes ];
const router = createRouter( {
    history: createWebHistory(),
    routes,
} );
router.beforeEach( ( to, from, next ) => {
    next()
} );

export default router;
