@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'SPK-Jenis-Pupuk')
<img src="https://gahasapurba.com/images/logo-no-background-spk.png" class="logo" alt="SPK Jenis Pupuk">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
