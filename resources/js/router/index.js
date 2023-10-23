    import { createRouter, createWebHistory } from "vue-router";
    import Template from "../admin/Components/Template.vue";
    import store from "@/store";
    const routes = [
        {
            path: "/",
            name: "accueil",
            component: () => import("../pages/Home.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            },
        },
        {
            path: "/contact",
            name: "contact",
            component: () => import("../pages/Contact.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            },
        },
        {
            path: "/formations",
            name: "formations",
            component: () => import("../pages/Formation.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            },
        },

        {
            path: "/actualites",
            name: "actualites",
            component: () => import("../pages/Actualite.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            },
        },
        {
            path: "/mediatheque",
            name: "mediatheque",
            component: () => import("../pages/Mediatheque.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            },
        },
        {
            path: "/expertises",
            name: "expertises",
            component: () => import("../pages/Expertise.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            },
        },
        {
            path: "/offres",
            name: "offres",
            component: () => import("../pages/Offre.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            },
        },
        {
            path: "/realisations",
            name: "realisations",
            component: () => import("../pages/Realisation.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            },
        },

        {
            path: "/login",
            name: "login",
            component: () => import("../pages/Login.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            },
        },
        {
            path: "/actualiteDetail/:id",
            name: "actualiteDetail",
            component: () => import("../pages/DetailActualite.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            }
        },

        {
            path: "/offreDetail/:id",
            name: "offreDetail",
            component: () => import("../pages/DetailOffre.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            }
        },

        {
            path: "/postuler/offre/:id",
            name: "subscribe",
            component: () => import("../pages/Subscribe.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            }
        },

        {
            path: "/formationDetail/:id",
            name: "formationDetail",
            component: () => import("../pages/DetailFormation.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            }
        },

        {
            path: "/page-not-found",
            name: "page-not-found",
            component: () => import("../pages/NotFound.vue"),
            meta: {
                requiresAuth: false,
                layout: 'guest-layout'
            }
        },

         // Admin route

        {
            path: "/admin/dashboard",
            name: "admin",
            component: () => import("../admin/Pages/Dashboard.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },

        {
            path: "/admin/actualites/liste",
            name: "admin/actualites/liste",
            component: () => import("../admin/Pages/Actualites/Liste.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },
        {
            path: "/admin/actualites/ajout",
            name: "admin/actualites/ajout",
            component: () => import("../admin/Pages/Actualites/Ajout.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },

        {
            path: "/admin/messages",
            name: "admin/messages",
            component: () => import("../admin/Pages/Message.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },

        {
            path: "/admin/abonnements",
            name: "admin/abonnements",
            component: () => import("../admin/Pages/Abonnement.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },
        {
            path: "/admin/inscriptions",
            name: "admin/inscriptions",
            component: () => import("../admin/Pages/Inscription.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },
        {
            path: "/admin/mediatheque",
            name: "admin/mediatheque",
            component: () => import("../admin/Pages/Mediatheque/Liste.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },
        {
            path: "/admin/mediatheque/ajout",
            name: "admin/mediatheque/ajout",
            component: () => import("../admin/Pages/Mediatheque/Ajout.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },



        {
            path: "/admin/formations/liste",
            name: "admin/formations/liste",
            component: () => import("../admin/Pages/Formations/Liste.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },
        {
            path: "/admin/formations/ajout",
            name: "admin/formations/ajout",
            component: () => import("../admin/Pages/Formations/Ajout.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },



        {
            path: "/admin/expertise/liste",
            name: "admin/expertise/liste",
            component: () => import("../admin/Pages/Expertises/Liste.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },
        {
            path: "/admin/expertise/ajout",
            name: "admin/expertise/ajout",
            component: () => import("../admin/Pages/Expertises/Ajout.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },



        {
            path: "/admin/offres/liste",
            name: "admin/offres/liste",
            component: () => import("../admin/Pages/Offres/Liste.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },
        {
            path: "/admin/offres/ajout",
            name: "admin/offres/ajout",
            component: () => import("../admin/Pages/Offres/Ajout.vue"),
            meta: {
                requiresAuth: true,
                layout: 'auth-layout'
            }
        },

        {
            path: '/:pathMatch(.*)*',
            component:()=> import('../pages/NotFound.vue')
        }
    ];


    const router = createRouter({
        history: createWebHistory(),
        routes,
    });


    router.beforeEach((to, from, next) => {
        if(to.meta.layout){
            const layout = to.meta.layout
            localStorage.setItem('layout',layout)
        }
        if (to.matched.some(record => record.meta.requiresAuth)) {
            if (store.getters.user){
                console.log(store.getters.user)
                next();
                return;
            }
            next("/login");
        } else {
            next();
        }
    });

    export default router;
