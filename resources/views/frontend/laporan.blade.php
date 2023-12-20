<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penyewaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        .table tbody tr {
            page-break-inside: avoid;
        }
    </style>
</head>
<body>
    <div class="container">
		<center><h2>Laporan Hasil Penyewaan</h2></center>
		<br>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="text-align: center;">Nomor</th>
					<th style="text-align: center;">Nama</th>
					<th style="text-align: center;">Telepon</th>
                    <th style="text-align: center;">Mobil Yang Disewa</th>
                    <th style="text-align: center;">Total Sewa</th>
                    <th style="text-align: center;">Status Pembayaran</th>
				</tr>
			</thead>
			<tbody>
                @foreach ($data['laporan'] as $key => $d)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->telp }}</td>
                        <td>{{ $d->title }}</td>
                        <td>{{ $d->total }}</td>
                        <td>{{ $d->status_pembayaran }}</td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
</body>
</html>
