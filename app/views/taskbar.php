<div class="taskbar" id="taskbar">
    <div class="window">
        <div class="window-body taskbar-body">
            <div class="taskbar-section-apps">
                <button class="startmenu" onclick="window.toggleStartMenu();"><img src="{{ asset('img/icons/windows.png') }}" alt="icon"/>&nbsp;<strong>Start</strong></button>
            </div>

            <div class="taskbar-section-status status-bar">
                <div class="status-bar-label is-inline-block is-mobile-hidden"><i>{{ env('APP_SLOGAN') }}</i></div>

                <div class="status-bar-field is-inline-block">
                    <div class="is-inline-block has-side-spacing">
                        <div class="is-inline-block"><img src="{{ asset('img/icons/people.png') }}" alt="icon"/></div>
                        <div class="is-inline-block">{{ $visitcount }} visitors</div>
                    </div>

                    <div class="is-inline-block has-side-spacing">
                        <div class="is-inline-block"><img src="" alt="icon" id="taskbar-audio-icon"/></div>
                        <div class="is-inline-block" id="taskbar-audio-label"></div>
                    </div>

                    <div class="is-inline-block">
                        <div class="is-inline-block"><img src="{{ asset('img/icons/clock.png') }}" alt="icon"/></div>
                        <div class="is-inline-block" id="update-current-time">#update-current-time</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>