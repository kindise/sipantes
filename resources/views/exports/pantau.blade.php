<table>
    <thead>
    <tr>
        <th>Nama</th>
        <th>No. Transaksi</th>
        <th>Jenis Kelamin</th>
        <th>TB</th>
        <th>BB</th>
        <th>IMT</th>
        <th>BB Ideal</th>
        <th>Lingkar Perut</th>
        <th>Lingkar Panggul</th>
        <th>Rasio</th>
        <th>TD</th>
        <th>GDP/GDS</th>
    </tr>
    </thead>
    <tbody>
        @foreach($query as $val)
        <tr>
            <td>{{ $val->nama }}</td>
            <td>{{ $val->pantau_id }}</td>
            <td>{{ ($val->jenis_kelamin == 1 ? 'Laki - Laki' : 'Perempuan') }}</td>
            <td>{{ $val->tinggibadan }}</td>
            <td>{{ $val->beratbadan }}</td>
            <td>{{ $val->imt }}</td>
            <td>{{ $val->bbideal }}</td>
            <td>{{ $val->lingkarperut }}</td>
            <td>{{ $val->lingkarpanggul }}</td>
            <td>{{ $val->rasiowh }}</td>
            <td>{{ $val->tekanandarah }}</td>
            <td>{{ $val->gdp }} / {{ $val->gds }}</td>
        </tr>
        @endforeach
    </tbody>
</table>