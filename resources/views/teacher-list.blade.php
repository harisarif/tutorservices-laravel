
@php
    $tutors = DB::table('tutors')->get();
@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="education, online courses, learning, tutoring, e-learning, eduexceledu">
    <meta name="description" content="Teacher list Eduexceledu offers a range of online courses and tutoring services to enhance your learning experience.">
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Icon Button */
        .dropdown-icon {
            border: none;
            padding: 10px;
            background: transparent;
            font-size: 16px;
            cursor: pointer;
        }

        /* Hide dropdown menu by default */
        .dropdown-action {
            display: none;
            position: absolute;
            top: 40px; /* Adjust based on your design */
            left: -7px;
            background-color: white;
            min-width: 100px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Dropdown menu items */
        .dropdown-action li {
            display: block;
            padding: 3px 8px;
            border-bottom: 1px solid #ddd;
        }

        .dropdown-action li a {
            color: black;
            text-decoration: none;
            display: block;
        }

        /* Show dropdown menu when the dropdown is active */
        .dropdown-action.show {
            display: block;
            z-index: 66;
            top: 50px;
            border-radius: 5px;
        }

        /* Hover effect on dropdown items */
        .dropdown-action li:hover {
            background-color: #f1f1f1;
        }
        .dropdown-action li a{
            margin-left: -9%;
        }
            .switch {
            display: inline-block;
            position: relative;
            width: 50px;
            height: 25px;
            border-radius: 20px;
            background: #dfd9ea;
            transition: background 0.28s cubic-bezier(0.4, 0, 0.2, 1);
            vertical-align: middle;
            cursor: pointer;
        }
        .switch::before {
            content: '';
            position: absolute;
            top: 1px;
            left: 2px;
            width: 22px;
            height: 22px;
            background: #fafafa;
            border-radius: 50%;
            transition: left 0.28s cubic-bezier(0.4, 0, 0.2, 1), background 0.28s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .switch:active::before {
            box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(128,128,128,0.1);
        }
        input:checked + .switch {
            background: #72da67;
        }
        input:checked + .switch::before {
            left: 27px;
            background: #fff;
        }
        input:checked + .switch:active::before {
            box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(0,150,136,0.2);
        }
    
        /* The switch - custom styled checkbox */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 20px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc; /* Default color */
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 17px;
            top: 2px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
        }

        /* When the switch is checked, make the slider green */
        input:checked + .slider {
            background-color: #4CAF50; /* Green color when active */
        }

        /* Move the slider circle to the right when checked */
        input:checked + .slider:before {
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        /* Dropdown container */

    </style>

    {{-- <h1>All Teachers</h1> --}}
    <div id="statusMessage" style="display:none;" class="alert alert-success"></div>
    <div class=" AB-sb">
        
        <table class="table teachers-table">
            <thead>
                <tr>
                    <th> <input class="form-check-input" type="checkbox" id="select-all">
                    <label class="form-check-label" for="select-all"></label></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Degree</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>Document</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tutors as $tutor)
                <tr>
                <td>
                    <input class="form-check-input tutor-checkbox" type="checkbox" value="{{ $tutor->id }}" id="flexCheckChecked-{{ $tutor->id }}">
                    <label class="form-check-label" for="flexCheckChecked-{{ $tutor->id }}"></label>
                </td>

                <td>{{ $tutor->id }}</td>
                <td>{{ $tutor->f_name }} {{ $tutor->l_name }}</td>
                <td>{{ $tutor->qualification }}</td>
                <td>{{ $tutor->gender }}</td>
                <td>{{ $tutor->location }}</td>
                <td><a href="{{ url($tutor->document) }}" target="_blank">View PDF Document</a></td>
                <td>{{ $tutor->city }}</td>
                <td>{{ $tutor->email }}</td>
                <!-- <td>{{ $tutor->experience }} {{ $tutor->experience > 1 ? 'years' : 'year' }}</td> -->
                
                <td>{{ $tutor->phone }}</td>
                <!-- Toggle Switch -->
                <td>
                <form action="{{ route('update.tutor.status') }}" method="POST" id="statusForm_{{ $tutor->id }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $tutor->id }}">
                    <input type="hidden" name="status" id="statusInput_{{ $tutor->id }}" value="{{ $tutor->status }}">
                    
                    <!-- Switch -->
                    <label class="switch mb-0 mt-2">
                        <input type="checkbox" id="statusToggle_{{ $tutor->id }}" 
                            {{ $tutor->status === 'active' ? 'checked' : '' }} 
                            onchange="updateStatus({{ $tutor->id }})">
                        <span class="slider round"></span>
                    </label>

                    <button type="submit" style="display:none;"></button> <!-- Optional submit button (hidden) -->
                </form>
                </td>
             
                <td>
                    <div class="dropdown">
                        <button class="dropdown-icon" id="dropdownButton">
                            <i class="fa-solid fa-ellipsis-vertical"></i> <!-- You can replace this with any icon -->
                        </button>
                        <ul class="dropdown-action " id="dropdownMenu">
                            <li>
                                <a href="{{ route('edit-teacher', $tutor->id) }}" class="btn btn-sm text-justify">
                                <i class="fa-regular fa-pen-to-square" style="color: #4e73df;"></i>
                                <span class="mx-1">Edit</span>
                            </a>
                            </li>
                            <li>
                                <form action="{{ route('teachers.destroy', $tutor->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm d-flex align-items-center" onclick="return confirm('Are you sure?')" style="color: black; margin-left: -11%;">
                                        <i class="fa-solid fa-trash-can mx-1" style="color: #e74a3b;"></i>
                                        <span class="mx-1">Delete</span>
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
    <script>
        document.getElementById('dropdownButton').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('show');
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

        // document.getElementById('statusToggle').addEventListener('change', function() {
        //     // Update the hidden input value based on the switch state
        //     const statusInput = document.getElementById('statusInput');
        //     statusInput.value = this.checked ? 'active' : 'inactive';

        //     // Submit the form
        //     document.getElementById('statusForm').submit();
        // });
        // $('form').on('submit', function() {
        //     $(this).find('button[type="submit"]').prop('disabled', true);
        // });
        // function updateStatus(tutorId, status) {
        //     $.ajax({
        //         url: '{{ route('update.tutor.status') }}',
        //         method: 'POST',
        //         data: {
        //             _token: $('meta[name="csrf-token"]').attr('content'), // Retrieve CSRF token
        //             id: tutorId,
        //             status: status ? 'active' : 'inactive'
        //         },
        //         success: function(response) {
        //             $('#statusMessage').text('Status updated successfully!').show();

        //             if (!status && tutorId === {{ auth()->user()->id }}) {
        //                 window.location.href = "{{ route('login') }}";
        //             }

        //             setTimeout(function() {
        //                 $('#statusMessage').fadeOut();
        //             }, 3000);
        //         },
        //         error: function(xhr) {
        //             console.error('Error updating status', xhr.responseText);
        //             $('#statusMessage').text('Error updating status. Please try again.').show();
        //         }
        //     });
        // }
        
        

    </script>
    
