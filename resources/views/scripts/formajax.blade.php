<script defer>
    window.addEventListener("DOMContentLoaded", function () {
        var allforms = document.getElementsByTagName("form");
        for (const forms of allforms) {
            const formid = forms.getAttribute('id');

            if (formid == 'logoutform') { continue; }

            const form = document.getElementById(formid);
            form.addEventListener("submit", function (e) {
                e.preventDefault();
                param = {method:'post', body: new FormData(form)};
                startFetch(formid);
                sendFormFetch(form, formid, param);
            });
        };
    });

    function sendFormFetch(form, formid, param) {
        // Detect if user is on IE browser
        var isIE = !!window.MSInputMethodContext && !!document.documentMode;
        if (isIE) {
        // Create Promise polyfill script tag
            var promiseScript = document.createElement("script");
            promiseScript.type = "text/javascript";
            promiseScript.src =
                "https://cdn.jsdelivr.net/npm/promise-polyfill@8.3.0/dist/polyfill.min.js";
        // Create Fetch polyfill script tag
            var fetchScript = document.createElement("script");
            fetchScript.type = "text/javascript";
            fetchScript.src =
                "https://cdn.jsdelivr.net/npm/whatwg-fetch@3.6.20/dist/fetch.umd.min.js";
        // Add polyfills to head element
            document.head.appendChild(promiseScript);
            document.head.appendChild(fetchScript);
        // Wait for the polyfills to load and run the function. We could have done this differently, but I've found it to work well for my use-cases
            setTimeout(function () {
                window
                    .fetch(form.action, param)
                    .then((Response) => {
                        if (!Response.ok) { throw new Error(`HTTP error: ${Response.status}`); }
                        return Response.json();
                    })
                    .then((Data) => { handleResponse(form, formid, Data)})
                    .catch((error) => {
                        handleError(form, formid, errors);
                        console.error("Failed to read data");
                    });
            }, 1000);
        } else {
        // If fetch is supported, just run the fetch function
            fetch(form.action, param)
                .then((Response) => {
                    if (!Response.ok) { throw new Error(`HTTP error: ${Response.status}`); }
                    return Response.json();
                })
                .then((Data) => { handleResponse(form, formid, Data)})
                .catch((error) => {
                    handleError(form, formid, error);
                    console.error("Failed to read data");
                });
        };
    };


    function startFetch(formid){
        const messid = formid+'message';
        const messagebox = document.getElementById(messid);
        var classes = messagebox.classList;
        classes.add('d-none');
        messagebox.innerHTML = '';

        const spinid = formid+'spinner';
        const spinbox = document.getElementById(spinid);
        var classes = spinbox.classList;
        classes.remove('d-none');

        var errorboxes = document.getElementById(formid).getElementsByClassName('pristine-error');
        for (var errorbox of errorboxes){
            errorbox.innerHTML = '';
        }
        var errorboxes = document.getElementById(formid).getElementsByClassName('id-tooltip id-danger');
        for (var errorbox of errorboxes){
            var classes = errorbox.classList;
            classes.remove('d-inline-box');
            classes.add('d-none');
        }
    };

    function endFetch(form, formid){
        const spinid = formid+'spinner';
        const spinbox = document.getElementById(spinid);
        var classes = spinbox.classList;
        classes.add('d-none');

        const messid = formid+'message';
        const messagebox = document.getElementById(messid);
        var classes = messagebox.classList;
        classes.remove('d-none');
    }

    function handleResponse(form, formid, data){
        const messid = formid+'message';
        const messagebox = document.getElementById(messid);

        messagebox.innerHTML = data.custommessage;
console.log(data);
        if (Object.keys(data.errormessage).length > 0){
            for (const [key, value] of Object.entries(data.errormessage)) {
                const fieldname = formid + '_' + key + '_error';
                const errorbox = document.getElementById(fieldname);
                var errortext = '';
                for (const erroritem of Object.values(value)){
                    errortext += '- '+erroritem+'<br>';
                }
                errorbox.innerHTML = Object.values(value)[0];
                    const tooltipobj = document.getElementById(fieldname+'_tooltip');
                    const tooltip = bootstrap.Tooltip.getInstance(tooltipobj);
                    tooltip.setContent({ '.tooltip-inner': errortext});
                    const tooltipbutton = document.getElementById(fieldname+'_tooltipbutton');
                    tooltipbutton.classList.remove('d-none');
                    tooltipbutton.classList.add('d-inline-block');
            }
        }

        if (Object.keys(data.customblock).length > 0){
            if (data.customblock.refreshpage) {
                window.location.reload();
            }
            if (data.customblock.insertNewDict) {
                insertNewDict(data.customblock);
            }
        }

        endFetch(form, formid);
    };

    function handleError(form, formid, errors){
        console.log(form);
        console.log('error');

        const messid = formid+'message';
        const messagebox = document.getElementById(messid);
        messagebox.innerHTML = 'Server error, try it later!';
        endFetch(form, formid);
    };

</script>
