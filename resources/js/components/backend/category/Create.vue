<template>
    <div>
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Add Category</h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                        <li class="breadcrumb-item"><router-link to="/category-list">All Category</router-link></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>

        <section id="ordering">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Category</h4>
                        </div>
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
                                            <input type="submit" name="submit" id="submit" @click.prevent="addCategory()" value="Save" class="btn btn-sm btn-success pull-right">
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
        name: "Create",
        data(){
            return {
                // Create a new form instance
                form: new Form({
                    name: '',
                })
            }
        },
        methods:{
            addCategory(){
                this.form.post('/category')
                .then((response) => {
                    this.$router.push('/category-list')

                    Toast.fire({
                        icon: 'success',
                        title: 'Category created successfully!!!'
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
