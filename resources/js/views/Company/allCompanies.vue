<template>
    <div>
        <company-list :data="companies"></company-list>
        <div class="mt-6">
            <router-link to="/company/create" class="text sm text-blue-400 bg-white border border-blue-500 hover:border-blue-300 py-2 px-4 rounded mt-6 ">
                Create company
            </router-link>
        </div>
        <paginate :data="companies" @pagination-change-page="getResults"></paginate>
    </div>
</template>

<script>
    import CompanyList from "../../components/company-list";
    import paginate from 'laravel-vue-pagination'
    export default {
        name: "allCompanies",
        components: {CompanyList,paginate},
        data() {
            return {
                companies : {}
            }
        },
        mounted() {
            this.getResults();
            axios.get('/api/companies')
                .then(response=> {
                    this.companies = response.data
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
