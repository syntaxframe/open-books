export default function CreateBook(){
  return(
    <section className="px-10 md:mx-auto mt-12">
      <h2 className="text-3xl font-semibold text-gray-50">Create book</h2>
      <div className="">
        <form action="/createBook" className="w-96 mt-8 flex flex-col gap-3" method="post">
          <div>
            <input type="text"
                   className="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('name') is-invalid @enderror"
                   name="name" placeholder="Name of book*" value="{{ old('name') }}"/>
          </div>
          <div>
          <textarea className="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('description') is-invalid @enderror"
                    name="description" placeholder="Description">
          </textarea>
          </div>
          <div>

          </div>
          <button
            className="mt-4 w-full bg-emerald-500 border border-emerald-500 text-white rounded-xl block px-3 py-2">Log
            in
          </button>
        </form>
      </div>
    </section>
  )
}
