<template>
    <div>
        <company-list :data="companies"></company-list>
        <div class="mt-6">
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
