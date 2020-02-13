if ('production' === bellumindustria.environment) {
    var disqus_config = function () {
        this.page.url = $('meta[property="og:url"]').attr('content');
        this.page.identifier = $('meta[property="og:url"]').attr('content');
    };
    (function () {
        var d = document, s = d.createElement('script');
        s.src = 'https://www-bellum-industria-fr.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
}
