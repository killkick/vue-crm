import  Vue from 'vue'

import  Vue18n from 'vue-i18n'
Vue.use(Vue18n)
export const i18n = new Vue18n({
    locale : 'en',
    fallbackLocale: 'ru',
    messages : {
        ru : {
            "companies" : "Компании",
            "employees" : "Работники",
            "logout" : "Выйти",
        },
        en : {
            "companies" : "companies",
            "employees" : "employees",
            "logout" : "logout",
        }

    }
})
