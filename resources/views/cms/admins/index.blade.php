@extends('cms.parent')

@section('title', 'Admins')
@section('main-title', 'Admins')

@section('content')
    <div class=" space-y-5">
        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Read Admins
                </h4>
            </header>
            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                    <span class=" col-span-8  hidden"></span>
                    <span class="  col-span-4 hidden"></span>
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                <div class="min-w-full">
                                    <table
                                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table dataTable no-footer"
                                        id="DataTables_Table_0">
                                        <thead class=" bg-slate-200 dark:bg-slate-700">
                                            <tr>
                                                <th scope="col" class="table-th sorting sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="
                                Id
                            : activate to sort column descending"
                                                    style="width: 100px;">
                                                    #
                                                </th>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="
                            full name
                            : activate to sort column ascending"
                                                    style="width: 150px;">
                                                    full name
                                                </th>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="
                            email
                            : activate to sort column ascending"
                                                    style="width: 100px;">
                                                    email
                                                </th>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="
                            phone number
                                  : activate to sort column ascending"
                                                    style="width: 150px;">
                                                    phone number
                                                </th>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="
                        phone number
                              : activate to sort column ascending"
                                                    style="width: 150px;">
                                                    Role
                                                </th>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="
                                Action
                            : activate to sort column ascending"
                                                    style="width: 100px;">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                            @foreach ($admins as $admin)
                                                <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                                    <td class="table-td sorting_1">{{ $loop->index + 1 }}</td>
                                                    <td class="table-td ">{{ $admin->full_name }}</td>
                                                    <td class="table-td " style="text-transform: lowercase;">
                                                        {{ $admin->email }}</td>
                                                    <td class="table-td ">{{ $admin->phone_number }}</td>
                                                    <td class="table-td ">{{ $admin->roles[0]->name ?? '-' }}</td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <a class="action-btn"
                                                                href="{{ route('admins.edit', $admin->id) }}">
                                                                <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                            </a>
                                                            <button class="action-btn" type="button"
                                                                onclick="deleteAdmin('{{ route('admins.destroy', $admin->id) }}' , this)">
                                                                <iconify-icon icon="mdi:delete"
                                                                    style="color: white;"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admins.deleted') }}" class="btn inline-flex justify-center btn-dark "
                style="margin-left: 10px;margin-bottom: 10px">
                <span class="flex items-center">
                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ic:baseline-delete"
                        style="color: white;"></iconify-icon>
                    <span>Deleted</span>
                </span>
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function deleteAdmin(route, ref) {
            axios.delete(route)
                .then(function(response) {
                    toastr.success(response.data.message);
                    ref.closest('tr').remove();
                }).catch(function(error) {
                    toastr.error(error.response.data.message);
                });
        }
    </script>
@endsection
