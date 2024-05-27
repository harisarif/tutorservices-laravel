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
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->created_at }}</td>
                <td>{{ $student->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
