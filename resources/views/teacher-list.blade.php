
@php
    $tutors = DB::table('tutors')->get();
@endphp
     <style>
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
     </style>
    {{-- <h1>All Teachers</h1> --}}
    <div class=" AB-sb">
        <table class="table teachers-table">
            <thead>
                <tr>
                    <th><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked"></label></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Degree</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Experience</th>
                    <th>Availability</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tutors as $tutor)
                <tr>
                <td>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked-{{ $tutor->id }}" checked>
                    <label class="form-check-label" for="flexCheckChecked-{{ $tutor->id }}"></label>
                </td>
                <td>{{ $tutor->id }}</td>
                <td>{{ $tutor->f_name }} {{ $tutor->l_name }}</td>
                <td>{{ $tutor->qualification }}</td>
                <td>{{ $tutor->gender }}</td>
                <td>{{ $tutor->location }}</td>
                <td>{{ $tutor->city }}</td>
                <td>{{ $tutor->experience }} {{ $tutor->experience > 1 ? 'years' : 'year' }}</td>
                <td>{{ $tutor->availability }}</td>
                <td>{{ $tutor->phone }}</td>
                <!-- Toggle Switch -->
                <td>
                    <input type="checkbox" hidden="hidden" id="toggle-{{ $tutor->id }}">
                    <label class="switch" for="toggle-{{ $tutor->id }}"></label>
                </td>
                <td>
                    <a href="{{ route('edit-teacher', $tutor->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <form action="{{ route('teachers.destroy', $tutor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
    
    
