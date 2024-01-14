<script defer>
    window.addEventListener("DOMContentLoaded", function () {
        //dictonaries list
        const records = document.getElementsByClassName('record');
        for (const record of records) {
          recordlistener(record);
        }
        document.getElementById('Newdictbutton').addEventListener('click', function (e) {
            const formid = 'dictlist';
            const newformfill = ['empty', '', '', ''];
            const visiblebutton = [true, true, true, false];
            dictlistnewform(formid, newformfill, visiblebutton);
            });
        document.getElementById('Newwordbutton').addEventListener('click', function (e) {
            const formid = 'wordlist';
            const newformfill = ['empty', '', '', ''];
            const visiblebutton = [true, true, true, false];
            wordlistnewform(formid, newformfill, visiblebutton);
        });

    });

    //visible form set for all forms

    function selectdropdown(selectbox, selectedtext){
        for (var i = 0; i < selectbox.options.length; i++) {
            if (selectbox.options[i].text === selectedtext) {
                selectbox.selectedIndex = i;
                break;
            }
        }
    }
    function renameids(clone, formid){
        clone.id = formid+'visible';
        const elements = clone.getElementsByTagName("*");
        for (const element of elements){
            const oldid = element.getAttribute('id');
            if (oldid && oldid.includes(formid)) {
                element.id = oldid.replace(formid, formid+'visible');
            }
        }
    }
    function newtooltip(clone){
        const tooltipTriggerList = [].slice.call(clone.querySelectorAll('[data-bs-toggle="tooltip"]'))
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }
    function createmodalform(formid){
        const modal = document.getElementById('dictmainform');
        modal.getElementsByClassName('modal-dialog')[0].classList.add('modal-lg');
        const blueprint = document.getElementById(formid);
        const clone = blueprint.cloneNode(true);
        renameids(clone, formid);
        newtooltip(clone);
        const targetbox = modal.getElementsByClassName('modal-body')[0];
        targetbox.innerHTML = '';
        targetbox.appendChild(clone);
        const myModal = new bootstrap.Modal(modal, { keyboard: false })
        return {myModal:myModal, modal:modal, clone:clone};
    }
    function buttonlistener(clone){
        const buttons = clone.getElementsByTagName('button');
        for(const button of buttons){
            button.addEventListener('click', function (e){
                clone.action = button.formAction;
                const formid = clone.getAttribute('id');
                prepare(e, clone, formid);
            })
        }
    }
    function buttonsvisible(clone, cancelhide, deletehide, modifyhide, savehide){
        if (cancelhide){
            clone.getElementsByClassName('cancel')[0].classList.add('visually-hidden');
        } else {
            clone.getElementsByClassName('cancel')[0].classList.remove('visually-hidden');
        }
        if (deletehide){
            clone.getElementsByClassName('delete')[0].classList.add('visually-hidden');
        } else {
            clone.getElementsByClassName('delete')[0].classList.remove('visually-hidden');
        }
        if (modifyhide){
            clone.getElementsByClassName('modify')[0].classList.add('visually-hidden');
        } else {
            clone.getElementsByClassName('modify')[0].classList.remove('visually-hidden');
        }
        if (savehide){
            clone.getElementsByClassName('save')[0].classList.add('visually-hidden');
        } else {
            clone.getElementsByClassName('save')[0].classList.remove('visually-hidden');
        }
    }

    //records action for all forms
    function recordlistener(record) {
        const formid = record.dataset.parent;
        record.addEventListener("mouseover", function (e) {
            e.stopPropagation();
            record.classList.add('bg-info', 'bg-opacity-50', 'z-3');
        });
        record.addEventListener("click", function (e) {
            e.stopPropagation();

            switch(formid) {
                case 'dictlist':
                    dictlistdatas(record, formid);
                    break;
            }

        });
        record.addEventListener("mouseout", function (e) {
            e.stopPropagation();
            record.classList.remove('bg-info', 'bg-opacity-50', 'z-3');
        });
    }
    //word list form ****************
    function wordlistnewform(formid, newformfill, visiblebutton) {
        const {myModal, modal, clone} = createmodalform(formid);
        wordlistfillnewform(clone, newformfill[0], newformfill[1], newformfill[2], newformfill[3]);
        wordlistselectlistener(clone);
        buttonlistener(clone);
        buttonsvisible(clone, visiblebutton[0], visiblebutton[1], visiblebutton[2], visiblebutton[3]);
        myModal.show(modal);
    } // <- new come here
    function wordlistdatas(record, formid){
        const id = record.getElementsByClassName('id')[0].textContent.trim();
        const name = record.getElementsByClassName('name')[0].textContent.trim();
        const lang1 = record.getElementsByClassName('lang1')[0].textContent.trim();
        const lang2 = record.getElementsByClassName('lang2')[0].textContent.trim();
        const newformfill = [id, name, lang1, lang2];
        const visiblebutton = [true, false, false, true];
        dictlistnewform(formid, newformfill, visiblebutton);
    }   //<- modify come here
    function wordlistfillnewform(clone, id, name, lang1, lang2){
        return;
        clone.getElementsByClassName('id')[0].value = id;
        clone.getElementsByClassName('name')[0].value = name;
        const select1 =clone.getElementsByClassName('lang1')[0];
        const select2 = clone.getElementsByClassName('lang2')[0];
        if (lang1 !== ''){
            selectdropdown(select1, lang1);
        } else {
            const dd1 = document.getElementById('lang1store');
            if (dd1.innerText !== ''){
                selectdropdown(select1, dd1.innerText);
            }
        }
        if (lang2 !== '') {
            selectdropdown(select2, lang2);
        } else {
            const dd2 = document.getElementById('lang2store');
            if (dd2.innerText !== ''){
                selectdropdown(select2, dd2.innerText);
            }
        }
    }
    function wordlistselectlistener(clone){
        const dd1 = document.getElementById('lang1store');
        const dd2 = document.getElementById('lang2store');
        const sel1 = clone.getElementsByTagName('select')[0];
        const sel2 = clone.getElementsByTagName('select')[1];
        sel1.addEventListener('change', function (e) {
            dd1.innerText = sel1.options[sel1.selectedIndex].text;
        });
        sel2.addEventListener('change', function (e) {
            dd2.innerText = sel2.options[sel2.selectedIndex].text;
        });
    }

    //dict list form ****************
    //set form
    function dictlistnewform(formid, newformfill, visiblebutton) {
        const {myModal, modal, clone} = createmodalform(formid);
        dictlistfillnewform(clone, newformfill[0], newformfill[1], newformfill[2], newformfill[3]);
        dictlistselectlistener(clone);
        buttonlistener(clone);
        buttonsvisible(clone, visiblebutton[0], visiblebutton[1], visiblebutton[2], visiblebutton[3]);
        myModal.show(modal);
    } // <- new come here
    function dictlistdatas(record, formid){
        const id = record.getElementsByClassName('id')[0].textContent.trim();
        const name = record.getElementsByClassName('name')[0].textContent.trim();
        const lang1 = record.getElementsByClassName('lang1')[0].textContent.trim();
        const lang2 = record.getElementsByClassName('lang2')[0].textContent.trim();
        const newformfill = [id, name, lang1, lang2];
        const visiblebutton = [true, false, false, true];
        dictlistnewform(formid, newformfill, visiblebutton);
    }   //<- modify come here
    function dictlistfillnewform(clone, id, name, lang1, lang2){
        clone.getElementsByClassName('id')[0].value = id;
        clone.getElementsByClassName('name')[0].value = name;
        const select1 =clone.getElementsByClassName('lang1')[0];
        const select2 = clone.getElementsByClassName('lang2')[0];
        if (lang1 !== ''){
            selectdropdown(select1, lang1);
        } else {
            const dd1 = document.getElementById('lang1store');
            if (dd1.innerText !== ''){
                selectdropdown(select1, dd1.innerText);
            }
        }
        if (lang2 !== '') {
            selectdropdown(select2, lang2);
        } else {
            const dd2 = document.getElementById('lang2store');
            if (dd2.innerText !== ''){
                selectdropdown(select2, dd2.innerText);
            }
        }
    }
    function dictlistselectlistener(clone){
        const dd1 = document.getElementById('lang1store');
        const dd2 = document.getElementById('lang2store');
        const sel1 = clone.getElementsByTagName('select')[0];
        const sel2 = clone.getElementsByTagName('select')[1];
        sel1.addEventListener('change', function (e) {
            dd1.innerText = sel1.options[sel1.selectedIndex].text;
        });
        sel2.addEventListener('change', function (e) {
            dd2.innerText = sel2.options[sel2.selectedIndex].text;
        });
    }
    //response handling
    function serverResponse(customblock){
        switch(customblock.dictlist) {
            case 'new':
                insertNewDict(customblock);
                break;
            case 'modify':
                modifyDict(customblock);
                break;
            case 'delete':
                deleteDict(customblock);
                break;
            case 'reload':
                reloadDict(customblock);
                break;
        }
        const modal = document.getElementById('dictmainform');
        const myModal = bootstrap.Modal.getInstance(modal);
        myModal.hide();
    }
    function insertNewDict(customblock) {
        const blueprint = document.getElementById('dictlistblueprints').getElementsByClassName('blueprint')[0];
        const clone = blueprint.cloneNode(true);
        clone.classList.add('record');
        clone.classList.remove('blueprint');
        clone.dataset.parent = 'dictlist';
        recordlistener(clone);
        const targetbox = document.getElementById("userDictList").appendChild(clone);
        targetbox.getElementsByClassName('id')[0].textContent = customblock.id;
        targetbox.getElementsByClassName('name')[0].textContent = customblock.name;
        targetbox.getElementsByClassName('lang1')[0].textContent = customblock.learnlang;
        targetbox.getElementsByClassName('lang2')[0].textContent = customblock.ownlang;
    }
    function modifyDict(customblock){
        const idFields = document.getElementById('userDictList').getElementsByClassName('id');
        for (const field of idFields){
            if (field.innerText === customblock.id){
                const targetbox = field.parentElement;
                targetbox.getElementsByClassName('name')[0].textContent = customblock.name;
                targetbox.getElementsByClassName('lang1')[0].textContent = customblock.learnlang;
                targetbox.getElementsByClassName('lang2')[0].textContent = customblock.ownlang;
                break;
            }
        }
    }
    function deleteDict(customblock){
        const idFields = document.getElementById('userDictList').getElementsByClassName('id');
        for (const field of idFields){
            if (field.innerText === customblock.id){
                field.parentElement.remove();
                break;
            }
        }
    }



</script>

