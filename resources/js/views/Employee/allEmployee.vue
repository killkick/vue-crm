<template>
    <div>
        <employee-list :data="employees"></employee-list>
        <div class="mt-6">
            <router-link to="/employee/create" class="text sm text-blue-400 bg-white border border-blue-500 hover:border-blue-300 py-2 px-4 rounded mt-6 ">
                Create Employee
            </router-link>
        </div>
        <paginate :data="employees" @pagination-change-page="getResults"></paginate>
    </div>
</template>

<script>
    import paginate from 'laravel-vue-pagination'
    import EmployeeList from "../../components/employee-list";
    export default {
        name: "allEmployee",
        components: {EmployeeList,paginate },
        data() {
            return {
                employees: {}
            }
        },
        mounted() {
            axios.get('/api/employees')
                .then(response=> {
                    this.employees = response.data
                }).catch(e => {

            })
        },
        methods : {
            getResults(page = 1) {
                axios.get('/api/companies?page=' + page)
                    .then(response => {
                        this.companies = response.data;
                    });
            }
        }
    }
</script>

<style scoped>
    .pagination {
        display: flex;
        justify-content: center;
    }
</style>
