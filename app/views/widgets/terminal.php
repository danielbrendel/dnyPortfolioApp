@if (env('APP_ENABLE_TERMINAL'))
<div class="column is-half is-hidden" id="column-window-terminal">
	<div class="window window-terminal" onclick="window.setWidgetToTop('#column-window-terminal');">
		<div class="title-bar">
			<div class="title-bar-text">Terminal</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-terminal', 'window-minimized');"></button>
				<button aria-label="Close" onclick="window.closeWidget('#column-window-terminal');"></button>
			</div>
		</div>
		<div class="window-body">
			<div class="sunken-panel sunken-panel-terminal" id="terminal-code-result"></div>

			<input type="text" name="prompt" value="" onkeydown="if (event.key === 'Enter') { window.runCode(this.value, '#terminal-code-result'); this.value = ''; }"/>
		</div>
	</div>
</div>
@endif