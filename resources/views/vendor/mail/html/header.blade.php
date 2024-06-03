@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://i.ibb.co/ZH7dtw0/Skill-Swap-removebg-preview.png" alt="Skill-Swap-removebg-preview">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
