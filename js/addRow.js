function addEntry(table_id){
    let table_body = document.getElementById(table_id),

        first_tr = table_body.lastElementChild

        tr_clone = first_tr.cloneNode(true);

    table_body.append(tr_clone);

    // clean_first_tr(table_body.firstElementChild);









	// var entry=
    // '<input type="text" name="no1" class="no" id="no1" value="1">'+
    // '<input type="text" name="brand1" class="brand" id="brand1" placeholder="Medicine........." autocomplete="off">'+
    // '<input type="text" name="dose1" class="Dose" id="dose1" placeholder="Dose........." autocomplete="off">'+
    // '<input type="text" name="instruction1" class="Instruction" id="instruction1" placeholder="Instruction........." autocomplete="off">'+
    // '<input type="text" name="duration1" class="Duration" id="duration1" placeholder="Duration........." autocomplete="off">'

    // ;
	// var element=document.createElement("div");
	// element.setAttribute('class', 'mainBarTr');
	// element.innerHTML=entry;
	// document.getElementById('children').appendChild(element); 
}


function clean_first_tr(firstTr) {
    let children = firstTr.children;
    
    children = Array.isArray(children) ? children : Object.values(children);
    children.forEach(x=>{
        if(x !== firstTr.lastElementChild)
        {
            x.firstElementChild.value = '';
        }
    });
}