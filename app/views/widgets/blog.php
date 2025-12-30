@if (env('APP_ENABLE_BLOG'))
	@include('blog/list.php')
@endif