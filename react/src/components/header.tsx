import {Link, redirect} from "react-router-dom";
import {useStateContext} from "../context/ContextProvider";
import axiosClient from "../axios-client.js";
import {useEffect} from "react";
import React from "react";

export default function Header () {
  const {token, setUser, setToken} = useStateContext();

  const onLogout = (event: React.MouseEvent<Element, MouseEvent>) => {
    event.preventDefault();

    axiosClient.post('/logout')
      .then(() => {
        setUser({});
        setToken(null);
        return redirect('/');
      });
  };

  useEffect(() => {
    axiosClient.get('/user')
      .then(({data}) => {
        setUser(data)
      })
  }, [])


  return (
    <header className="py-7">
      <nav className="px-10 flex justify-between items-center w-full">
        <Link to="/">
          <svg className="group h-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 9" fill="currentColor">
            <path className="group-hover:fill-emerald-500 transition-all duration-200 fill-neutral-50"
                  d="M11.18 5.27001C11.0498 4.99807 10.867 4.75463 10.6422 4.5538C10.4173 4.35297 10.1548 4.19874 9.86998 4.10001C10.1314 3.9597 10.3572 3.76128 10.53 3.52001C10.7952 3.15491 10.9291 2.71085 10.91 2.26001C10.935 1.81974 10.8308 1.38175 10.61 1.00001C10.4086 0.667228 10.1027 0.410524 9.73998 0.270013C9.30117 0.0820012 8.82726 -0.0100549 8.34998 1.26837e-05H4.24998C3.68949 0.000264162 3.13483 0.113777 2.6193 0.333735C2.10377 0.553693 1.63801 0.875561 1.24998 1.28001C0.841959 1.68136 0.52482 2.1656 0.319978 2.70001C0.098494 3.27384 -0.0101596 3.88501 -2.20723e-05 4.50001C-0.00842842 5.11487 0.100167 5.72572 0.319978 6.30001C0.532799 6.83326 0.848846 7.31923 1.24998 7.73001C1.64126 8.12948 2.10787 8.44741 2.62281 8.6654C3.13775 8.88339 3.6908 8.99712 4.24998 9.00001H8.46998C8.89389 9.01289 9.31762 8.96917 9.72998 8.87001C10.0625 8.7583 10.3711 8.58532 10.64 8.36001C10.9052 8.13714 11.1055 7.84699 11.22 7.52001C11.3613 7.15347 11.4292 6.76274 11.42 6.37001C11.4311 5.98924 11.3487 5.61155 11.18 5.27001ZM6.26998 1.52001H8.08998C8.41937 1.49565 8.74542 1.59956 8.99998 1.81001C9.11139 1.91013 9.19888 2.034 9.256 2.17247C9.31312 2.31093 9.3384 2.46046 9.32998 2.61001C9.34092 2.80789 9.28837 3.0041 9.17998 3.17001C9.08925 3.33755 8.94975 3.47355 8.77998 3.56001C8.59332 3.65196 8.38805 3.69986 8.17998 3.70001H6.26998V1.52001ZM4.76998 7.44001H4.24998C3.88613 7.44188 3.52563 7.37046 3.18998 7.23001C2.87011 7.08855 2.58637 6.8766 2.35998 6.61001C2.11492 6.33713 1.92781 6.01734 1.80998 5.67001C1.66946 5.29282 1.6016 4.89244 1.60998 4.49001C1.6016 4.08758 1.66946 3.68721 1.80998 3.31001C1.92545 2.96161 2.11283 2.64136 2.35998 2.37001C2.58697 2.10655 2.87075 1.89798 3.18998 1.76001C3.52349 1.61166 3.88497 1.53663 4.24998 1.54001H4.76998V7.44001ZM9.60998 7.00001C9.48688 7.17336 9.31174 7.30297 9.10998 7.37001C8.8756 7.4672 8.62366 7.51487 8.36998 7.51001H6.26998V5.19001H8.33998C8.60376 5.18029 8.8665 5.22806 9.10998 5.33001C9.31085 5.4042 9.48261 5.5409 9.59998 5.72001C9.72688 5.90109 9.79017 6.11913 9.77998 6.34001C9.78887 6.57188 9.72978 6.80129 9.60998 7.00001Z"
                  fill="currentColor"/>
          </svg>
        </Link>
        <div className="flex items-center gap-16">
          <ul className="list-none flex items-center gap-7">
            <li>
              <Link to="/books"
                    className="text-gray-50 font-medium text-xl border-b border-transparent transition-all duration-200 hover:border-current">Books</Link>
            </li>
            <li>
              <Link to="/random-book"
                    className="text-gray-50 font-medium text-xl border-b border-transparent transition-all duration-200 hover:border-current">Random
                book</Link>
            </li>
            <li>
              <Link to="/become-author"
                    className="text-gray-50 font-medium text-xl border-b border-transparent transition-all duration-200 hover:border-current">I`m
                author</Link>
            </li>
          </ul>
          <div className="flex gap-3 items-center">
            {token ? (
              <React.Fragment>
                <Link to="/book/add"
                      className="flex items-center gap-2 bg-emerald-600 border border-emerald-600 text-white rounded-xl block px-3 py-2">
                  <svg className="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <mask id="mask0_2_7" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                      <rect width="24" height="24" fill="#D9D9D9"/>
                    </mask>
                    <g mask="url(#mask0_2_7)">
                      <path
                        d="M4 22C3.45 22 2.97917 21.8042 2.5875 21.4125C2.19583 21.0208 2 20.55 2 20V9C2 8.45 2.19583 7.97917 2.5875 7.5875C2.97917 7.19583 3.45 7 4 7H9V4C9 3.45 9.19583 2.97917 9.5875 2.5875C9.97917 2.19583 10.45 2 11 2H13C13.55 2 14.0208 2.19583 14.4125 2.5875C14.8042 2.97917 15 3.45 15 4V7H20C20.55 7 21.0208 7.19583 21.4125 7.5875C21.8042 7.97917 22 8.45 22 9V20C22 20.55 21.8042 21.0208 21.4125 21.4125C21.0208 21.8042 20.55 22 20 22H4ZM4 20H20V9H15C15 9.55 14.8042 10.0208 14.4125 10.4125C14.0208 10.8042 13.55 11 13 11H11C10.45 11 9.97917 10.8042 9.5875 10.4125C9.19583 10.0208 9 9.55 9 9H4V20ZM6 18H12V17.55C12 17.2667 11.9208 17.0042 11.7625 16.7625C11.6042 16.5208 11.3833 16.3333 11.1 16.2C10.7667 16.05 10.4292 15.9375 10.0875 15.8625C9.74583 15.7875 9.38333 15.75 9 15.75C8.61667 15.75 8.25417 15.7875 7.9125 15.8625C7.57083 15.9375 7.23333 16.05 6.9 16.2C6.61667 16.3333 6.39583 16.5208 6.2375 16.7625C6.07917 17.0042 6 17.2667 6 17.55V18ZM14 16.5H18V15H14V16.5ZM9 15C9.41667 15 9.77083 14.8542 10.0625 14.5625C10.3542 14.2708 10.5 13.9167 10.5 13.5C10.5 13.0833 10.3542 12.7292 10.0625 12.4375C9.77083 12.1458 9.41667 12 9 12C8.58333 12 8.22917 12.1458 7.9375 12.4375C7.64583 12.7292 7.5 13.0833 7.5 13.5C7.5 13.9167 7.64583 14.2708 7.9375 14.5625C8.22917 14.8542 8.58333 15 9 15ZM14 13.5H18V12H14V13.5ZM11 9H13V4H11V9Z"
                        fill="white"/>
                    </g>
                  </svg>
                  <span>Admin page</span>
                </Link>
                <Link to="/profile"
                      className="bg-emerald-600 border border-emerald-600 text-white rounded-xl block px-3 py-2">Profile</Link>
                <button onClick={onLogout}
                        className="bg-none border border-emerald-600 text-white rounded-xl block px-3 py-2">Sign out
                </button>
              </React.Fragment>
            ) : (
              <React.Fragment>
                <Link to="/login"
                      className="bg-emerald-600 border border-emerald-600 text-white rounded-xl block px-3 py-2">Login</Link>
                <Link to="/signup" className="bg-none border border-emerald-600 text-white rounded-xl block px-3 py-2">Create
                  account</Link>
              </React.Fragment>
            )};
          </div>
        </div>
      </nav>
    </header>
  );
}
