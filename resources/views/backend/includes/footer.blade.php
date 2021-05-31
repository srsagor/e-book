<footer class="c-footer text-muted">
    <div>
        <a href="/">{{getSetting()->app_name}}</a>
        @if(getSetting()->show_copyright)
        @lang('Copyright') &copy; {{ date('Y') }}
        @endif
    </div>
    <div class="ml-auto text-muted">{!! getSetting()->footer_text !!}</div>
</footer>
