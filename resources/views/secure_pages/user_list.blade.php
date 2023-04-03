@extends('layouts.master_admin')

@push('style')
    <link href="{{ asset('assets/vendor/datatables/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h3 class="mt-4">User List</h3>
    <ol class="breadcrumb breadcrumb-link mb-4">
        <li class="breadcrumb-item active">
            <i class="bi bi-grip-vertical"></i><a href="{{ route('secure.users.user-list') }}">User List</a>
        </li>
    </ol>

    <div class="card bg-primary bg-gradient" data-aos="fade-up">
        <div class="card-body outside-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#add_form"><span class="fw-bold small text-uppercase">Add New User</span></a>
                            <button class="btn btn-light btn-sm border-secondary mb-1" id="reload_record"><span class="fw-bold small text-uppercase">Reload</span></button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-3 table-responsive">
                                <table class="table table-bordered" id="tbl_users" width="100%" cellspacing="0">
                                    <thead class="bg-light bg-gradient">
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>User Email</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- add new modal form -->
    <div class="modal fade" id="add_form" tabindex="-1" role="dialog" aria-labelledby="add_Label" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="add_form_user">
                    @csrf
                    <div class="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="add_Label">Add New User</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="a_name" class="col-form-label">Full Name</label>
                                            <input type="text" id="a_name" class="form-control" name="a_name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="a_email" class="col-form-label">E-mail</label>
                                            <input type="text" id="a_email" class="form-control col-lg-3" name="a_email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-primary" id="add_record">Save</button>
                            <button class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ./add new modal form -->

    <!-- edit modal form -->
    <div class="modal fade" id="edit_form" tabindex="-1" role="dialog" aria-labelledby="edit_Label" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="edit_form_ministry">
                    @csrf
                    <input type="hidden" id="e_id" name="e_id">
                    <div class="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="edit_Label">Edit User</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="e_name" class="col-form-label">Full Name</label>
                                            <input type="text" id="e_name" class="form-control" name="e_name" placeholder="e.g: JABATAN PERDANA MENTERI">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="e_email" class="col-form-label">E-mail</label>
                                            <input type="text" id="e_email" class="form-control col-lg-3" name="e_email" placeholder="e.g: JPM">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-primary" id="update_record">Update</button>
                            <button class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ./edit modal form -->
@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('assets/vendor/datatables/datatables.min.js') }}"></script>

    <script type="text/javascript">
    $(function () {
        "use strict";
        
        if ($('table').attr('id') == 'tbl_users') {
            userList();
        }

        $('#reload_record').click(function(){
            userList();
        });

        $(document).on('click', '.ev_update', function() {
            var id = $(this).data('bs-code');

            $.ajax({
                url:"{{ route('secure.users.get-user-data') }}",
                type: 'GET',
                data: {id: id},
                dataType: "json",
                success: function(data) {
                    var res = data.result;

                    $('#e__id').val(res.id);
                    $('#e_name').val(res.name);
                    $('#e_email').val(res.email);
                }
            });
        });

    });

    function userList() {
        if ($.fn.DataTable.isDataTable('#tbl_users')) $('#tbl_users').DataTable().destroy();
            $('#tbl_users tbody').empty();

            $('#tbl_users').DataTable({
                ajax: "{{ route('secure.users.get-users') }}",
                autoWidth:false,
                columnDefs: [
                    {width: '7%', targets: [0], searchable: false, orderable: false},
                    {width: '15%', targets: [2]},
                    {width: '10%', className: 'dt-center', targets: [3], searchable: false, orderable: false}
                ]
            });

            $('#tbl_users').DataTable().on( 'order.dt search.dt', function () {
                $('#tbl_users').DataTable().column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1+'.';
                });
            }).draw();
    }
    </script>

@endpush