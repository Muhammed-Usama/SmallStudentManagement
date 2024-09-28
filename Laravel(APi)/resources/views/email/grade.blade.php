<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Grades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Hello, {{ $studentName }}</h1>
    <p>Here are your grades for the courses you enrolled in:</p>
    <table>
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gradesData as $grade)
                <tr>
                    <td>{{ $grade['course_name'] }}</td>
                    <td>{{ $grade['grade_value'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Best regards,</p>
    <p>Your School Team</p>
</body>

</html>
