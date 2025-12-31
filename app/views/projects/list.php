<div class="column is-half is-hidden" id="column-window-projects">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Project Showcase</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-projects', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-projects', 'window-maximized');"></button>
				<button aria-label="Close" onclick="window.closeWidget('#column-window-projects');"></button>
			</div>
		</div>
		<div class="window-body">
            <strong><i class="fas fa-star color-yellow"></i>&nbsp;Project Showcase</strong>

            <p>Here is a list of my most notable projects.</p>

            <div class="projects sunken-panel sunken-panel-projects">
            @foreach ($projects as $project)
                <a href="{{ url('/projects/view/' . $project->get('slug')) }}">
                    <div class="project" style="background-image: url('{{ asset('img/projects/' . $project->get('preview')) }}');" onmouseover="this.children[0].style.display = 'block';" onmouseout="this.children[0].style.display = 'none';">
                        <div class="project-overlay">
                            <div class="project-info">
                                <div class="project-info-title">{{ $project->get('title') }}</div>
                                <div class="project-info-tagline">{{ $project->get('tagline') }}</div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            </div>

            <p><a class="btn btn-fixed-padding" href="javascript:void(0);" onclick="window.closeWidget('#column-window-projects');">Close</a></p>
		</div>
	</div>
</div>
