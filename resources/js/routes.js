import AdminDashboard from "./components/backend/AdminDashboard";

// Category components
import CategoryList from "./components/backend/category/List";
import AddCategory from "./components/backend/category/Create";
import EditCategory from "./components/backend/category/Edit";

// post components
import AllPost from "./components/backend/post/Index";
import CreatePost from "./components/backend/post/Create";
import EditPost from "./components/backend/post/Edit";

//
export const routes = [
    {path: '/home', component: AdminDashboard },

    // category routes
    {path: '/category-list', component: CategoryList },
    {path: '/category-create', component: AddCategory },
    {path: '/edit-category/:categoryid', component: EditCategory },

    // Post routes
    {path: '/all-post', component: AllPost },
    {path: '/create-post', component: CreatePost },
    {path: '/edit-post/:postid', component: EditPost },
]
