/**
 * app.js
 * 
 * Put here your application specific JavaScript implementations
 */

import './../sass/app.scss';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

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