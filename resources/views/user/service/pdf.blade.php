<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
            margin-bottom: 25px;
        }

        .table td,
        .table th {
            border: 1px solid #000000;
            text-align: left;
            font-weight: 400
        }

    </style>

    <title>{{ $title }}</title>
</head>

<body>
    <div style="font-size: 30px; color: '#dddddd'; text-align: center; margin-bottom: 50px;">Daftar Hasil Perbaikan {{ $user->name }}</div>
        <div style="float: left; width: 100%; margin-right: 15px;">
            <div>
            <table class="table">
                <tr>
                    <th><strong>Kendaraan</strong></th>
                    <th><strong>Masalah</strong></th>
                    <th><strong>Status</strong></th>
                </tr>
                @foreach($repairments as $repairment)
                <tr>
                    <td>{{ $repairment->vehicle_name }}</td>
                    <td>{{ $repairment->issue }}</td>
                    <td>{{ $repairment->status }}</td>
                </tr>
                @endforeach
            </table>
            </div>
            
        </div>
    </div>


</body>

</html>