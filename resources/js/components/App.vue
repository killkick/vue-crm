<template>
    <div class="h-screen bg-white">
        <div class="flex">
            <div class="bg-gray-200 w-48 h-screen border-r-2 border-gray-400 pl-6">
                <nav class="pt-4">
                    <router-link to="/" class="">
                        <h1 class="text-blue-400 text-3xl">Mini crm</h1>
                    </router-link>
                    <p class="text-gray-500 uppercase font-bold pt-12 text-xs">General</p>
                    <div class="mb-2">
                        <router-link to="/companies" class=" py-2 hover:text-blue-700">
                            <div class="tracking-wide ">{{ $t('companies')}}</div>
                        </router-link>
                    </div>
                    <div>
                        <router-link to="/employees" class=" py-2 hover:text-blue-700">
                            <div class="tracking-wide ">{{ $t('employees')}}</div>
                        </router-link>
                    </div>
                    <div  class=" py-2 hover:text-blue-700">
                        <router-link to="/logout" class=" py-2 hover:text-blue-700">
                            <div class="tracking-wide ">{{ $t('logout')}}</div>
                        </router-link>
                    </div>

                    <a href="" @click.prevent="setLocale('en')">
                        <flag iso="us"></flag>
                    </a>
                    <a href="" @click.prevent="setLocale('ru')">
                        <flag iso="ru"></flag>
                    </a>
                </nav>
            </div>
            <div class="flex-1 flex flex-col h-screen overflow-y-hidden">
                <div class="px-6 h-16 border-gray-400 border-b flex items-center justify-between">
                    <div>
                        Mini Crm
                    </div>
                </div>
                <div class=" flex flex-col flex-1 overflow-y-hidden">
                    <router-view class="overflow-x-hidden p-6" ></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "App",
        props: [
            'user'
        ],
        created() {

        },
        methods: {
            setLocale(locale) {
                this.$i18n.locale = locale
            }
        }
    }
</script>

<style scoped>

</style>
