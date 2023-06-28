<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto ">
        <div class="mb-4 border-b-slate-400 border-b pb-2">
            <h1 class="text-xl text-black uppercase font-bold">Create new import</h1>
        </div>

        <form action="{{ route('imports.store') }}" method="POST" class="space-y-6">
            @csrf
            <label for="id" class="block  text-sm font-semibold leading-6 uppercase text-slate-700"></label>
            <div class="grid gap-4 grid-cols-6">
                <div class="col-span-3 grid grid-cols-3 gap-2 bg-white p-4 pb-6 rounded-lg shadow-lg border-slate-500">
                    <div class="col-span-3 border-b-slate-400 border-b pb-2">
                        <p class="text-sm w-full text-center font-semibold text-slate-600 uppercase">
                            user information
                        </p>
                    </div>
                    <div class="col-span-1">
                        <label for="user_id" class="block font-semibold text-xs leading-6 uppercase text-slate-600">User id</label>
                        <div class="mt-2">
                            <x-bewama::form.input.text name="user_id" type="text" placeholder="Please fill user id" value=""></x-bewama::form.input.text>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="block font-semibold text-xs leading-6 uppercase text-slate-600">Name</label>
                        <div class="mt-2">
                            <input type="text" disabled value="" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>  

                    <div class="col-span-2">
                        <label  class="block font-semibold text-xs leading-6 uppercase text-slate-600">Email</label>
                        <div class="mt-2">
                            <input type="text" disabled value="" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>

                     <div class="col-span-1">
                        <label  class="block font-semibold  text-xs leading-6 uppercase text-slate-600">User email</label>
                        <div class="mt-2">
                            <input type="datetime" disabled value="" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>
                  
                    <div class="col-span-3">
                        <label  class="block font-semibold  text-xs leading-6 uppercase text-slate-600">Address</label>
                        <div class="mt-2">
                            <input type="text" disabled value="" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>
                </div>

                <div class="col-span-3 grid grid-cols-3 gap-2 bg-white p-4 pb-6 rounded-lg shadow-lg border-slate-500">
                    <div class="col-span-3 border-b-slate-400 border-b pb-2">
                        <p class="text-sm w-full text-center font-semibold text-slate-600 uppercase">
                            Customer information
                        </p>
                    </div>
                    <div class="col-span-1">
                        <label for="user_id" class="block font-semibold text-xs leading-6 uppercase text-slate-600">Cusomter id</label>
                        <div class="mt-2">
                            <x-bewama::form.input.text name="customer_id" type="text" placeholder="Please fill customer id" value=""></x-bewama::form.input.text>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="block font-semibold text-xs leading-6 uppercase text-slate-600">Name</label>
                        <div class="mt-2">
                            <input type="text" disabled value="" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>  

                    <div class="col-span-2">
                        <label  class="block font-semibold text-xs leading-6 uppercase text-slate-600">Email</label>
                        <div class="mt-2">
                            <input type="text" disabled value="" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>

                     <div class="col-span-1">
                        <label  class="block font-semibold  text-xs leading-6 uppercase text-slate-600">Phone number</label>
                        <div class="mt-2">
                            <input type="text" disabled value="" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>

                    <div class="col-span-3">
                        <label  class="block font-semibold  text-xs leading-6 uppercase text-slate-600">Address</label>
                        <div class="mt-2">
                            <input type="datetime" disabled value="" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border shadow-lg border-slate-500">
                <table id="imports_detail_table" class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-3 uppercase py-3.5 text-left text-xs font-semibold text-gray-900">
                                {{ __('category name') }}
                            </th>
                            <th scope="col" class="px-3 uppercase py-3.5 text-left text-xs font-semibold text-gray-900">
                                {{ __('amount') }}
                            </th>
                             <th scope="col" class="px-3 uppercase py-3.5 text-left text-xs font-semibold text-gray-900">
                                {{ __('action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-body bg-white divide-y divide-gray-200">
                            <tr id="category-0">
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <select name="categories[]" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }} ({{ $category->unit }})
                                            </option>
                                        @endforeach
                                    </select>
                                 
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <input 
                                        type="number" 
                                        min=1
                                        value=1
                                        class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                                </td>
                                <td>
                                    <span class="btn-delete hover:bg-red-400 hover:text-white inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700 cursor-pointer">{{ 'Delete' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" >
                                    <button type="button" class="flex items-center justify-center w-full p-4 mx-0 btn-add-import-detail hover:text-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 me-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Add new import detail
                                    </button>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="w-full flex flex-row-reverse">
                <a href={{ route('imports.index') }} class="bg-red-500 p-2 rounded-lg !text-white hover:bg-red-600">
                    Return import table
                </a>
                <div class="mr-4">
                    <button type="submit" class="bg-green-500 p-2 rounded-lg !text-white hover:bg-green-600">
                        Save changes
                    </button>
                </div>          
            </div>  
        </form>
    </div>
</x-app-layout> 



