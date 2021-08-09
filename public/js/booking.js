function getRoomId ()
{
    const id = this.id;

    bookRoom(id);
}


function bookRoom (roomId)
{
    const form = document.querySelector('#formIndex');
    const qty = +document.querySelector(`#qty_${roomId}`).value;
    const night = +document.querySelector('.night').textContent;
    
    const cellId = document.querySelector(`#room_type_id_${roomId}`);
    const cellQty = document.querySelector(`#room_type_qty_${roomId}`);

    if ( cellId === null & cellQty === null ) {
        
        var newElemName = document.createElement('input');
        newElemName.type = 'hidden';
        newElemName.id = `room_type_name_${roomId}`;
        newElemName.name = 'room_type_name[]';
        newElemName.value = document.querySelector(`#name_${roomId}`).value;
        form.appendChild(newElemName);

        var newElemId = document.createElement('input');
        newElemId.type = 'hidden';
        newElemId.id = `room_type_id_${roomId}`;
        newElemId.name = 'room_type_id[]';
        newElemId.value = roomId;
        form.appendChild(newElemId);

        var newElemQty = document.createElement('input');
        newElemQty.type = 'hidden';
        newElemQty.id = `room_type_qty_${roomId}`;
        newElemQty.name = 'room_type_qty[]';
        newElemQty.value = document.querySelector(`#qty_${roomId}`).value;
        form.appendChild(newElemQty);

        var newElemPrice = document.createElement('input');
        newElemPrice.type = 'hidden';
        newElemPrice.id = `room_type_price_${roomId}`;
        newElemPrice.name = 'room_type_price[]';
        newElemPrice.value = document.querySelector(`#price_${roomId}`).value;
        form.appendChild(newElemPrice)

        var newElemAmount = document.createElement('input');
        newElemAmount.type = 'hidden';
        newElemAmount.id = `room_type_amount_${roomId}`;
        newElemAmount.name = 'room_type_amount[]';
        newElemAmount.value = ( (+document.querySelector(`#amount_${roomId}`).value * qty) * night ).toFixed(2);
        form.appendChild(newElemAmount);

    } else {

        newElemQty = document.querySelector(`#room_type_qty_${roomId}`);
        newElemQty.value = document.querySelector(`#qty_${roomId}`).value;

        newElemAmount = document.querySelector(`#room_type_amount_${roomId}`);
        newElemAmount.value = ( document.querySelector(`#amount_${roomId}`).value * qty ).toFixed(2);
        
    }

    validateForm();
    updateBookingSummary();
}

function updateBookingSummary ()
{
    let bkgDtls = document.querySelector(`#bookingDetails`);
    
    while (bkgDtls.childNodes.length > 0) {
        bkgDtls.removeChild(bkgDtls.childNodes[bkgDtls.childNodes.length - 1]);
    }

    let roomTypeIds = document.getElementsByName('room_type_id[]');
    let roomTypeQtys = document.getElementsByName('room_type_qty[]');
    let roomTypePrices = document.getElementsByName('room_type_price[]');
    let roomTypeAmounts = document.getElementsByName('room_type_amount[]');
    let totalAmount = 0.00;

    for (let i = 0; i < roomTypeIds.length; i++) {

        let roomTypeId = roomTypeIds[i].value;
        let roomTypeQty = roomTypeQtys[i].value;
        let roomTypePrice = roomTypePrices[i].value;
        let roomTypeAmount = roomTypeAmounts[i].value;
        totalAmount += parseFloat(roomTypeAmount);

        let tr = document.createElement('tr');
        tr.id = `bkgRow_${i}`;
        bkgDtls.appendChild(tr);

        let td_name = document.createElement('td');
        td_name.innerHTML = document.querySelector(`#name_${roomTypeId}`).value;
        tr.appendChild(td_name);

        let td_qty = document.createElement('td');
        td_qty.style.textAlign = 'center';
        td_qty.innerHTML = roomTypeQty;
        tr.appendChild(td_qty);

        let td_amount = document.createElement('td');
        td_amount.style.textAlign = 'right';
        td_amount.innerHTML = roomTypeAmount;
        tr.appendChild(td_amount);

        let td_delete = document.createElement('td');
        let btn_delete = document.createElement('button');
        btn_delete.type = 'button';
        btn_delete.setAttribute('class', 'btn btn-xs');

        btn_delete.innerHTML = '<i class="fas fa-times-circle text-danger"></i>';
        btn_delete.setAttribute('data-id', roomTypeId);
        btn_delete.onclick = function () { deleteBookingRow(this.dataset.id); };

        td_delete.appendChild(btn_delete);
        tr.appendChild(td_delete);
    }

    document.querySelector('#total').innerHTML = totalAmount.toFixed(2);

}

function deleteBookingRow (id)
{
    const form = document.querySelector('#formIndex');
    const roomTypeId = document.querySelector(`#room_type_id_${id}`);

    form.removeChild(document.querySelector(`#room_type_name_${id}`));
    form.removeChild(document.querySelector(`#room_type_id_${id}`));
    form.removeChild(document.querySelector(`#room_type_qty_${id}`));
    form.removeChild(document.querySelector(`#room_type_price_${id}`));
    form.removeChild(document.querySelector(`#room_type_amount_${id}`));

    validateForm();
    updateBookingSummary();
    
}

function checkForBookRoom ()
{
    const button = document.querySelector('#btn-next');
    const bkgDtls = document.querySelector(`#bookingDetails`);

    if ( bkgDtls.childNodes.length === 0 ) {

        console.log(true);
        
    } else {

        console.log(false);
    }

}


function validateForm ()
{
    let form = document.querySelector('#formIndex');
    let roomTypeIds = document.getElementsByName('room_type_id[]');

    if (roomTypeIds.length === 0) {
        document.getElementById('btn-next').disabled = true;
    } else {
        document.getElementById('btn-next').disabled = false;
    }

    console.log(roomTypeIds);
    
}

validateForm();


function roomCounter ()
{
    const id = this.id;
    let input = document.querySelector(`#qty_${id}`).value;
    let room = document.querySelector(`#room_${id}`).value;

    if (this.classList.contains('up')) {
        
        if (input >= room) return;

        input++;
        document.querySelector(`#qty_${id}`).value = input;

    } else {

        if (input <= 1) return;

        input--;
        document.querySelector(`#qty_${id}`).value = input;
    }

    console.log(id);
}

$('.btn-book').on('click', getRoomId);
$('.count').on('click', roomCounter);
