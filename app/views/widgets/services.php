@if (env('APP_ENABLE_SERVICES'))
<div class="column is-half is-hidden" id="column-window-services">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Services</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-services', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-services', 'window-maximized');"></button>
				<button aria-label="Close" onclick="window.closeWidget('#column-window-services');"></button>
			</div>
		</div>
		<div class="window-body">
            <div class="sunken-panel sunken-panel-services">
				<table class="interactive">
					<thead>
						<tr>
							<th>Name</th>
                            <th class="is-stretched">Description</th>
                            <th>Host</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody id="services-endpoints"></tobdy>
				</table>
			</div>

            <p>
                <a class="btn btn-fixed-padding" href="javascript:void(0);" onclick="window.fetchEndpointStatuses(this);">Refresh</a>
                <a class="btn btn-fixed-padding" href="javascript:void(0);" onclick="window.closeWidget('#column-window-services');">Close</a>
            </p>
		</div>
	</div>
</div>

<script>
    window.fetchEndpointStatuses = function(caller) {
        caller.innerHTML = "<i class=\'fas fa-spinner fa-spin\'></i>&nbsp;Refresh";
        
        window.queryEndpointStatuses(function() {
            caller.innerHTML = "Refresh";
        }, true);
    };
</script>
@endif
