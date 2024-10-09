

@php
    $inquires = DB::table('inquiries')->get();
@endphp
    {{-- <h1>All Students</h1> --}}
    <div class="AB-sb">
        <table class="student-table table table-responsive">
            <thead>
                <tr>
                <th> <input class="form-check-input" type="checkbox" id="select-all-inquiry">
                <label class="form-check-label" for="select-all"></label></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inquires as $inquiry)
                <tr>
                    
                <td>
                    <input class="form-check-input inquiry-checkbox" type="checkbox" value="{{ $inquiry->id }}" id="flexCheckChecked-{{ $inquiry->id }}">
                    <label class="form-check-label" for="flexCheckChecked-{{ $inquiry->id }}"></label>
                </td>
                    <td>{{ $inquiry->id }}</td>
                    <td>{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->phone }}</td>
                    <td>{{ $inquiry->description ?? 'No description' }}</td>
                <td>
                    <div class="dropdown">
                        <button class="dropdown-icon" id="dropdownInquiry">
                            <i class="fa-solid fa-ellipsis-vertical"></i> <!-- You can replace this with any icon -->
                        </button>
                        <ul class="dropdown-action" id="dropdownInq">
                            <li class="d-flex align-items-center" style="border-bottom: 1px solid #ddd;     color: black;">
                            <a href="{{ route('edit-student', $inquiry->id) }}" class="btn btn-sm">
                                <i class="fa-regular fa-pen-to-square" style="color: #4e73df;"></i>
                                <span class="mx-1">Edit</span>
                            </a>
                            </li>
                            <li >
                                    <form action="{{ route('students.destroy', $inquiry->id) }}" method="POST" style="display:inline;">
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        document.getElementById('dropdownInquiry').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('dropdownInq');
            dropdownMenu.classList.toggle('show');
        });
    </script>
