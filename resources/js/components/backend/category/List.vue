<template>
    <div>
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
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>System Architect</td>
                                        <td>
                                            <a href="">Edit</a>
                                            <a href="">Delete</a>
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
        <!--/ Default ordering table -->
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
            setTimeout(function (evt) {
                this.jqueryFunction();
            }.bind(this), 1000);
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
