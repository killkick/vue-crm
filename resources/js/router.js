import vue from 'vue'
import VueRouter from 'vue-router'
import ExampleComponent from './components/ExampleComponent'
import allCompanies from './views/Company/allCompanies'
import allEmployee from './views/Employee/allEmployee'
import singleCompany from './views/Company/singleCompany'
import editCompany from './views/Company/EditCompany'
import companyCreate from './views/Company/CompanyCreate'
import logOut from "./actions/logout"
import singleEmployee from './views/Employee/singleEmployee'
import editEmployee from './views/Employee/editEmployee'
import employeeCreate from './views/Employee/employeeCreate'

vue.use(VueRouter)

export default new VueRouter({
    routes : [
        {
            path : '/',
            component : ExampleComponent,
            meta :  {
                title : 'Welcome'
            }
        },
        {
            path : '/companies',
            component : allCompanies,

        },
        {
            path : '/employees',
            component : allEmployee,

        },
        {
            path : '/companies/:id',
            component : singleCompany,

        },
        {
            path : '/employees/:id',
            component : singleEmployee,

        },
        {
            path : '/companies/:id/edit',
            component : editCompany,

        },
        {
            path : '/employees/:id/edit',
            component : editEmployee,

        },
        {
            path : '/company/create',
            component : companyCreate,
        },
        {
            path : '/employee/create',
            component : employeeCreate,
        },
        {
            path : '/logout',
            component : logOut,

        },
    ],
    mode : 'history'
})
