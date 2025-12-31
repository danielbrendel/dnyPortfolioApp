/**
 * Sample Applet
 */
window.SampleApplet = class {
    /**
     * Construct class object instance
     */
    constructor()
    {
        console.log('constructor');
    }

    /**
     * Called when the applet is installed
     * 
     * @return void
     */
    onInstall()
    {
        console.log('onInstall');
    }

    /**
     * Called when the applet is uninstalled
     * 
     * @return void
     */
    onRemove()
    {
        console.log('onRemove');
    }

    /**
     * Called when the applet is loaded
     * This happens everytime the page is loaded/refreshed, or when the applet is installed
     * 
     * @return void
     */
    onLoad()
    {
        console.log('onLoad');
    }

    /**
     * Called when the applet is shown, e.g. when launching via desktop
     * 
     * @return void
     */
    onShow()
    {
        console.log('onShow');
    }

    /**
     * Called when the applet is closed, e.g. via the close action button in the title bar
     * 
     * @return void
     */
    onClose()
    {
        console.log('onClose');
    }

    /**
     * Return the HTML content which is rendered into the applet window
     * 
     * @return string
     */
    view()
    {
        return `
            <strong>Hello from this sample applet.</strong>
        `;
    }

    /**
     * Provide applet settings here
     * 
     * @return object
     */
    settings()
    {
        return {
            wndWidth: '500px',
            wndHeight: '300px',
            btnClose: true,
            btnMaximize: true,
            btnMinimize: true
        };
    }

    /**
     * Return basic information on the applet
     * 
     * @return object
     */
    infos()
    {
        return {
            name: 'Sample Applet',
            version: '1.0',
            icon: window.location.origin + '/img/icons/applet.png'
        };
    }

    /**
     * Return the CSS styles which are rendered into the page
     * 
     * @returns object
     */
    styles()
    {
        return `
            .sample-applet {
                font-size: 3.5em;
            }
        `;
    }
}
