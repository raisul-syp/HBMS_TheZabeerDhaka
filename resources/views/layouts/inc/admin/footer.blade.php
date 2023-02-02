@foreach ($settings as $item)
<div class="copyright">
    @if ($item != null && is_object($item))
    <p><strong>{{ $item->name }}</strong> © <span class="copyright-year"></span></p>
    @endif
    <p>Developed  by <a href="https://sypsolutions.com.bd/" target="_blank"><strong>SYP Solutions Ltd.</strong></a></p>
</div>
@endforeach