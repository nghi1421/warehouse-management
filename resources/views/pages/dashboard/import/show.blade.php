<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto ">
        <div class="mb-4 border-b-slate-400 border-b pb-2">
            <h1 class="text-xl text-black uppercase font-bold">Import detail</h1>
        </div>

        <form action="{{ route('imports.update', $import->id) }}" method="POST" class="space-y-6">
            @csrf
            <label for="id" class="block  text-sm font-semibold leading-6 uppercase text-slate-700">Import id: {{ $import->id }}</label>
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
                            <x-bewama::form.input.text name="user_id" type="text" placeholder="Please fill user id" value="{{ $import->user_id }}"></x-bewama::form.input.text>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="block font-semibold text-xs leading-6 uppercase text-slate-600">Name</label>
                        <div class="mt-2">
                            <input type="text" disabled value="{{ $user->name }}" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>  

                    <div class="col-span-2">
                        <label  class="block font-semibold text-xs leading-6 uppercase text-slate-600">Email</label>
                        <div class="mt-2">
                            <input type="text" disabled value="{{ $user->email }}" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>

                     <div class="col-span-1">
                        <label  class="block font-semibold  text-xs leading-6 uppercase text-slate-600">User email</label>
                        <div class="mt-2">
                            <input type="datetime" disabled value="{{ $user->dob }}" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>
                  
                    <div class="col-span-3">
                        <label  class="block font-semibold  text-xs leading-6 uppercase text-slate-600">Address</label>
                        <div class="mt-2">
                            <input type="text" disabled value="{{ $user->address }}" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
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
                            <x-bewama::form.input.text name="customer_id" type="text" placeholder="Please fill customer id" value="{{ $import->customer_id }}"></x-bewama::form.input.text>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="block font-semibold text-xs leading-6 uppercase text-slate-600">Name</label>
                        <div class="mt-2">
                            <input type="text" disabled value="{{ $customer->name }}" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>  

                    <div class="col-span-2">
                        <label  class="block font-semibold text-xs leading-6 uppercase text-slate-600">Email</label>
                        <div class="mt-2">
                            <input type="text" disabled value="{{ $customer->email }}" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>

                     <div class="col-span-1">
                        <label  class="block font-semibold  text-xs leading-6 uppercase text-slate-600">Phone number</label>
                        <div class="mt-2">
                            <input type="text" disabled value="{{ $customer->phone_number }}" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>

                    <div class="col-span-3">
                        <label  class="block font-semibold  text-xs leading-6 uppercase text-slate-600">Address</label>
                        <div class="mt-2">
                            <input type="datetime" disabled value="{{ $customer->address }}" class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border shadow-lg border-slate-500">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-3 uppercase py-3.5 text-left text-xs font-semibold text-gray-900">
                                {{ __('category id') }}
                            </th>
                            <th scope="col" class="px-3 uppercase py-3.5 text-left text-xs font-semibold text-gray-900">
                                {{ __('category name') }}
                            </th>
                            <th scope="col" class="px-3 uppercase py-3.5 text-left text-xs font-semibold text-gray-900">
                                {{ __('category unit') }}
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
                        @empty($importDetails)
                            <tr>
                                <td colspan="{{ 5 }}">
                                    <div class="py-6 text-center">
                                        <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-semibold text-gray-500">{{ __('No record found.') }}</h3>
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach($importDetails as $index => $importDetail)
                                <tr>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $importDetail['category_id'] }}
                                        <input type="text"
                                         hidden 
                                         name="import_details[{{ $index }}][category_id]" 
                                         value="{{ $importDetail['category_id'] }}"/>
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        
                                        {{ $importDetail['catagory_name'] }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $importDetail['category_unit'] }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <input 
                                            name="import_details[{{ $index }}][amount]"
                                            type="number" 
                                            min=1
                                            value="{{ $importDetail['amount'] }}" 
                                            class="pl-2 bg-slate-100 outline-transparent block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                                    </td>
                                    <td>
                                        <span class="btn-delete hover:bg-red-400 hover:text-white inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700 cursor-pointer">{{ 'Delete' }}</span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>

                            </tr>
                        @endempty
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



