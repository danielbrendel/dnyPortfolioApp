<div class="column is-half" id="column-window-blog-post-view">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">{{ $post->get('title') }}</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-blog-post-view', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-blog-post-view', 'window-maximized');"></button>
				<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body blog-post-content">
			<div class="blog-post-content-header">
				<div class="blog-post-content-header-avatar">
					<img src="{{ asset('img/logo.png') }}" alt="avatar"/>
				</div>

				<div class="blog-post-content-header-info">
					<div class="blog-post-content-header-info-author">Posted by {{ env('APP_AUTHOR') }}</div>
					<div class="blog-post-content-header-info-date">{{ (new Carbon($post->get('created_at')))->diffForHumans() }}</div>
				</div>
			</div>

			<div class="blog-post-content-text">
				<pre>{{ $post->get('content') }}</pre>
			</div>

			<div class="blog-post-content-footer">
				<a href="{{ url('/#blog-list') }}">Go back</a>
			</div>
		</div>
	</div>
</div>