<?php $id = Session::get('form'); ?>
<script defer>
    const id = '{{ $id }}';
    window.onload =function(){
        /* open invalid form */
        const modal = document.getElementById(id);
        const myModal = new bootstrap.Modal(modal, { keyboard: false })
        myModal.show()
    };
</script>