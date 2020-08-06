<template>
    <div>
        <form @submit.prevent="submitData()" enctype="multipart/form-data">
            <input-field name="name" type="text" :errors="errors" label="Contact name" placeholder="Contact Name"
                         @updateInput="form.name = $event" ></input-field>

            <input-field name="email" type="text" :errors="errors" label="Contact email" placeholder="Contact Email"
                         @updateInput="form.email = $event"></input-field>

            <input-field name="website" type="text" :errors="errors" label="Contact website" placeholder="website"
                         @updateInput="form.website = $event"></input-field>
            <input type="file" @change="onImageChange($event)" name="logo">
            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-400">Add new contact</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from "../../components/InputField";

    export default {
        name: "CompanyCreate",
        components: {InputField},
        data() {
            return {
                form : {
                    'name'  :'',
                    'email'  :'',
                    'website' : '',
                    'logo' : ''
                },
                errors : null
            }
        },
        methods : {
            submitData() {
                let data = new FormData();
                data.append("logo", this.form.logo);
                data.append("name", this.form.name);
                data.append("email", this.form.email);
                data.append("website", this.form.website)
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                    }
                }

                axios.post('/api/companies' , data, config)
                    .then(response => {
                        this.$router.push(response.data.links.path);
                    }).catch(errors => {
                    this.errors = errors.response.data.errors
                })
            },
            onImageChange(e){
                console.log(e.target.files[0]);
                this.form.logo = e.target.files[0];
            },
        }
    }
</script>

<style scoped>

</style>
