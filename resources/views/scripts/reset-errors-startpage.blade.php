<script defer>
    window.addEventListener("DOMContentLoaded", function () {
        const collection = document.getElementsByClassName("modal");
        for (const item of collection){
            const itemid = item.getAttribute('id');
            const modal = document.getElementById(itemid);
            modal.addEventListener('hide.bs.modal', function (e) {
                var fields = document.getElementsByClassName("pristine-error");
                for (var field of fields){
                    field.innerHTML = '';
                }
                var fields = document.getElementsByClassName("errortooltipbutton");
                for (var field of fields){
                    field.classList.add('d-none');
                    field.classList.remove('d-inline-block');
                };
            });
        };
    })
</script>