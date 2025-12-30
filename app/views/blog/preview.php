<div class="column is-half" id="column-window-blog-post-view">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">{{ $title }}</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-blog-post-view', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-blog-post-view', 'window-maximized');"></button>
				<button aria-label="Close" onclick="location.href = '{{ url('/') }}';"></button>
			</div>
		</div>
		<div class="window-body blog-post-content">
			<div class="blog-post-content-header">
				<div class="blog-post-content-header-avatar">
					<img src="{{ asset('img/logo.png') }}" alt="avatar"/>
				</div>

				<div class="blog-post-content-header-info">
					<div class="blog-post-content-header-info-author">Posted by {{ env('APP_AUTHOR') }}</div>
					<div class="blog-post-content-header-info-date">Preview of Blog Post</div>
				</div>
			</div>

			<div class="blog-post-content-text">
				@if (env('APP_ALLOW_BLOG_HTML'))
				<pre>{!! $content !!}</pre>
				@else
				<pre>{{ $content }}</pre>
				@endif
			</div>

			<div class="blog-post-content-footer">
				<a href="javascript:void(0);" onclick="window.close();">Close</a>
			</div>
		</div>
	</div>
</div>