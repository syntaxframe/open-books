import {useEffect} from "react";

export default function SignUp(){
  useEffect(() => {
    document.title = 'Open Books :: Sign up';
  }, []);
  return(
    <section className="flex justify-between md:container md:mx-auto mt-32">
      <div>
        <h2 className="text-white text-3xl font-semibold">Create account</h2>
        <form className="w-96 mt-8 flex flex-col gap-3" method="post">
          <div>
            <input type="text"
                   className="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('username') is-invalid @enderror"
                   name="username" placeholder="Username (unique)" value=""/>
          </div>
          <div>
            <input type="text"
                   className="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('email') is-invalid @enderror"
                   name="email" placeholder="Email*" value=""/>
          </div>
          <div>
            <input type="password"
                   className="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('password') is-invalid @enderror"
                   name="password" placeholder="Password*"/>
          </div>
          <div>
            <input type="password"
                   className="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('password_confirmation') is-invalid @enderror"
                   name="password_confirmation" placeholder="Repeat password*"/>
          </div>
          <div>
            <div className="inline-flex items-center">
              <label className="relative flex items-center p-3 rounded-full cursor-pointer" htmlFor="link">
                <input type="checkbox"
                       className="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-emerald-600 checked:bg-emerald-600 checked:before:bg-emerald-600 hover:before:opacity-10"
                       id="link" name="agreement" />

                <span
                  className="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" className="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                     stroke="currentColor" stroke-width="1">
                  <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
              </span>
              </label>
              <label className="mt-px text-gray-300 cursor-pointer select-none" htmlFor="link">
                <p className="flex font-sans text-base antialiased leading-relaxed text-blue-gray-900">
                  I agree with the
                  <a href="/docks/user-agreements"
                     className="block font-sans text-base antialiased leading-relaxed text-blue-500 transition-colors hover:text-blue-700">
                    &nbsp;terms and conditions
                  </a>
                </p>
              </label>
            </div>
          </div>
          <button
            className="mt-3 w-full bg-emerald-600 border border-emerald-600 text-white rounded-xl block px-3 py-2">Create
            account
          </button>
        </form>
      </div>
    </section>
  )
}
