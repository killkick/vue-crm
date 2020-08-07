<template>

    <div>
        <div v-if="loading"></div>
        <div v-else>
            <form @submit.prevent="submitData()" enctype="multipart/form-data">
                <div class="relative pb-4">
                    <label for="first_name" class="text-blue-500 text-xs pt-2 uppercase font-bold absolute">first name</label>
                    <input type=text id="first_name"
                           class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400"
                           placeholder="first_name"  v-model="form.first_name" >
                    <p class="text-red-700 text-xs"v-text="errorMessage()" ></p>
                </div>
                <div class="relative pb-4">
                    <label for="last_name" class="text-blue-500 text-xs pt-2 uppercase font-bold absolute">last name</label>
                    <input type=text  id="last_name"
                           class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400"
                           placeholder="last_name"  v-model="form.last_name" >
                    <p class="text-red-700 text-xs" v-text="errorMessage()" ></p>
                </div>
                <div class="relative pb-4">
                    <label for="email" class="text-blue-500 text-xs pt-2 uppercase font-bold absolute"> email </label>
                    <input type="text" id="email"
                           class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400"
                           placeholder="email"  v-model="form.email">
                    <p class="text-red-700 text-xs" v-text="errorMessage()" ></p>
                </div>
                <div class="relative pb-4">
                    <label for="phone" class="text-blue-500 text-xs pt-2 uppercase font-bold absolute"> phone</label>
                    <input type="text"  id="phone"
                           class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400"
                           placeholder="phone"  v-model="form.phone" >
                    <p class="text-red-700 text-xs" v-text="errorMessage()"></p>
                </div>
                <div class="relative pb-4">
                    <select name="company_id" id="company_id" v-model="form.company_id" class="bg-blue-300">
                        <option  v-for="company in companies" :value="company.data.id">
                            {{ company.data.name }}
                        </option>
                    </select>
                </div>

                <div class="flex justify-end">

                    <button class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-400">Add new employee</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import InputField from "../../components/InputField";

    export default {
        name: "employeeCreate",
        components: {InputField},
        data() {
            return {
                loading : true,
                form: {
                    'first_name': '',
                    'last_name': '',
                    'phone' : '',
                    'email': '',
                    'company_id' : null
                },
                companies : null,
                errors: null
            }
        },
        mounted () {
            axios.get('/api/companies')
                .then(response=> {
                    this.companies = response.data.data
                    this.loading = false
                    this.$router.push(response.data.links.path);
                }).catch(e => {
                this.errors = errors.response.data.errors
            })
        },
        methods: {
            errorMessage() {
                if (this.hasError) {
                    return this.errors[this.name][0]
                }
            },
            submitData() {
                axios.post('/api/employees', this.form)
                    .then(response => {
                        this.$router.push(response.data.links.path);
                    }).catch(errors => {
                    this.errors = errors.response.data.errors
                })
            },
            onImageChange(e) {
                console.log(e.target.files[0]);
                this.form.logo = e.target.files[0];
            },
        },
        computed : {
            hasError() {
                return this.errors && this.errors[this.name] && this.errors[this.name].length > 0
            }
        },
    }
</script>

<style scoped>

</style>
