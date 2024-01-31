import React, {useEffect} from "react";
import axiosClient from "../axios-client.js";
import {useStateContext} from "../context/ContextProvider.jsx";
import { useState } from "react";


export default function Login(){
  const emailuidRef = React.useRef<HTMLInputElement>(null)
  const passwordRef = React.useRef<HTMLInputElement>(null)
  const { setUser, setToken } = useStateContext()
  const [message, setMessage] = useState(null)

  const onSubmit = (event: React.FormEvent<Element>) => {
    event.preventDefault();

    const payload = {
      email: emailuidRef.current?.value,
      password:  passwordRef.current?.value,
    }

    axiosClient.post('/login', payload)
      .then(({data}) => {
        setUser(data.user)
        setToken(data.token);
      })
      .catch((err) => {
        const response = err.response;
        if (response && response.status === 422) {
          setMessage(response.data.message)
        }
      })
  }
  useEffect(() => {
    document.title = 'Open Books :: Login';
  }, []);
  return(
    <section className="flex justify-between md:container md:mx-auto mt-32">
      <div>
        <h2 className="text-white text-3xl font-semibold">Log in</h2>
        {message &&
          <div className="alert">
            <p>{message}</p>
          </div>
        }
        <form onSubmit={onSubmit} className="w-96 mt-8 flex flex-col gap-3" method="post">
          <div>
            <input type="text" ref={emailuidRef}
                   className="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('emailuid') is-invalid @enderror"
                   name="emailuid" placeholder="Email or username*" value=""/>
          </div>
          <div>
            <input type="password" ref={passwordRef}
                   className="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('password') is-invalid @enderror"
                   name="password" placeholder="Password*"/>
          </div>
          <button
            className="mt-4 w-full bg-emerald-600 border border-emerald-600 text-white rounded-xl block px-3 py-2">Log
            in
          </button>
        </form>
      </div>
    </section>
  )
}
