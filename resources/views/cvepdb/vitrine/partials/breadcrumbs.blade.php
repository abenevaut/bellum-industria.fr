<!-- Begin White Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">
        <div class="alignleft">
            {!! $breadcrumbs or '' !!}
        </div>
        <div class="menu alignright">
            <div id="language_switcher" class="dropdown">
                <script type="text/javascript">
                    function switchLanguage(sel) {
                        var url = sel[sel.selectedIndex].value;
                        window.location = "{{ Request::url() }}/?lang="+url;
                    }
                </script>
                <img alt="{{ Session::get('lang') }}" src="{{ asset('/dist/images/lang/png/'.Session::get('lang').'.png') }}">
                <select name="language_switcher" class="" onchange="switchLanguage(this);">
                    <option value="en" @if ('en' === Session::get('lang'))selected="selected"@endif>en</option>
                    <option value="fr" @if ('fr' === Session::get('lang'))selected="selected"@endif>fr</option>
                </select>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="clear"></div>
    </div>
    <!-- Begin Inner -->
</div>
<!-- End White Wrapper -->