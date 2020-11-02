<template>
    <div>
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Add Category</h3>
            <div class="row breadcrumbs-top">
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
                                <router-link to="/category-create" class="btn btn-primary btn-sm float-right">Add Category</router-link>
                            </h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
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
                                                <a href="" class="btn btn-sm btn-warning" title="Edit Category"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="" class="btn btn-sm btn-danger" title="Delete Category"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                $('#datatable').DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
            }
        }
    }
</script>

<style scoped>
    @import '/robust/app-assets/vendors/css/tables/datatable/datatables.min.css';
</style>
