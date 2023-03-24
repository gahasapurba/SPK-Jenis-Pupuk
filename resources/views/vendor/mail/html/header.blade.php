@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'SPK-Jenis-Pupuk')
<img src="https://www.del.ac.id/wp-content/uploads/2015/06/logox.png" class="logo" alt="Logo SPK Jenis Pupuk">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
