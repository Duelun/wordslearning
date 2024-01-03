<script defer>
    window.addEventListener("DOMContentLoaded", function () {
        const config = {
            // class of the parent element where the error/success class is added
            classTo: 'pristine-form',
            errorClass: 'pristine-danger',
            successClass: 'pristine-success',
            // class of the parent element where error text element is appended
            errorTextParent: 'pristine-message',
            // type of element to create for the error text
            errorTextTag: 'div',
            // class of the error text element
            errorTextClass: 'pristine-error' 
        };
        const locale = 'en';
        var allforms = document.getElementsByTagName("form");
        for (const forms of allforms) {
            /* forms and modals id */
            const formid = forms.getAttribute('id');
            const form = document.getElementById(formid);
            const modid = formid.replace('form', '');
            const loginModal = document.getElementById(modid);
            
            /* modals load - hide */
            loginModal.addEventListener('shown.bs.modal', function (e) {

                const pristine = new Pristine(form, config);

                /* messages by local */
                Pristine.setLocale(locale);
                Pristine.addMessages('en', []);

                /* rules */

                /* validation */
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    var valid = pristine.validate(); // returns true or false

                    /* send form if valid */
                    if (valid){
                        forms.submit(); 
                    }
                });
            });
            loginModal.addEventListener('hidden.bs.modal', function (e) {
                const pristine = new Pristine(form, config);
                pristine.reset();
                pristine.destroy();
            });
        };
    });
</script>
