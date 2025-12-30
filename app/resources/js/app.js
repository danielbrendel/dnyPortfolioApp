/**
 * app.js
 * 
 * Put here your application specific JavaScript implementations
 */

import './../sass/app.scss';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import hljs from 'highlight.js';
import 'highlight.js/scss/github.scss';

window.hljs = hljs;

window.ajaxRequest = function (method, url, data = {}, successfunc = function(data){}, finalfunc = function(){}, config = {})
{
    let func = window.axios.get;
    if (method == 'post') {
        func = window.axios.post;
    } else if (method == 'patch') {
        func = window.axios.patch;
    } else if (method == 'delete') {
        func = window.axios.delete;
    }

    func(url, data, config)
        .then(function(response){
            successfunc(response.data);
        })
        .catch(function (error) {
            console.log(error);
        })
        .finally(function(){
                finalfunc();
            }
        );
};

window.registerWidget = function(ident, title, icon) {
    let root = document.querySelector('.widgets');
    if (!root) {
        console.error('Fatal error: widget root element not found.');
        return;
    }

    root.innerHTML += `
        <div class="widgets-item" id="desktop-widget-` + ident + `" onclick="window.openWidget('#` + ident + `');">
            <div class="widgets-item-icon">
                <img src="` + window.location.origin + '/img/icons/' + icon + `" alt="icon"/>
            </div>

            <div class="widgets-item-title">
                ` + title + `
            </div>
        </div>
    `;
};

window.openWidget = function(which, onOpenCallback = function(){}) {
    let elem = document.querySelector(which);
    if (!elem) {
        console.error('Element not found: ' + which);
        return;
    }

    if (elem.classList.contains('is-hidden')) {
        elem.classList.remove('is-hidden');
    }

    const screenWidth = window.innerWidth;
    const screenHeight = window.innerHeight;

    const windowWidth = elem.offsetWidth;
    const windowHeight = elem.offsetHeight;

    elem.style.position = 'fixed';
    elem.style.top = (screenHeight / 2 - windowHeight / 2).toString() + 'px';
    elem.style.left = (screenWidth / 2 - windowWidth / 2).toString() + 'px';

    onOpenCallback();

    window.setWidgetToTop(which);
};

window.setWidgetToTop = function(which) {
    let elem = document.querySelector(which);
    if (!elem) {
        console.error('Element not found: ' + which);
        return;
    }

    let others = document.querySelectorAll('.window');
    for (let i = 0; i < others.length; i++) {
        others[i].parentElement.style.zIndex = 'unset';
    }

    elem.style.zIndex = '999';
};

window.closeWidget = function(which, onCloseCallback = function(){}) {
    let elem = document.querySelector(which);
    if (!elem) {
        console.error('Element not found: ' + which);
        return;
    }

    if (!elem.classList.contains('is-hidden')) {
        elem.classList.add('is-hidden');
    }

    onCloseCallback();
};

window.startMenuCallbacks = [];
window.addStartMenuItem = function(title, icon, callback = function() {}) {
    let root = document.querySelector('.menu');
    if (!root) {
        console.error('Fatal error: start menu root element not found.');
        return;
    }

    const ident = window.startMenuCallbacks.length;

    root.innerHTML += `
        <div class="menu-item" onclick="window.startMenuCallbacks[` + ident + `]();">
            <div class="menu-item-icon">
                <img src="` + window.location.origin + '/img/icons/' + icon + `" alt="icon"/>
            </div>

            <div class="menu-item-title">
                ` + title + `
            </div>
        </div>
    `;

    window.startMenuCallbacks.push(function() { callback(); window.closeActiveStartMenu(); });
};

window.addStartMenuDelimiter = function() {
    let root = document.querySelector('.menu');
    if (!root) {
        console.error('Fatal error: start menu root element not found.');
        return;
    }

    root.innerHTML += `<div class="menu-delimiter"><hr/></div>`;
};

