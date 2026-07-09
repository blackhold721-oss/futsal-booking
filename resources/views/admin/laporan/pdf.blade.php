<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Booking</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size:12px;
        }

        h2{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid black;
        }

        th{
            background:#f3f4f6;
        }

        th, td{
            padding:8px;
        }

    </style>
</head>
<body>

<h2>
    LAPORAN BOOKING LAPANGAN FUTSAL
</h2>

<table>

    <thead>

        <tr>
            <th>No</th>
            <th>User</th>
            <th>Lapangan</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Durasi</th>
            <th>Total</th>
            <th>Status</th>
        </tr>

    </thead>

    <tbody>

    @foreach($bookings as $booking)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $booking->user->name }}</td>

            <td>{{ $booking->lapangan->nama_lapangan }}</td>

            <td>{{ $booking->tanggal_main }}</td>

            <td>
                {{ $booking->jadwal->jam_mulai }}
                -
                {{ $booking->jadwal->jam_selesai }}
            </td>

            <td>{{ $booking->durasi }} Jam</td>

            <td>
                Rp {{ number_format($booking->total_harga,0,',','.') }}
            </td>

            <td>{{ $booking->status_booking }}</td>

        </tr>

    @endforeach

    </tbody>

</table>

</body>
</html>