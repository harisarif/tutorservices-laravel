@extends('layouts.admin')
@section('title')
   Edexcel Teachers
@endsection 

<style>
    .dropdownMenu {
        min-width: 150px;
        display: none;
    }
</style>
<script src="{{asset('js/js/jquery.min.js')}}"></script>

@section('content')
@if (session('success'))
<div class="alert alert-success" style="z-index: 6;
    padding: 14px !important;">

    {{ session('success') }}
    <i class="fa fa-times" id="cross" onclick="cancel()" aria-hidden="true" style="margin-left: 35%;"></i>
</div>
@endif
@section('content')

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
                    <div class="tab-content mt-4" id="myTabContent">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 SB">
                            <h1 class="h3 mb-0 text-gray-800">{{ __('Teachers List') }}</h1>
                            <div class="del-button d-flex">
                                <div class="mt-3">
                                    <button type="button" class="btn btn-danger" id="delete-selected">Multiple Delete</button>
                                </div>
                                <form method="GET" action="{{ route('all.tutors') }}">
                                    <div style="display:grid;margin-left:10px;margin-top:-7px;">
                                        <label class="mb-0">Search By Country</label>
                                        <select name="countryTeacher" id="countryTeacher" class="form-select select2 country-select w-50" onchange="this.form.submit()">
                                            @foreach ($countries as $key => $country)
                                            <option value="{{ $key }}" {{ request('countryTeacher', 'AF') == $key ? 'selected' : '' }}>
                                                {{ $country }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div id="statusMessage" style="display:none;" class="alert alert-success"></div>
                        <div class=" AB-sb">

                            <table class="table teachers-table border">
                                <thead>
                                    <tr>
                                        <th class="border"> <input class="form-check-input" type="checkbox" id="select-all" style="margin-left: -1px;">
                                            <label class="form-check-label" for="select-all" style="margin-bottom:1.5rem !important;margin-left:10px;"></label>
                                        </th>
                                        <th class="border">ID</th>
                                        <th class="border">Name</th>
                                        <th class="border">Degree</th>
                                        <th class="border">Gender</th>
                                        <th class="border">Country</th>
                                        <th class="border">Document</th>
                                        <th class="border">Email</th>
                                        <th class="border">Phone</th>
                                        <th class="border">Status</th>
                                        <th class="border">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($tutors as $tutor)
                                    <tr id="tutor-row-{{ $tutor->id }}">
                                        <td class="border">
                                            <input style="margin-left:-1px;" class="form-check-input tutor-checkbox" type="checkbox" value="{{ $tutor->id }}" id="flexCheckChecked-{{ $tutor->id }}">
                                            <label class="form-check-label" for="flexCheckChecked-{{ $tutor->id }}"></label>
                                        </td>
                                        <td class="border">{{ $tutor->id }}</td>
                                        <td class="border">{{ $tutor->f_name }} {{ $tutor->l_name }}</td>
                                        <td class="border">{{ $tutor->qualification }}</td>
                                        <td class="border">{{ $tutor->gender }}</td>
                                        <td class="border">{{ $tutor->country }}</td>
                                        <td class="border">
                                            <a href="{{ url($tutor->document) }}" target="_blank">View PDF Document</a>
                                        </td>
                                        <td class="border">{{ $tutor->email }}</td>
                                        <td class="border">{{ $tutor->phone }}</td>
                                        <td class="border">
                                            <form action="{{ route('update.tutor.status') }}" method="POST" id="statusForm_{{ $tutor->id }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $tutor->id }}">
                                                <input type="hidden" name="status" id="statusInput_{{ $tutor->id }}" value="{{ $tutor->status }}">
                                                <label class="switch mb-0 mt-2">
                                                    <input type="checkbox" id="statusToggle_{{ $tutor->id }}"
                                                        {{ $tutor->status === 'active' ? 'checked' : '' }}
                                                        onchange="updateStatus({{ $tutor->id }})">
                                                    <span class="slider round"></span>
                                                </label>
                                                <button type="submit" style="display:none;"></button>
                                            </form>
                                        </td>
                                        <td class="border">
                                            <div class="dropdown">
                                                <button class="dropdown-icon dropdownButton">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-action dropdownMenu">
                                                    <li>
                                                        <a href="{{ route('view-teacher', $tutor->id) }}" class="btn btn-sm text-justify">
                                                            <i class="fa fa-eye" style="color: #4e73df;"></i>
                                                            <span class="mx-1">View</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('edit-teacher', $tutor->id) }}" class="btn btn-sm text-justify">
                                                            <i class="fa fa-edit" style="color: #4e73df;"></i>
                                                            <span class="mx-1">Edit</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('teachers.destroy', $tutor->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger delete-student-btn me-0 pe-0 ps-3" onclick="return confirm('Are you sure?')" style="color: black; margin-left: -11%;">
                                                                <i class="fa fa-trash mx-1" style="color: #e74a3b;"></i>
                                                                Delete
                                                            </button>
                                                        </form>
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
        document.querySelectorAll('.dropdownButton').forEach(button => {
            button.addEventListener('click', function (e) {
                e.stopPropagation();
                const menu = this.nextElementSibling;
                // Close all open dropdowns first
                document.querySelectorAll('.dropdownMenu').forEach(m => {
                    if (m !== menu) m.style.display = 'none';
                });
                // Toggle current one
                menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function () {
            document.querySelectorAll('.dropdownMenu').forEach(menu => {
                menu.style.display = 'none';
            });
        });
    
    $(document).ready(function() {
        // Select/Deselect All Tutors
        $('#select-all').click(function() {
            $('.tutor-checkbox').prop('checked', this.checked);
        });

        // Delete selected tutors
        $('#delete-selected').click(function() {
            var selected = [];

            $('.tutor-checkbox:checked').each(function() {
                selected.push($(this).val());
            });

            if (selected.length === 0) {
                Swal.fire('No Tutors Selected', 'Please select at least one tutor to delete.', 'warning');
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: 'This will permanently delete the selected tutors.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete them!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('teachers.destroy.bulk') }}", // Ensure this route exists in web.php
                        type: 'DELETE',
                        data: {
                            ids: selected,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            selected.forEach(id => $('#tutor-row-' + id).remove());
                            Swal.fire('Deleted!', 'Selected tutors have been deleted.', 'success');
                        },
                        error: function() {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
<script> $(document).ready(function () {
    // When the "Select All" checkbox in the header is clicked
    $('#select-all-tutors').on('change', function () {
        // Toggle all tutor row checkboxes based on header checkbox
        $('.tutor-checkbox').not('#select-all-tutors').prop('checked', this.checked);
    });

    // When any individual tutor checkbox is changed
    $('.tutor-checkbox').not('#select-all-tutors').on('change', function () {
        let totalCheckboxes = $('.tutor-checkbox').not('#select-all-tutors').length;
        let totalChecked = $('.tutor-checkbox:checked').not('#select-all-tutors').length;

        // If all tutor checkboxes are checked, check the header checkbox
        $('#select-all-tutors').prop('checked', totalCheckboxes === totalChecked);
    });
});

    document.querySelectorAll(".dropdownButton").forEach((button) => {
        button.addEventListener("click", (event) => {
            // Find the nearest dropdown menu relative to the clicked button
            const dropdownMenu = event.target.nextElementSibling;

            if (dropdownMenu && dropdownMenu.classList.contains("dropdownMenu")) {
                dropdownMenu.classList.toggle("show");
            }
        });
    });

    function updateStatus(tutorId) {
        let statusToggle = document.getElementById(`statusToggle_${tutorId}`);
        let statusInput = document.getElementById(`statusInput_${tutorId}`);
        let form = document.getElementById(`statusForm_${tutorId}`);

        // Update the hidden status input based on the checkbox state
        statusInput.value = statusToggle.checked ? 'active' : 'inactive';

        // Submit the form
        form.submit();
    }

    $('#countryTeacher').on('change', function() {

        var country_id = $(this).val(); // Get the selected country ID

        // Make an AJAX request to find tutors based on the selected country
        $.ajax({
            url: '/find-tutors', // Your route for finding tutors
            type: 'GET', // HTTP method (can be POST if needed)
            data: {
                country_id: country_id
            }, // Send selected country ID
            success: function(response) {
                // Handle the response, e.g., display the tutors on the page
                console.log('sadsads', response);
                // You can dynamically update the DOM with the returned data here
                $('.teachers-table tbody').html(response.html);
            },
            error: function(xhr) {
                console.log('Error:', xhr);
            }
        });
    });
    $(document).ready(function() {

        $('.notification-dropdown').on('click', 'li', function() {
            var notificationId = $(this).data('id');
            var isRead = $(this).hasClass('read');

            $.ajax({
                url: "{{ route('mark.notifications.read') }}", // Define this route in your web.php
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    notification_id: notificationId,
                    read: !isRead
                },
                success: function(response) {
                    // Update the notification style based on the new read status
                    if (response.status === 'success') {
                        if (isRead) {
                            $(this).removeClass('read').addClass('unread');
                            updateNotificationCount(1); // Increment the count for unread
                        } else {
                            $(this).removeClass('unread').addClass('read');
                            updateNotificationCount(-1); // Decrement the count for read
                        }
                    }
                }.bind(this) // Bind `this` to refer to the clicked notification item
            });
        });

        function updateNotificationCount(change) {
            var countElement = $('#notificationCount');
            var currentCount = parseInt(countElement.text());
            countElement.text(currentCount + change);
        }
    });

    function cancel() {
        $('.alert').addClass('d-none')
    }
    $(document).on('select2:open', function(e) {
        let scrollPos = $(window).scrollTop();
        setTimeout(function() {
            $(window).scrollTop(scrollPos);
        }, 0);
    });
</script>
@endsection

