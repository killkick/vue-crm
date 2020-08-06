<template>
    <div>
        <div v-if="data.length === 0">
            <p>Not contacts yet.</p>
        </div>
        <div v-for="employee in data.data">
            <router-link :to="'/employees/' + employee.data.id"
                         class="flex flex-center border-b p-4  border-gray-400 hover:border-blue-500">
                <div class="ml-2">
                        <div class="flex ">
                            <p class="text-blue-400 mr-1 text-bold inline-block"> {{ employee.data.first_name }}</p>
                            <p class="text-blue-400 text-bold inline-block"> {{ employee.data.last_name }}</p></div>
                            <p class="text-gray-600 text-bold"> {{ employee.data.email }}</p>
                                <div class="flex">
                                    <p class="text-blue-500 text-bold">Company - </p>
                                    <p class="text-gray-600 text-bold">{{ employee.data.company_name }}</p>
                                </div>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        props : [
            'data'
        ],
        name: "employee-list"
    }
</script>

<style scoped>

</style>
