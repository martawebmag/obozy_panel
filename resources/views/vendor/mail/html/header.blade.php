@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
    <img src="{{ asset('images/logoFDNT.png') }}" class="logo" alt="Moje Logo">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
