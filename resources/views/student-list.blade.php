<style>
    /* CSS for table styling */
    table {
        border-collapse: collapse; /* Collapse borders */
        width: 100%; /* Full width */
    }
    th, td {
        border: 1px solid #dddddd; /* Add borders to cells */
        padding: 8px; /* Add padding */
        text-align: left; /* Align text to the left */
    }
    th {
        background-color: #f2f2f2; /* Background color for header */
    }
</style>

@php
    $students = DB::table('student')->get();
@endphp
    {{-- <h1>All Students</h1> --}}
    <table class="student-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Class Start Time</th>
                <th>Class End Time</th>
                <th>Country</th>
                <th>City</th>
                <th>Subject</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->class_start_time }}</td>
                <td>{{ $student->class_end_time }}</td>
                <td>{{ $student->country }}</td>
                <td>{{ $student->city }}</td>
                <td>{{ $student->subject }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
