/**
 * PluginStarter backend scripts
 *
 * Handle all backend scripts
 *
 * @since v1.0.0
 */
const { __ } = wp.i18n;
document.addEventListener("DOMContentLoaded", function () {
    const refreshButton = document.getElementById("plugin-starter-page-refresh");
    const pageContent = document.querySelector(".plugin-starter-page-content");

    // on dom ready get user list
    getUsersList();

    //on refresh get new data
    if (refreshButton) {
        refreshButton.onclick = () => {
            getUsersList();
        };
    }

    async function getUsersList() {
        const formData = new FormData();
        formData.set("nonce", awData.nonce);
        formData.set("action", "aw_task_user_list");

        const response = await ajaxRequest(formData);
        if (response.success && response.data) {
            let th = "";
            for (let header of response.data.data.headers) {
                th += `<th>${header}</th>`;
            }

            let tr = "";
            for (let value of Object.values(response.data.data.rows)) {
                tr += `<tr>`;
                tr += `<td>${value.id}</td>`;
                tr += `<td>${value.fname}</td>`;
                tr += `<td>${value.lname}</td>`;
                tr += `<td>${value.email}</td>`;
                tr += `<td>${value.date}</td>`;
                tr += `<tr/>`;
            }
            if (!response.data.data.rows) {
                tr += `<tr>`;
                tr += `<td colspan="100%">${__(`No record found`, "plugin-starter")}</td>`;
                tr += `<tr/>`;
            }

            let markup =`
                <h3>
                    ${response.data.title}
                </h3>
                <table>
                    <thead>
                        ${th}
                    </thead>
                    <tbody>
                        ${tr}
                    </tbody>
                </table>
            `;
            pageContent.innerHTML = markup;
        } else {
            alert(__("Something went wrong, please try again.", "plugin-starter"));
        }
    }

    async function ajaxRequest(formData, jsonResponse = true) {
        const loader = `<div id="plugin-starter-loader-wrapper">
            <div class="plugin-starter-loading">
            </div>
        </div>`;
        document.body.insertAdjacentHTML("beforeend", loader);
        const post = await fetch(awData.url, {
            method: "POST",
            body: formData,
        });
        document.getElementById("plugin-starter-loader-wrapper").remove();
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
});
