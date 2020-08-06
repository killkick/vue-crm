<template>
    <div>
        <div v-if="loading">loading</div>
        <div v-else>
            <div class="flex justify-between">
                <a href="#" class="text-blue-400" @click="$router.back()">
                    < Back
                </a>
                <div class="relative">
                    <router-link :to="'/employees/' + employee.id + '/edit'"
                                 class="px-4 py-2 rounded text-sm text-green-500 border-green-500 border font-bold mr-2">Edit</router-link>
                    <a class="px-4 py-2 border-red-500 border rounded text-sm font-bold text-red-500" href="" @click.prevent="modal = !modal">Delete</a>
                    <div class="absolute bg-blue-800 text-white w-64 rounded rounded-lg py-5 px-4 right-0 py-2 z-20" v-if="modal">
                        <p class="px-4 py-2">
                            Are you sure to delete this employee?
                        </p>
                        <div class="flex justify-end mt-5">
                            <button class="mr-3" @click="modal = !modal" >Cancel</button>
                            <button class="px-4 py-2 ronded rounded-lg bg-red-500 text-white" @click="destroy">Delete</button>
                        </div>
                    </div>

                </div>
                <div class="absolute bg-black opacity-25 right-0 bottom-0 left-0 top-0 z-10" v-if="modal" @click="modal = !modal"></div>
            </div>
            <div class="flex items-center pt-6">
                <p class="text-xl mr-2">{{ employee.first_name }}</p>
                <p class="text-xl">{{ employee.last_name }}</p>
            </div>
            <p  class="pt-6 text-gray-600 font-bold uppercase font-sm">Contact</p>
            <p class="pt-2 text-blue-400">{{employee.email }}</p>
            <p class="pt-2 text-blue-400">{{employee.phone }}</p>
            <div class="mt-2">
                <p  class="pt-6 text-gray-600 font-bold uppercase font-sm">Company-</p>
                <router-link :to="/companies/ + employee.company_id" class="pt-2 text-blue-400 hover:text-blue-800" >{{employee.company_name }}</router-link>
            </div>




        </div>
    </div>
</template>

<script>
    export default {
        name: "singleEmployee",
        data() {
            return {
                employee : null,
                loading :true,
                modal :  false,
            }
        },
        mounted() {
            axios.get('/api/employees/' + this.$route.params.id)
                .then(response => {
                    this.employee = response.data.data
                    this.loading = false;
                }).catch(error => {
                this.loading = false;
            })
        },
        methods : {
            destroy() {
                axios.delete('/api/employees/' + this.$route.params.id)
                    .then(response => {
                        this.$router.push('/employees')
                    })
                    .catch( error => {
                        }
                    )
            }
        }
    }
</script>

<style scoped>

</style>
