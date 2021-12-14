<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>PRINT LIST</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body style="background: white">
    <div class="container mt-4">
        <div class="row">
            <div class="col-1 text-center">
                <img src="{{ asset('image/logo/bn.jpg') }}" class="img-fluid rounded-circle" width="110%">
            </div>
            <div class="col-9 my-2 text-center">
                <h5 class="mb-0">Balaogan National High School</h5>
                <small style="font-size: 12px;">Balaogan, Bula, Camarines Sur</small><br>
                <small>Region V</small><br><br>
                <small style="font-size: 14px;"><b>Appointment List</b></small><br>
                <small><b>Date: {{ $dateNow }}</b></small>
            </div>
            <div class="col-1 text-center">
                <img src="{{ asset('image/logo/deped.png') }}" class="img-fluid" width="110%">
            </div>
            <div class="col-1 text-center">
                <img src="{{ asset('image/logo/dept.png') }}" class="img-fluid" width="110%">
            </div>
        </div><br>
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Transaction No</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Address</th>
                    <th scope="col">Purpose</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key =>$item)
                <tr>
                    <td>{{  ++$key }}</td>
                    <td>{{  $item->appoint_no }}</td>
                    <td>{{  $item->fullname }}</td>
                    <td>{{  $item->contact_no }}</td>
                    <td>{{  $item->address }}</td>
                    <td>{{  $item->purpose }}</td>
                    <td>{{  $item->appointee }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>