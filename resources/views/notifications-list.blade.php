@extends('layouts.admin')
@section('title')
Edexcel Notifications
@endsection


<script src="{{asset('js/js/jquery.min.js')}}"></script>
@section('content')


@if (session('success'))
<div class="alert alert-success" style="z-index: 6;
    padding: 14px !important;">

    {{ session('success') }}
    <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true" style="margin-left: 35%;"></i>
</div>
@endif

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.admin-sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layouts.admin-header')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="tab-content" id="myTabContent">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                        <h1 class="h3 mb-0 text-gray-800">{{ __('Notification') }}</h1>
                        <div class="mt-3">
                            <button type="button" class="btn btn-danger" id="delete-selected">Multiple Delete</button>
                        </div>
                    </div>
                    <div id="statusMessage" style="display:none;" class="alert alert-success"></div>
                    <div class=" AB-sb">

                        <table class="table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all" /></th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                 <th>Phone</th><th>Description</th><th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notifications as $notification)
                            <tr id="notification-row-{{ $notification->id }}">

                                <td><input type="checkbox"  class="notification-checkbox" value="{{ $notification->id }}"  id="flexCheckChecked-{{ $notification->id }}">
                             <label class="form-check-label" for="flexCheckChecked-{{ $notification->id }}"></label></td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $notification->data['name'] ?? 'No name' }}</td> <td>{{ $notification->data['email'] ?? 'No email' }}</td>
                                 <td>{{ $notification->data['phone'] ?? 'No phone' }}</td><td>{{ $notification->data['message'] ?? 'No message' }}</td>
                                <td>
                                  @if ($notification->read_at)
                                        <span class="text-success">
                                            <i class="fa fa-envelope-open" title="Read"></i>
                                        </span>
                                    @else
                                        <span class="text-warning">
                                            <i class="fa fa-envelope" title="Unread"></i>
                                        </span>
                                    @endif

                                </td>
                                <td>
                                
                                        <div class="dropdown">
                                            <button class="btn btn-link border-0 no-caret" type="button" data-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-action dropdown-menu" id="dropdownInq">
                                                <li class="d-flex align-items-center dropdown-item" style="border-bottom: 1px solid #ddd; color: black;">
                                                    <a href="{{ route('notifications.show', $notification->id) }}" class="dropdown-item">
                                                        <i class="fa-regular fa-eye" style="color: #1cc88a;"></i>
                                                        <span class="mx-1">View</span>
                                                    </a>
                                                </li>
                                                <li class="dropdown-item">
                                                   <button type="button"
                                                        class="btn btn-sm single-delete-btn mx-2"
                                                        data-id="{{ $notification->id }}">
                                                        <i class="fa fa-trash me-1" style="color: red;"></i> Delete
                                                    </button>

                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>

                </div>


            </div>
            <!-- /.container-fluid -->

        </div>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded text-white bg-success" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-success" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
$(document).ready(function () {
    // Setup CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Select/Deselect all
    $('#select-all').click(function () {
        $('.notification-checkbox').prop('checked', this.checked);
    });

    // Bulk delete
    $('#delete-selected').click(function () {
        var selected = [];
        $('.notification-checkbox:checked').each(function () {
            selected.push($(this).val());
        });

        if (selected.length === 0) {
            Swal.fire('No Notifications Selected', 'Please select at least one notification to delete.', 'warning');
            return;
        }   

        Swal.fire({
            title: 'Are you sure?',
            text: 'This will permanently delete the selected notifications.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete them!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
    url: "{{ route('notifications.destroy.bulk') }}",
    type: 'POST',
    data: {
        ids: selected,
        _method: 'DELETE',
        _token: $('meta[name="csrf-token"]').attr('content')
    }, 

    success: function (response) {
        selected.forEach(id => {
            $('#notification-row-' + id).remove();
        });
        location.reload();
    },
    error: function (xhr) {
        console.error(xhr.responseText);
        Swal.fire('Error!', 'Something went wrong.', 'error');
    }
});

            }
        });
    });
});
</script> <script>
$(document).ready(function () {
    // Setup CSRF token for AJAX if not already set
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Single delete button click
    $('.single-delete-btn').click(function () {
        var notificationId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: 'This will permanently delete the notification.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/notifications/" + notificationId,  // Adjust URL if needed
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        $('#notification-row-' + notificationId).remove();
                        location.reload();
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });
});
</script>
@endsection
