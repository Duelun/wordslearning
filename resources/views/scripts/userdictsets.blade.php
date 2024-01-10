<script defer>
    window.addEventListener("DOMContentLoaded", function () {
        const records = document.getElementById('userDictList').getElementsByClassName('record');
        for (const record of records) {
          recordlistener(record);
        }
    });

    function recordlistener(record) {
        record.addEventListener("mouseover", function (e) {
            e.stopPropagation();
            record.classList.add('bg-info', 'bg-opacity-50', 'z-3');
        });

        record.addEventListener("click", function (e) {
            e.stopPropagation();
            //startFetch('dictList');
            const id = record.getElementsByClassName('id')[0].textContent.trim();
            const name = record.getElementsByClassName('name')[0].textContent.trim();
            const lang1 = record.getElementsByClassName('lang1')[0].textContent.trim();
            const lang2 = record.getElementsByClassName('lang2')[0].textContent.trim();
            const targetbox = document.getElementById('dictList');
            targetbox.getElementsByClassName('id')[0].value = id;
            targetbox.getElementsByClassName('name')[0].value = name;
            var select =targetbox.getElementsByClassName('lang1')[0];
            selectdropdown(select, lang1);
            var select =targetbox.getElementsByClassName('lang2')[0];
            selectdropdown(select, lang2);
        });

        record.addEventListener("mouseout", function (e) {
            e.stopPropagation();
            record.classList.remove('bg-info', 'bg-opacity-50', 'z-3');
        });
    }

    function insertNewDict(customblock) {
        var targetbox = '';
        var newline = true;
        const listrecords = document.getElementById('dictList').getElementsByClassName('id');
        for (const lr of listrecords){
            if (lr.textContent.trim() === customblock.id){
                var targetbox = lr.parentElement;
                newline = false;
                break;
            }
        }

        if (newline) {
            const blueprint = document.getElementById('userDictList').getElementsByClassName('blueprint')[0];
            const clone = blueprint.cloneNode(true);
            clone.classList.add('record');
            clone.classList.remove('blueprint', 'visually-hidden')
            recordlistener(clone);
            var targetbox = document.getElementById("userDictList").appendChild(clone);
        }

        targetbox.getElementsByClassName('id')[0].textContent = customblock.id;
        targetbox.getElementsByClassName('name')[0].textContent = customblock.name;
        targetbox.getElementsByClassName('lang1')[0].textContent = customblock.ownlang;
        targetbox.getElementsByClassName('lang2')[0].textContent = customblock.learnlang;

    }

    function selectdropdown(selectbox, selectedtext){
        for (var i = 0; i < selectbox.options.length; i++) {
            if (selectbox.options[i].text === selectedtext) {
                selectbox.selectedIndex = i;
                break;
            }
        }
    }
</script>

