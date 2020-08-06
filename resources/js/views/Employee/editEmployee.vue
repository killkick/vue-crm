<template>
    <div>
        <div v-if="loading"></div>
        <div v-else>
            <form @submit.prevent="submitData()">
                <div class="relative pb-4">
                    <label for="first_name" class="text-blue-500 text-xs pt-2 uppercase font-bold absolute">first
                        name</label>
                    <input type=text id="first_name"
                           class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400"
                           placeholder="first_name" v-model="form.first_name">
                    <p class="text-red-700 text-xs"></p>
                </div>
                <div class="relative pb-4">
                    <label for="last_name" class="text-blue-500 text-xs pt-2 uppercase font-bold absolute">last
                        name</label>
                    <input type=text id="last_name"
                           class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400"
                           placeholder="last_name" v-model="form.last_name">
                    <p class="text-red-700 text-xs"></p>
                </div>
                <div class="relative pb-4">
                    <label for="email" class="text-blue-500 text-xs pt-2 uppercase font-bold absolute"> email </label>
                    <input type="text" id="email"
                           class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400"
                           placeholder="email" v-model="form.email">
                    <p class="text-red-700 text-xs"></p>
                </div>
                <div class="relative pb-4">
                    <label for="phone" class="text-blue-500 text-xs pt-2 uppercase font-bold absolute"> phone</label>
                    <input type="text" id="phone"
                           class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400"
                           placeholder="phone" v-model="form.phone">
                    <p class="text-red-700 text-xs"> </p>
                </div>
                <div class="relative pb-4">
                    <select name="company_id" id="company_id" v-model="form.company_id">
                        <option v-for="company in companies" :value="company.data.id">
                            {{ company.data.name }}
                        </option>
                    </select>
                </div>

                <div class="flex justify-end">

                    <button class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-400">Edit employee</button>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
    export default {
        name: "editEmployee",
        data() {
            return {
                loading: true,
                form: {
                    'first_name': '',
                    'last_name': '',
                    'phone': '',
                    'email': '',
                    'company_id': null
                },
                companies : null,
            }
        },
        mounted() {
            axios.get('/api/employees/' + this.$route.params.id)
                .then(response => {
                    this.form = response.data.data
                    this.loading = false;
                }).catch(error => {
                this.loading = false;
            })

            axios.get('/api/companies')
                .then(response=> {
                    this.companies = response.data.data
                    this.loading = false
                }).catch(e => {
                this.errors = errors.response.data.errors
            })
        },
        methods: {
            submitData() {
                axios.patch('/api/employees/' + this.$route.params.id, this.form)
                    .then(response => {
                        this.$router.push(response.data.links.path);
                    }).catch(errors => {
                    this.errors = errors.response.data.errors
                })
            },
        },

    }

</script>

<style scoped>

</style>
