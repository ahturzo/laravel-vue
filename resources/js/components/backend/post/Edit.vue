<template>
    <div>
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Post</h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                        <li class="breadcrumb-item"><router-link to="/all-post">All Post</router-link></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>

        <section id="ordering">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-gradient-striped-yellow box-shadow-0">
                        <div class="card-header">
                            <h4 class="card-title">Add New Post</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title" class="text-danger"><b style="color:#00008B;">Title</b> *</label>
                                                <input type="text" id="title" name="title" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" placeholder="Enter Blog Title" v-model="form.title">
                                                <has-error :form="form" field="title"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category_id" class="text-danger"><b style="color:#00008B;">Category</b> *</label>
                                                <select id="category_id" class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }" v-model="form.category_id">
                                                    <option value="">Select Post Category...</option>
                                                    <option v-for="category in getAllCategory" :value="category.id">{{ category.name }}</option>
                                                </select>
                                                <has-error :form="form" field="category_id"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description" class="text-danger"><b style="color:#00008B;">Description</b> *</label>
                                                <ckeditor id="description" v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }" :config="editorConfig"></ckeditor>
                                                <has-error :form="form" field="description"></has-error>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <small class="text-danger">Fill the form correctly with all mandatory fields(*) and click the “Save” button.</small>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" name="submit" id="submit" @click.prevent="updatePost()" value="Update" class="btn btn-sm btn-success pull-right">
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
        created() {

        },
        data(){
            return {
                form: new Form({
                    title: '',
                    category_id: '',
                    description: '',
                    content: ''
                }),
                editorConfig: {

                }
            }
        },
        mounted() {
            var id = this.$route.params.postid
            this.$store.dispatch("allCategory")
            axios.get('/post/'+id+'/edit')
                .then((response) => {
                    this.form.fill(response.data)
                })
            setTimeout(function (evt) {
                this.jqueryFunction();
            }.bind(this), 1000);
        },
        computed:{
            getAllCategory()
            {
                return this.$store.getters.getCategory
            }
        },
        methods:{
            jqueryFunction: function () {

            },
            updatePost(){
                var id = this.$route.params.postid
                this.form.patch('/post/'+id)
                    .then((response) => {
                        this.$router.push('/all-post')

                        Toast.fire({
                            icon: 'success',
                            title: 'Post created successfully!!!'
                        })
                    })
                    .catch((e) => {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: e.response.data.message,
                            showConfirmButton: false,
                            timer: 50000
                        })
                    })
            }
        }
    }
</script>

<style scoped>

</style>
