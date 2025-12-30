<div class="column is-half is-hidden" id="column-window-blog">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Blog</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-blog', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-blog', 'window-maximized');"></button>
				<button aria-label="Close" onclick="window.closeWidget('#column-window-blog');"></button>
			</div>
		</div>
		<div class="window-body">
            <p><i class="far fa-list-alt"></i>&nbsp;List of my personal blog postings.</p>

            <div class="sunken-panel sunken-panel-blog ">
				<table class="interactive">
					<thead>
						<tr>
							<th class="is-stretched">Title</th>
							<th>Published</th>
						</tr>
					</thead>
					<tbody id="blog-posts" data-limit="0"></tobdy>
				</table>
			</div>

			<p class="has-spacing-sm"><i class="fas fa-chart-line"></i>&nbsp;Popular blog posts</p>

            <div class="sunken-panel sunken-panel-blog ">
				<table class="interactive">
					<thead>
						<tr>
							<th class="is-stretched">Title</th>
							<th>Published</th>
						</tr>
					</thead>
					<tbody id="popular-posts" data-limit="5"></tobdy>
				</table>
			</div>

			<p><a class="btn btn-fixed-padding" href="javascript:void(0);" onclick="window.closeWidget('#column-window-blog');">Close</a></p>
		</div>
	</div>
</div>
