<div class="column is-half" id="column-window-project-details">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">{{ $project->get('title') }}</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-project-details', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-project-details', 'window-maximized');"></button>
				<button aria-label="Close" onclick="location.href = '{{ url('/') }}';"></button>
			</div>
		</div>
		<div class="window-body project-details stay-in-viewport">
            <h1>{{ $project->get('title') }}</h1>

            <h2>{{ $project->get('tagline') }}</h2>

            <div class="project-details-description">{!! $project->get('description') !!}</div>

            <img src="{{ asset('img/projects/' . $project->get('preview')) }}" alt="preview"/>

            <div class="project-details-links">
                @foreach (explode("\r\n", $project->get('links')) as $project_link)
                    <div><a href="{{ $project_link }}">{{ $project_link }}</a></div>
                @endforeach
            </div>

            <p><a class="btn btn-fixed-padding" href="{{ url('/') }}">Close</a></p>
		</div>
	</div>
</div>
