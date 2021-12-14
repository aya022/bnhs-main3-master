<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>PRINT REPORT</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body style="background: white">
    <div class="container">
        <div class="row">
            <div class="col-1 text-center">
                <img src="{{ asset('image/logo/bn.jpg') }}" class="img-fluid rounded-circle" width="110%">
            </div>
            <div class="col-9 my-2 text-center">
                <h5 class="mb-0">Balaogan National High School</h5>
                <small style="font-size: 14px;">Balaogan, Bula, Camarines Sur</small><br>
                <small>Region V</small><br><br>
                <small style="font-size: 16px;"><b>Teacher's Master List</b></small><br>
            </div>
            <div class="col-1 text-center">
                <img src="{{ asset('image/logo/deped.png') }}" class="img-fluid" width="110%">
            </div>
            <div class="col-1 text-center">
                <img src="{{ asset('image/logo/dept.png') }}" class="img-fluid" width="110%">
            </div>
        </div><br>
        {{-- <small>Total Student: {{ $total->mtotal+$total->ftotal }}</small>&nbsp;&nbsp;
        <small>Male: {{ $total->mtotal }}</small>&nbsp;&nbsp;
        <small>Female: {{ $total->ftotal }}</small> --}}
        <table class="table table-bordered table-sm mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Teacher's Name</th>
                    <th>Gender</th>
                    {{-- <th>Date & Time Created</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($dataNow as $key =>$teacher)
                <tr>
                    <td>{{  ++$key }}</td>
                    <td>{{  $teacher->roll_no }}</td>
                    <td>{{  $teacher->teacher_lastname }}, {{  $teacher->teacher_firstname }} {{  $teacher->teacher_middlename[0] }}.</td>
                    <td>{{  $teacher->teacher_gender }}</td>
                    {{-- <td>{{  $teacher->created_at }}</td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>