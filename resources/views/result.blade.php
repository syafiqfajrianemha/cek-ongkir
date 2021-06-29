<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Result</title>
</head>

<body>
    <div class="container">
        <div class="my-5 shadow card">
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td>Dari</td>
                        <td>:</td>
                        <td>{{ $origin['city_name'] }}, Kab. {{ $origin['city_name'] }}</td>
                    </tr>
                    <tr>
                        <td>Tujuan</td>
                        <td>:</td>
                        <td>{{ $destination['city_name'] }}, Kab. {{ $destination['city_name'] }}</td>
                    </tr>
                    <tr>
                        <td>Berat (g)</td>
                        <td>:</td>
                        <td>{{ $berat }}</td>
                    </tr>
                    <tr>
                        <td>Kurir</td>
                        <td>:</td>
                        <td>{{ $namaKurir }}</td>
                    </tr>
                </table>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Layanan</th>
                            <th scope="col">Biaya</th>
                            <th scope="col">ETD (Estimates Days)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $cost)
                        <tr>
                            <td>{{ $cost['description'] }}</td>
                            <td>Rp. {{ number_format($cost['biaya'], 0, '.', '.') }}</td>
                            <td>{{ $cost['etd'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('home') }}" class="btn btn-success">👈 Kembali</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>
