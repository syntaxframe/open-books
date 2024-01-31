import {Outlet} from "react-router-dom";
import Header from "../components/header.tsx";

export default function DefaultLayout(){
  return(
  <>
    <Header />
    <Outlet />
  </>
  )
}
