<template>
    <div>
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">All Post</h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                        <li class="breadcrumb-item active">Post</li>
                    </ol>
                </div>
            </div>
        </div>

        <section id="ordering">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Post List
                                <router-link to="/create-post" class="btn btn-primary btn-round btn-sm float-right"><i class="fa fa-plus"></i> Add Post</router-link>
                            </h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-hover table-bordered default-ordering" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Content</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(post,index) in allPost" :key="post.id">
                                            <td>{{ index+1 }}</td>
                                            <td>{{ post.title }}</td>
                                            <td>{{ post.description | shortLength(30, '.....') }}</td>
                                            <td>{{ post.category.name }}</td>
                                            <td><img :src="post.content" width="40" height="50"></td>
                                            <td>{{ post.created_at | dateFormat }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-primary" title="View Post"><i class="fa fa-eye"></i></a>
                                                <a href="" class="btn btn-sm btn-warning" title="Edit Post"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="" class="btn btn-sm btn-danger" title="Delete Post"><i class="fa fa-trash"></i></a>
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
        name: "Index",
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
            this.$store.dispatch("allPost")
            setTimeout(function (evt) {
                this.jqueryFunction();
            }.bind(this), 1000);
        },
        computed:{
            allPost()
            {
                return this.$store.getters.getAllPost
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
