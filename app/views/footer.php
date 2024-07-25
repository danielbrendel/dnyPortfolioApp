<div class="column is-half" id="column-window-imprint">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Imprint</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-imprint', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-imprint', 'window-maximized');"></button>
				<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body">
			<div class="is-centered">&copy; {{ date('Y') }} by {{ env('APP_AUTHOR') }}</div>
		</div>
		<div class="status-bar">
			<p class="status-bar-field"><i>Scientia potentia est</i></p>
			<p class="status-bar-field status-bar-field-middle">Visitors: {{ $visitcount }}</p>
			<p class="status-bar-field status-bar-field-right" id="update-current-time"></p>
		</div>
	</div>
</div>