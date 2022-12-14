@php 
$color = '';
@endphp
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
            @if($val->usia >= 20 && $val->usia <= 29)
                @if($val->jenis_kelamin == 1)
                    @if($val->rasiowh < 0.82)
                    @php
                        $color = 'green';
                    @endphp
                    @elseif($val->rasiowh >= 0.82 && $val->rasiowh <= 0.88)
                    @php
                        $color = 'yellow';
                    @endphp
                    @elseif($val->rasiowh >= 0.89 && $val->rasiowh <= 0.94)
                    @php
                        $color = 'orange';
                    @endphp
                    @else
                    @php
                        $color = 'red';
                    @endphp
                    @endif
                @else
                    @if($val->rasiowh < 0.71)
                    @php
                        $color = 'green';
                    @endphp
                    @elseif($val->rasiowh >= 0.71 && $val->rasiowh <= 0.77)
                    @php
                        $color = 'yellow';
                    @endphp
                    @elseif($val->rasiowh >= 0.78 && $val->rasiowh <= 0.83)
                    @php
                        $color = 'orange';
                    @endphp
                    @endphp    
                    @else
                    @php
                        $color = 'red';
                    @endphp
                    @endif
                @endif
            @elseif($val->usia >= 30 && $val->usia <= 39)
                @if($val->jenis_kelamin == 1)
                    @if($val->rasiowh < 0.85)
                    @php
                        $color = 'green';
                    @endphp
                    @elseif($val->rasiowh >= 0.85 && $val->rasiowh <= 0.91)
                    @php
                        $color = 'yellow';
                    @endphp
                    @elseif($val->rasiowh >= 0.92 && $val->rasiowh <= 0.97)
                    @php
                        $color = 'orange';
                    @endphp
                    @else
                    @php
                        $color = 'red';
                    @endphp
                    @endif
                @else
                    @if($val->rasiowh < 0.73)
                    @php
                        $color = 'green';
                    @endphp
                    @elseif($val->rasiowh >= 0.73 && $val->rasiowh <= 0.79)
                    @php
                        $color = 'yellow';
                    @endphp
                    @elseif($val->rasiowh >= 0.80 && $val->rasiowh <= 0.86)
                    @php
                        $color = 'orange';
                    @endphp
                    @else
                    @php
                        $color = 'red';
                    @endphp
                    @endif
                @endif
            @elseif($val->usia >= 40 && $val->usia <= 49)
                @if($val->jenis_kelamin == 1)
                    @if($val->rasiowh < 0.88)
                    @php
                        $color = 'green';
                    @endphp
                    @elseif($val->rasiowh >= 0.88 && $val->rasiowh <= 0.94)
                    @php
                        $color = 'yellow';
                    @endphp
                    @elseif($val->rasiowh >= 0.95 && $val->rasiowh <= 1.00)
                    @php
                        $color = 'orange';
                    @endphp
                    @else
                    @php
                        $color = 'red';
                    @endphp
                    @endif
                @else
                    @if($val->rasiowh < 0.75)
                    @php
                        $color = 'green';
                    @endphp
                    @elseif($val->rasiowh >= 0.75 && $val->rasiowh <= 0.81)
                    @php
                        $color = 'yellow';
                    @endphp
                    @elseif($val->rasiowh >= 0.82 && $val->rasiowh <= 0.88)
                    @php
                        $color = 'orange';
                    @endphp
                    @else
                    @php
                        $color = 'red';
                    @endphp
                    @endif
                @endif
            @elseif($val->usia >= 50 && $val->usia <= 59)
                @if($val->jenis_kelamin == 1)
                    @if($val->rasiowh < 0.90)
                    @php
                        $color = 'green';
                    @endphp
                    @elseif($val->rasiowh >= 0.90 && $val->rasiowh <= 0.96)
                    @php
                        $color = 'yellow';
                    @endphp
                    @elseif($val->rasiowh >= 0.97 && $val->rasiowh <= 1.02)
                    @php
                        $color = 'orange';
                    @endphp
                    @else
                    @php
                        $color = 'red';
                    @endphp
                    @endif
                @else
                    @if($val->rasiowh < 0.77)
                    @php
                        $color = 'green';
                    @endphp
                    @elseif($val->rasiowh >= 0.77 && $val->rasiowh <= 0.83)
                    @php
                        $color = 'yellow';
                    @endphp
                    @elseif($val->rasiowh >= 0.84 && $val->rasiowh <= 0.90)
                    @php
                        $color = 'orange';
                    @endphp
                    @else
                    @php
                        $color = 'red';
                    @endphp
                    @endif
                @endif
            @elseif($val->usia >= 60 && $val->usia <= 69)
                @if($val->jenis_kelamin == 1)
                    @if($val->rasiowh < 0.92)
                    @php
                        $color = 'green';
                    @endphp
                    @elseif($val->rasiowh >= 0.92 && $val->rasiowh <= 0.98)
                    @php
                        $color = 'yellow';
                    @endphp
                    @elseif($val->rasiowh >= 0.99 && $val->rasiowh <= 1.04)
                    @php
                        $color = 'orange';
                    @endphp
                    @else
                    @php
                        $color = 'red';
                    @endphp
                    @endif
                @else
                    @if($val->rasiowh < 0.79)
                    @php
                        $color = 'green';
                    @endphp
                    @elseif($val->rasiowh >= 0.79 && $val->rasiowh <= 0.85)
                    @php
                        $color = 'yellow';
                    @endphp
                    @elseif($val->rasiowh >= 0.86 && $val->rasiowh <= 0.92)
                    @php
                        $color = 'orange';
                    @endphp
                    @else
                    @php
                        $color = 'red';
                    @endphp
                    @endif
                @endif
            @endif
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
            <td style="color: {{ $color }};">{{ $val->rasiowh }}</td>
            <td>{{ $val->tekanandarah }}</td>
            <td>{{ $val->gdp }} / {{ $val->gds }}</td>
        </tr>
        @endforeach
    </tbody>
</table>