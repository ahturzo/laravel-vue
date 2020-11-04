<template>
    <div>
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">All Category</h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>

        <section id="ordering">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Category List
                                <router-link to="/category-create" class="btn btn-primary btn-round btn-sm float-right"><i class="fa fa-plus"></i> Add Category</router-link>
                            </h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered default-ordering" id="datatable">

                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(category,index) in getAllCategory" :key="category.id">
                                            <td>{{ index+1 }}</td>
                                            <td>{{ category.name }}</td>
                                            <td>{{ category.created_at | dateFormat }}</td>
                                            <td>
                                                <router-link :to="`/edit-category/${category.id}`" class="btn btn-sm btn-warning" title="Edit Category"><i class="fa fa-pencil-square-o"></i></router-link>
                                                <a @click.prevent="deleteCategory(category.id)" class="btn btn-sm btn-danger" title="Delete Category"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
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
        name: "List",
        created() {
            var scripts = [
                "robust/app-assets/vendors/js/tables/datatable/datatables.min.js"
            ];
            scripts.forEach(script => {
                let tag = document.createElement("script");
                tag.setAttribute("src", script);
                document.head.appendChild(tag);
            });
        },
        mounted() {
            this.$store.dispatch("allCategory")
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
        methods: {
            jqueryFunction: function () {
                $('#datatable').DataTable();
            },
            deleteCategory(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this category???",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Vue.axios.delete('category/'+id,{_method: 'delete'})
                            .then((response) => {
                                this.$store.dispatch('allCategory');
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Category Deleted successfully'
                                });
                            })
                        .catch((e) => {
                            Toast.fire({
                                icon: 'error',
                                title: 'Error Deleting Category'
                            });
                        })

                    }
                })
            }
        }
    }
</script>

<style scoped>
    @import '/robust/app-assets/vendors/css/tables/datatable/datatables.min.css';
</style>
