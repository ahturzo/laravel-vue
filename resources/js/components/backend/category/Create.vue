<template>
    <div>
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Add Category</h3>
            <div class="row breadcrumbs-top">
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
                        <div class="card-header"></div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <h5>Chapter Name <small>*</small></h5>
                                                <div class="form-group">
                                                    <input type="text" id="name" name="name" class="form-control" required placeholder="Enter Category name">
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <small class="text-danger">Fill the form correctly with all mandatory fields(*) and click the “Save” button.</small>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" name="submit" id="submit" value="Save" class="btn btn-sm btn-success pull-right">
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
        name: "Create"
    }
</script>

<style scoped>

</style>
