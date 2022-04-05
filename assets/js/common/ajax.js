/**
 * Ajax request for global use
 *
 * @param {*} formData | form data for post request
 * @returns json response on success or false
 */
 export default async function ajaxRequest(formData, jsonResponse = true) {
    const loader = `<div id="plugin-starter-loader-wrapper">
        <div class="plugin-starter-loading">
        </div>
    </div>`;
    document.body.insertAdjacentHTML(
        'beforeend',
        loader
    );
    const post = await fetch(tp_data.url, {
        method: 'POST',
        body: formData,
    });
    document.getElementById('plugin-starter-loader-wrapper').remove();
    if (post.ok) {
        if (jsonResponse) {
            return await post.json();
        } else {
            return await post.text();
        }
        
    } else {
        return false;
    }
}