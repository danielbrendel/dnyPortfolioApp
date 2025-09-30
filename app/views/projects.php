<div class="column is-half" id="column-window-project-showcase">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Project Showcase</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-project-showcase', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-project-showcase', 'window-maximized');"></button>
				<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body">
            <h1><i class="fas fa-star color-yellow"></i>&nbsp;Project Showcase</h1>

            <div class="projects">
            @foreach ($projects as $project)
                <div class="project" style="background-image: url('{{ asset('img/projects/' . $project->get('preview')) }}');" onmouseover="this.children[0].style.display = 'block';" onmouseout="this.children[0].style.display = 'none';">
                    <div class="project-overlay">
                        <div class="project-info">
                            <div class="project-info-title">{{ $project->get('title') }}</div>
                            <div class="project-info-link"><a href="{{ $project->get('link_url') }}">{{ $project->get('link_label') }}</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

            <p><a class="btn btn-fixed-padding" href="{{ url('/#blog-list') }}">Go Back</a></p>
		</div>
	</div>
</div>

@include('footer.php')