<template>
    <div>
        <div>
            <a href="#" class="text-blue-400" @click="$router.back()">
                < Back
            </a>
        </div>
        <form @submit.prevent="submitData()" enctype="multipart/form-data">
            <input-field name="name" type="text"  :errors="errors" label="Contact name" placeholder="Contact Name" @updateInput="form.name = $event" :watchDate="form.name" ></input-field>
            <input-field name="email" type="text" :errors="errors" label="Contact email" placeholder="Contact Email" @updateInput="form.email = $event" :watchDate="form.email" ></input-field>
            <input-field name="website" type="text" :errors="errors" label="Contact website" placeholder="website" @updateInput="form.website = $event" :watchDate="form.website" ></input-field>
            <div class="flex justify-end">
                <button class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-400" >Edit</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from "../../components/InputField";
    export default {
        name: "EditCompany",

        components: {InputField},
        data() {
            return {
                form : {
                    'name'  :'',
                    'email'  :'',
                    'logo'  :'',
                    'website' : ''
                },
                errors : null,
            }
        },
        created() {
            axios.get('/api/companies/' + this.$route.params.id)
                .then(response => {
                    this.form = response.data.data
                    this.loading = false;
                }).catch(error => {
                this.loading = false;
            })
        },
        methods : {
            submitData() {
                let data = new FormData()
                data.append("name", this.form.name);
                data.append("email", this.form.email);
                data.append("website", this.form.website)
                axios.patch('/api/companies/' + this.$route.params.id  ,data)
                    .then(response => {
                        this.$router.push(response.data.links.path)
                    }).catch(errors => {
                    this.errors = errors.response.data.errors
                })
            },
            onFileChange(event) {
                this.formFields.picture = event.target.files[0];
            }
        }
    }
</script>

<style scoped>

</style>
