import AdminDashboard from "./components/backend/AdminDashboard";
import CategoryList from "./components/backend/category/List";
import AddCategory from "./components/backend/category/Create";
import EditCategory from "./components/backend/category/Edit";
//
export const routes = [
    {path: '/home', component: AdminDashboard },
    {path: '/category-list', component: CategoryList },
    {path: '/category-create', component: AddCategory },
    {path: '/edit-category/:categoryid', component: EditCategory },
]
