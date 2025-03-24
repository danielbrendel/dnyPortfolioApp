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
                    <input type="text" name="title" id="blog-post-title" placeholder="Enter a title"/>
                </div>

                <div class="blog-post-submit-content is-stretched">
                    <textarea name="content" id="blog-post-content" placeholder="What's on your mind?"></textarea>
                </div>

				<div class="blog-post-submit-checkbox field-row">
					<input type="checkbox" name="sharing" id="blog-post-sharing" value="1" onclick="if (this.checked) { document.querySelector('.blog-post-submit-tags').classList.remove('is-hidden'); } else { document.querySelector('.blog-post-submit-tags').classList.add('is-hidden'); }"/>
					<label for="blog-post-sharing">Post on Social Media</label>
				</div>

				<div class="blog-post-submit-tags is-stretched is-hidden">
					<input type="text" name="tags" placeholder="#tag1 #tag2 #tag3 #tag4 etc"/>
				</div>

                <div class="blog-post-submit-action">
                    <input type="submit" value="Post"/>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="previewBlogPost(document.getElementById('blog-post-title').value, document.getElementById('blog-post-content').value, '{{ $token }}');">Preview</a>
                </div>
            </form>
		</div>
	</div>
</div>