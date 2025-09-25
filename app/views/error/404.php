<div class="column is-half" id="column-window-error-404">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Error 404</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-error-404', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-error-404', 'window-maximized');"></button>
				<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body">
			<div class="is-centered">
				<p>The requested resource <strong>{{ $_SERVER['REQUEST_URI'] }}</strong> was not found on the server.</p>

				<a class="btn is-half is-pointer" href="{{ url('/') }}">Go home</a>
			</div>
		</div>
	</div>
</div>
