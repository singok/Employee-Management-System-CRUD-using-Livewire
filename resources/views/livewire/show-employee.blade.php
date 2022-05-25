
<div class="flex flex-col w-full pl-0 md:p-4 md:space-y-4">
    <header class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-16 rounded-2xl z-40">
        <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
            <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                <div class="container relative left-0 z-50 flex w-3/4 h-auto h-full">
                    <div class="relative flex items-center w-full lg:w-64 h-full group">
                        <div class="absolute z-50 flex items-center justify-center block w-auto h-10 p-3 pr-2 text-sm text-gray-500 uppercase cursor-pointer sm:hidden">
                            <svg fill="none" class="relative w-5 h-5" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <svg class="absolute left-0 z-20 hidden w-4 h-4 ml-4 text-gray-500 pointer-events-none fill-current group-hover:text-gray-400 sm:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                            </path>
                        </svg>
                        <input type="text" class="block w-full py-1.5 pl-10 pr-4 leading-normal rounded-2xl focus:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 ring-opacity-90 bg-gray-100 dark:bg-gray-800 text-gray-400 aa-input" placeholder="Search"/>
                            <div class="absolute right-0 hidden h-auto px-2 py-1 mr-2 text-xs text-gray-400 border border-gray-300 rounded-2xl md:block">
                                +
                            </div>
                        </div>
                    </div>
                    <div class="relative p-1 flex items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">
                        <h4>Administrator</h4>
                    </div>
                </div>
            </div>
        </header>
        <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
            

            <div class="alert alert-success fade show alert-dismissible" style="display: none" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>

            <div class="overflow-hidden">
                <table class="min-w-full text-center">
                <thead class="border-b bg-gray-800">
                    <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        #
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        First Name 
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Last Name
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Email Address
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Phone Number
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        City
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        State
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Zip Code
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4" colspan="2">
                        Action
                    </th>
                    </tr>
                </thead class="border-b">
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($data as $info)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $count++ }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $info->fname }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $info->lname }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $info->email }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $info->phone }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $info->city }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $info->state }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $info->zipcode }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <svg wire:click="showEditForm({{$info->id}})" class="h-6 w-6 text-black-500 transition-colors duration-200 hover:text-blue-500 cursor-pointer" width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" /></svg>
                            </td>

                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <svg wire:click="delete({{ $info->id }})" class="h-6 w-6 text-red-500 transition-colors duration-200 hover:text-blue-500 cursor-pointer"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="3" y="4" width="18" height="4" rx="2" />  <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />  <line x1="10" y1="12" x2="14" y2="12" /></svg>
                            </td>


                        </tr class="bg-white border-b">
                    @endforeach
                    
                </tbody>
                
                </table>
            </div>

        </div>


        <!-- Modal -->
        <div class="modal fade" id="updateForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Please update your details !!!</h5>
                  <button type="button" class="close" data-dismiss="modal" id="cross-button">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="firstName" class="col-form-label">First Name:</label>
                      <input type="text" class="form-control" id="firstName" value="{{ $fname }}">
                    </div>
                    <div class="form-group">
                      <label for="lastName" class="col-form-label">Last Name:</label>
                      <input type="text" class="form-control" id="lastName" value="{{ $lname }}">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress" class="col-form-label">Email Address:</label>
                        <input type="text" class="form-control" id="emailAddress" value="{{ $email }}">
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber" class="col-form-label">Phone Number:</label>
                        <input type="text" class="form-control" id="phoneNumber" value="{{ $phone }}">
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-form-label">City:</label>
                        <input type="text" class="form-control" id="city" value="{{ $city }}">
                    </div>
                    <div class="form-group">
                        <label for="state" class="col-form-label">State:</label>
                        <input type="text" class="form-control" id="state" value="{{ $state }}">
                    </div>                    
                    <div class="form-group">
                        <label for="zipCode" class="col-form-label">Zip Code:</label>
                        <input type="text" class="form-control" id="zipCode" value="{{ $zipcode }}">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" style="background: grey" id="close-button">Close</button>
                  <button type="button" class="btn btn-primary" style="background: blue">Update</button>
                </div>
              </div>
            </div>
          </div>


        @push('script')
            <script type="text/javascript">
                $(document).ready(() => {
                    toastr.options = {
                        "progressBar" : true,
                        "positionClass" : "toast-top-right",
                    }
                    
                });
                window.addEventListener('show-success', event=>{
                    toastr.success(event.detail.message);
                });
                window.addEventListener('show-error', event=>{
                    toastr.error(event.detail.message);
                });

                window.addEventListener('show-edit-form', event=> {
                    $('#updateForm').modal('show');
                });

                
                $('#close-button, #cross-button').on('click', function (){
                    $('#updateForm').modal('hide');
                });

        
            </script>
        @endpush
    </div>
