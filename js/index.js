function switch_body_backgroud_color() {
    let body = document.querySelector('body');
    if ( body.classList.contains('white') ) {
        body.classList.remove('white');
        body.classList.add('black');
    } else {
        body.classList.remove('black');
        body.classList.add('white');
    }
}

function show_modal() {
    document.querySelector('.ModalContainer').classList.remove('hidden');
}

function close_modal( elem ) {
    elem.closest('.ModalContainer').classList.add('hidden');
}

function submitModal(elem) {
    let form = elem.closest('.modal').querySelector('.form');
    return collectData( form );
}

function singUp(elem) {
    let form = elem.closest('.modal').querySelector('.form');
    let data = collectData( form );
    data['action'] = 'registration';
    fetch( rpcurl, {
        method: 'POST',
        'Content-Type': 'application/json;charset=utf-8',
        body: JSON.stringify(data)
    }).then(response => console.log(response.json()));

}

function setLocale( locale ) {
    let data = {
        'action': 'translate',
        'locale': locale
    };
    fetch( rpcurl, {
        method: 'POST',
        'Content-Type': 'application/json;charset=utf-8',
        body: JSON.stringify(data)
    }).then( response => {
        return response.json();
    }).then( json => {
        console.log(json);
        if (json.result === 'success' ) {
            location.reload();
        }
    });
}