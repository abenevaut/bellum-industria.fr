<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('emails.partials.metadatas')
        <title>Clip</title>
    </head>
    <body>
        @include('emails.partials.header')
        @yield('content')
        @include('emails.partials.footer')
    </body>
</html>