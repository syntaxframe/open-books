import {createBrowserRouter} from "react-router-dom";
import Home from "./views/Home.tsx";
import Login from "./views/Login.tsx";
import SignUp from "./views/SignUp.tsx";
import DefaultLayout from "./layouts/DefaultLayout.tsx";
import GuestLayout from "./layouts/GuestLayout.tsx";
import AdminLayout from "./layouts/AdminLayout.tsx";
import CreateBook from "./views/CreateBook.tsx";

const router = createBrowserRouter([
  {
    path:"/",
    element: <GuestLayout />,
    children: [
      {
        path:"/",
        element: <Home />,
      },
      {
        path:"/login",
        element: <Login />,
      },
      {
        path:"/signup",
        element: <SignUp />,
      },
    ],
  },
  {
    path:"/",
    element: <AdminLayout />,
    children: [
      {
        path:"/",
        element: <CreateBook />,
      },
    ],
  },
  {
    path:"/",
    element: <DefaultLayout />,
    children: [
      {
        path:"/",
        element: <Home />,
      },
    ],
  },
])

export default router;
