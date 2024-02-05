import React, {useEffect, useState} from "react";
import axiosClient from "../axios-client.ts";
import Cookies from "js-cookie";

export default function Login() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');


  const handleLogin = async (event : React.MouseEvent<HTMLElement>) => {
    event.preventDefault()
    axiosClient.get('/sanctum/csrf-cookie').then(() => {
      axiosClient.defaults.headers.common['X-XSRF-TOKEN'] = Cookies.get('XSRF-TOKEN');
      axiosClient.post('/api/user/login', {email, password}).then((response) => {
        if(response.data.status === 200) {
          console.log(response.data.text)
        } else {
          console.log(response.data.errors)
        }
      })
    })
  };

  useEffect(() => {
    document.title = 'Open Books :: Login';
  }, []);

  return(
    <section className="flex justify-between md:container md:mx-auto mt-32">
      <div>
        <h2 className="text-white text-3xl font-semibold">Log in</h2>

        <form className="w-96 mt-8 flex flex-col gap-3" method="post">
          <div>
            <input type="text" value={email} onChange={(e) => setEmail(e.target.value)}
                   className="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('emailuid') is-invalid @enderror"
                   name="emailuid" placeholder="Email or username*"/>
          </div>
          <div>
            <input type="password" onChange={(e) => setPassword(e.target.value)}
                   className="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('password') is-invalid @enderror"
                   name="password" placeholder="Password*"/>
          </div>
          <button onClick={handleLogin}
            className="mt-4 w-full bg-emerald-600 border border-emerald-600 text-white rounded-xl block px-3 py-2">Log
            in
          </button>
        </form>
      </div>
    </section>
  )
}
