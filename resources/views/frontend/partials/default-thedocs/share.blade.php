<section>
	<a class="btn btn-lg btn-primary" style="width:60px;height:44px;" href="https://www.facebook.com/sharer.php?u={{ URL::current() }}" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
	<a class="btn btn-lg btn-info" style="width:60px;height:44px;" href="https://twitter.com/share?url={{ URL::current() }}&via={{ substr(config('metadata.twitter_username'), 1, (strlen(config('metadata.twitter_username')) - 1)) }}&text=@yield('tweetable', config('metadata.description'))" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
	<a class="btn btn-lg btn-danger" style="width:60px;height:44px;" href="https://plus.google.com/share?url={{ URL::current() }}" target="_blank" rel="noopener"><i class="fa fa-google-plus"></i></a>
	<a class="btn btn-lg btn-outline btn-purple" style="width:60px;height:44px;" href="mailto:?subject={{ trans('global.share_mail_title') }}&body={{ sprintf(trans('global.share_mail_body'), URL::current()) }}"><i class="fa fa-envelope"></i></a>
</section>
