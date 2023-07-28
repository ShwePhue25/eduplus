<!DOCTYPE html>
<html>

<head>
    <title>Courses Taught by Teacher</title>
</head>

<body>
    <h1>Courses Taught by {{ $teacher->name }}</h1>
    <ul>
        @forelse ($courses as $course)
            <li>{{ $course->name }}</li>
            @empty
                <td>No course found</td>
            @endforelse
        </ul>
    </body>

    </html>
