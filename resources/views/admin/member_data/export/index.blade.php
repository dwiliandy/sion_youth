<table>
  <thead>
    <tr>
      <td>Nama Lengkap</td>
      <td>NIK</td>
      <td>Jenis Kelamin</td>
      <td>Tempat Lahir</td>
      <td>Tanggal Lahir</td>
      <td>Baptis</td>
      <td>Sidi</td>
      <td>Nama Keluarga</td>
      <td>Kolom</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($member_datas as $member)
    <tr>
      <td>
        {{ $member->name }}
      </td>
      <td>
        {{ $member->id_number }}
      </td>
      <td>
        @if ($member->sex == 'male')
          L
        @else
          P
        @endif
      </td>
      <td>
        {{ $member->birth_place }}
      </td>
      <td>
        {{ Carbon\Carbon::parse($member->birth_date)->format('d/m/Y') }}
      </td>
      <td>
        @if ($member->baptis == 'already')
          sudah-baptis
        @else
          belum-baptis
        @endif
      </td>
      <td> 
      @if ($member->sidi == 'already')
        sudah-sidi
      @else
        belum-sidi
      @endif
    </td>
      <td>
        {{ $member->family_name }}
      </td>
      <td>
        {{ $member->group }}
      </td>
    </tr>
    @endforeach
  </tbody>

</table>