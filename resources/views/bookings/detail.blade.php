<table>
    <tr>
        <td><b>Member</b></td>
        <td>: {{ $booking->user->name }}</td>
    </tr>
    <tr>
        <td><b>Dokter</b></td>
        <td>: {{ $booking->doctor->user->name }}</td>
    </tr>
    <tr>
        <td><b>Tanggal Pemesanan</b></td>
        <td>: {{ $booking->booking_date }}</td>
    </tr>
    <tr>
        <td><b>Waktu Pemesanan</b></td>
        <td>: {{ $booking->booking_time }}</td>
    </tr>
    <tr>
        <td><b>Status</b></td>
        <td>: {{ $booking->status }}</td>
    </tr>
    <tr>
        <td><b>Catatan</b></td>
        <td>: {{ $booking->notes ?? '-' }}</td>
    </tr>
</table>