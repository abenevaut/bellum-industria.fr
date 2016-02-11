<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('cvepdb.emails.partials.clip_metadatas')
        <title>Ca va ENCORE parler de bits!</title>
    </head>
    <body>
        @include('cvepdb.emails.partials.clip_header')
        @yield('content')
        @include('cvepdb.emails.partials.clip_footer')
    </body>
</html>