window.toggleStartMenu = function() {
    let root = document.querySelector('.menu');
    if (!root) {
        console.error('Fatal error: start menu root element not found.');
        return;
    }

    root.classList.toggle('is-hidden');

    let button = document.querySelector('.startmenu');
    if (button) {
        button.classList.toggle('set-active');
    }
};

window.closeActiveStartMenu = function() {
    let root = document.querySelector('.menu');
    if (!root) {
        console.error('Fatal error: start menu root element not found.');
        return;
    }

    if (!root.classList.contains('is-hidden')) {
        let button = document.querySelector('.startmenu');
        if (button) {
            button.classList.remove('set-active');
        }

        root.classList.add('is-hidden');
    }
};

window.switchProjectTab = function(which) {
    for (let i = 1; i <= window.maxProjects; i++) {
        let elHide = document.getElementById('tab-project-' + i);
        if (elHide) {
            if (!elHide.classList.contains('is-hidden')) {
                elHide.classList.add('is-hidden');
            }
        }

        let roleHide = document.getElementById('role-project-' + i);
        if (roleHide) {
            roleHide.ariaSelected = false;
        }
    }

    let targetTab = document.getElementById('tab-project-' + which);
    if (targetTab) {
        if (targetTab.classList.contains('is-hidden')) {
            targetTab.classList.remove('is-hidden');
        }
    }

    let targetRole = document.getElementById('role-project-' + which);
    if (targetRole) {
        targetRole.ariaSelected = true;
    }
};

window.toggleWindowSize = function(wnd, style) {
    let elem = document.querySelector(wnd);
    if (elem) {
        elem.classList.toggle(style);
    }
};

window.updateDateTime = function(target) {
    let elem = document.querySelector(target);
    if (elem) {
        let dt = new Date();
        elem.innerText = ('0' + dt.getHours()).slice(-2) + ':' + ('0' + dt.getMinutes()).slice(-2) + ':' + ('0' + dt.getSeconds()).slice(-2);

        setTimeout(function() {
            window.updateDateTime(target);
        }, 1000);
    }
};

window.fetchBlogPosts = function(target, type = 'default') {
    let elem = document.querySelector(target);
    if (elem) {
        window.ajaxRequest('get', window.location.origin + '/blog/posts/fetch?limit=' + elem.dataset.limit + '&type=' + type, {}, function(response) {
            if (response.code == 200) {
                elem.innerHTML = '';

                response.data.forEach(function(post, index) {
                    let tableEntry = `
                        <tr>
                            <td><a href="` + window.location.origin + '/blog/' + post.slug + `">` + post.title + `</a></td>
                            <td>` + post.created_at + `</td>
                        </tr>
                    `;

                    elem.innerHTML += tableEntry;
                });
            }
        });
    }
};

window.queryShout = function(target) {
    let container = document.querySelector(target);
    if (container) {
        window.ajaxRequest('get', window.location.origin + '/shoutbox/query', {}, function(response) {
            if (response.code == 200) {
                let tableEntry = `
                    <tr>
                        <td>` + response.shout.username + `</td>
                        <td>` + response.shout.message + `</td>
                    </tr>
                `;

                container.children[0].innerHTML += tableEntry;

                container.scrollTop = container.scrollHeight 
            }
        });
    }
};

window.previewBlogPost = function(title, content, token) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = window.location.origin + '/blog/posts/submit/preview?token=' + token;
    form.target = '_blank';

    const inpTitle = document.createElement('input');
    inpTitle.type = 'text';
    inpTitle.name = 'title';
    inpTitle.value = title;
    inpTitle.style.display = 'none';
    form.appendChild(inpTitle);

    const inpContent = document.createElement('textarea');
    inpContent.name = 'content';
    inpContent.value = content;
    inpContent.style.display = 'none';
    form.appendChild(inpContent);

    document.body.appendChild(form);
    form.submit();
};