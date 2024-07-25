<div class="column is-half" id="column-window-blog-post-submit">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Submit New Post</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-blog-post-submit', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-blog-post-submit', 'window-maximized');"></button>
				<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body blog-post-submit">
			<form method="POST" action="{{ url('/blog/posts/submit') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}"/>

                <div class="blog-post-submit-title is-stretched">
                    <input type="text" name="title" placeholder="Enter a title"/>
                </div>

                <div class="blog-post-submit-content is-stretched">
                    <textarea name="content" placeholder="What's on your mind?"></textarea>
                </div>

                <div class="blog-post-submit-action">
                    <input type="submit" value="Post"/>
                </div>
            </form>
		</div>
	</div>
</div>