@if (!\Auth::check())
    <!-- https://github.com/dobarkod/cookie-banner -->
    <script type="text/javascript" id="cookiebanner"
            src="https://cdn.jsdelivr.net/gh/dobarkod/cookie-banner@1.2.1/dist/cookiebanner.min.js"
            data-height="35px"
            data-position="bottom"
            data-message="Nous utilisons des cookies pour amélirer l'experience utilisateur."
            data-linkmsg="En savoir plus"
            data-moreinfo="{{ route('frontend.cgu') }}"
    >
    </script>
@endif
