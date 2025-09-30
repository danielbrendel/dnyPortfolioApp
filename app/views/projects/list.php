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

            <p>Here is a list of my most notable projects.</p>

            <div class="projects">
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

            <p><a class="btn btn-fixed-padding" href="{{ url('/') }}">Go Back</a></p>
		</div>
	</div>
</div>

@include('footer.php')