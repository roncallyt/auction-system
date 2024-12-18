import { createRouter, createWebHistory } from 'vue-router'

import auth from './middlewares/auth'
import noAuth from './middlewares/noAuth'

const routes = [
  { 
    path: '/login', 
    name: 'Login',
    component: () => import('../views/Login.vue'),
    meta: {
      layout: 'GuestLayout',
      middleware: [ noAuth ]
    }
  },
  { 
    path: '/', 
    name: 'Home',
    component: () => import('../views/Home.vue'),
    meta: {
      layout: 'AppLayout',
      middleware: [ auth ]
    }
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

function nextFactory(context, middleware, index) {
  const nextMiddleware = middleware[index];
  
  if (!nextMiddleware){
    return context.next;
  }
  const subsequentMiddleware = nextFactory(context, middleware, index + 1);
  return nextMiddleware({ ...context, next: subsequentMiddleware })
}

router.beforeEach((to, from, next) => {
  if(! to.meta.middleware){
    return next();
  }

  const middleware = Array.isArray(to.meta.middleware)
    ? to.meta.middleware
    : [to.meta.middleware];

  const context = {
    to,
    from,
    next,
    router,
  };

  return middleware[0]({ ...context, next: nextFactory(context, middleware, 1) });
});

export default router
