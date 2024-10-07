

@php
    $students = DB::table('student')->get();
@endphp
    {{-- <h1>All Students</h1> --}}
    <div class="AB-sb">
        <table class="student-table table table-responsive">
            <thead>
                <tr>
                <th> <input class="form-check-input" type="checkbox" id="select-all-student">
                <label class="form-check-label" for="select-all"></label></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Subject</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                <td>
                    <input class="form-check-input student-checkbox" type="checkbox" value="{{ $student->id }}" id="flexCheckChecked-{{ $student->id }}">
                    <label class="form-check-label" for="flexCheckChecked-{{ $student->id }}"></label>
                </td>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->country }}</td>
                    <td>{{ $student->city }}</td>
                    <td>{{ $student->subject }}</td>
                    <td>
                <div class="dropdown">
                    <button class="dropdown-icon" id="dropdownInquiry">
                        <i class="fa-solid fa-ellipsis-vertical"></i> <!-- You can replace this with any icon -->
                    </button>
                    <ul class="dropdown-action" id="dropdownInq">
                        <li>
                            <a href="{{ route('edit-teacher', $student->id) }}" class="btn btn-sm text-justify">
                            <i class="fa-regular fa-pen-to-square"></i>
                            <span>Edit</span>
                         </a>
                        </li>
                        <li>
                            <form action="{{ route('teachers.destroy', $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm d-flex align-items-center" onclick="return confirm('Are you sure?')" style="color: black; margin-left: -15%;">
                                    <i class="fa-solid fa-trash-can mx-1"></i>
                                    <span>Deleted</span>
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
   
    
