<div class="column is-half is-hidden" id="column-window-settings">
	<div class="window" onclick="window.setWidgetToTop('#column-window-settings');">
		<div class="title-bar">
			<div class="title-bar-text">Settings</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-settings', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-settings', 'window-maximized');"></button>
				<button aria-label="Close" onclick="window.closeWidget('#column-window-settings');"></button>
			</div>
		</div>
		<div class="window-body">
            <p>Here you can adjust your preferences</p>

            <fieldset>
                <legend>Appearance</legend>
                <div class="field-row">
                    <label>Text color</label>
                    <input id="settings-dialog-style-text-color" type="color" value="#000000" onchange="window.saveSetting('style-text-color', this.value); window.applySettings();"/>
                </div>
                <div class="field-row">
                    <label>Background image</label>
                    <select id="settings-dialog-style-background-image" onchange="window.saveSetting('style-background-image', this.value); window.applySettings();">
                        <option value="none">- None -</option>
                        @if (isset($backgrounds))
                            @foreach ($backgrounds as $background)
                                <option value="{{ $background }}">{{ ucfirst(pathinfo($background, PATHINFO_FILENAME)) }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </fieldset>

            <fieldset>
                <legend>Sound</legend>
                <div class="field-row">
                    <input type="checkbox" id="settings-dialog-sound-enable" onchange="window.saveSetting('sound-enable', ((this.checked) ? '1' : '0')); window.applySettings();">
                    <label for="settings-dialog-sound-enable">Enable sound</label>
                </div>
            </fieldset>

            <p><button onclick="window.resetSettings();">Reset to defaults</button></p>
        </div>
	</div>
</div>