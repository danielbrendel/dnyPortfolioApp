@if (env('APP_ENABLE_APPLETS'))
<script>
    window.buildAppletWindow = function(name, ident, embed, width, height, minimize, maximize, close) {
        const transformedName = window.transformRuleCase(name);

        const codeMinimize = (minimize) ? `<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-` + transformedName + `', 'window-minimized');"></button>` : ``;
        const codeMaxmimize = (maximize) ? `<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-` + transformedName + `', 'window-maximized');"></button>` : ``;
        const codeClose = (close) ? `<button aria-label="Close" onclick="window.closeWidget('#column-window-` + transformedName + `', window.applets[` + ident + `].instance.onClose);"></button>` : ``;

        const html = `
            <div class="window" style="width: ` + width + `; height: ` + height + `;" onclick="window.setWidgetToTop('#column-window-` + transformedName + `');">
                <div class="title-bar">
                    <div class="title-bar-text">` + name + `</div>
                    <div class="title-bar-controls">
                        ` + codeMinimize + `
                        ` + codeMaxmimize + `
                        ` + codeClose + `
                    </div>
                </div>
                <div class="window-body">` + embed + `</div>
            </div>
        `;

        let wrapper = document.createElement('div');
        wrapper.id = 'column-window-' + transformedName;
        wrapper.classList.add('column', 'is-half', 'is-hidden');
        wrapper.style.width = width;
        wrapper.style.height = height;
        wrapper.innerHTML = html;

        return wrapper;
    };
</script>
@endif