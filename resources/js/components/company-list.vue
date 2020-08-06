<template>
    <div>
        <div v-if="data.length === 0">
            <p>Not contacts yet.</p>
        </div>
        <div v-for="company in data.data">
            <router-link :to="'/companies/' + company.data.id"
                         class="flex flex-center border-b p-4  border-gray-400 hover:border-blue-500">
                <div class="ml-2">
                    <p class="text-blue-400 text-bold"> {{ company.data.name }}</p>
                    <p class="text-gray-600 text-bold"> {{ company.data.email }}</p>
                    <img :src="'/img/' + company.data.logo" alt="" width="100px" height="100px">
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "company-list",
             props : [
                 'data'
             ]
    }
</script>

<style scoped>

</style>
