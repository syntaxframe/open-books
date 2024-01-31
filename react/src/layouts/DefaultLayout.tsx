import {Outlet} from "react-router-dom";
import Header from "../components/header.tsx";

export default function GuestLayout(){
  return(
    <>
      <Header />
      <Outlet />
    </>
  )
}
