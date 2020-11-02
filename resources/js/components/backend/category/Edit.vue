<template>
    <div>
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Edit Category</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                        <li class="breadcrumb-item"><router-link to="/category-list">All Category</router-link></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>

        <section id="ordering">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name" class="text-danger"><b style="color:#00008B;">Chapter Name</b> *</label>
                                                <input type="text" id="name" name="name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" required placeholder="Enter Category name" v-model="form.name">
                                                <has-error :form="form" field="name"></has-error>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <small class="text-danger">Fill the form correctly with all mandatory fields(*) and click the “Save” button.</small>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" name="submit" id="submit" @click.prevent="editCategory()" value="Update" class="btn btn-sm btn-success pull-right">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "Edit",
        mounted() {
            var id = this.$route.params.categoryid
            axios.get('/category/'+id+'/edit')
                .then((response) => {
                    this.form.fill(response.data)
                })
        },
        data(){
            return {
                // Create a new form instance
                form: new Form({
                    name: '',
                })
            }
        },
        methods:{
            editCategory(){
                var id = this.$route.params.categoryid
                this.form.patch('/category/'+id)
                    .then((response) => {
                        this.$router.push('/category-list')

                        Toast.fire({
                            icon: 'success',
                            title: 'Category Edited successfully!!!'
                        })
                    })
                    .catch((e) => {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: e.response.data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    })
            }
        }
    }
</script>

<style scoped>

</style>
