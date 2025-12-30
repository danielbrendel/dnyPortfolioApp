@if (env('APP_ENABLE_SHOUTBOX'))
<div class="column is-half is-hidden" id="column-window-shoutbox">
	<div class="window" onclick="window.setWidgetToTop('#column-window-shoutbox');">
		<div class="title-bar">
			<div class="title-bar-text">Shoutbox</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-shoutbox', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-shoutbox', 'window-maximized');"></button>
				<button aria-label="Close" onclick="window.closeWidget('#column-window-shoutbox');"></button>
			</div>
		</div>
		<div class="window-body">
			<div class="sunken-panel sunken-panel-shoutbox">
				<table class="interactive">
					<thead>
						<tr>
							<th>Username</th>
							<th class="is-stretched">Message</th>
						</tr>
					</thead>
					<tbody id="shoutbox-messages">
						@foreach ($shouts as $shout)
							<tr>
								<td>{{ $shout->get('username') }}</td>
								<td>{{ $shout->get('message') }}</td>
							</tr>
						@endforeach
					</tobdy>
				</table>
			</div>

			<p><a class="btn btn-fixed-padding" href="javascript:void(0);" onclick="clearInterval(window.shoutboxInterval); this.parentNode.remove();">Stop updates</a></p>
		</div>
	</div>
</div>
@endif