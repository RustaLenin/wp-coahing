function sendComment( elem ) {
    let form = elem.closest('.comments_form_container');
    let data = collectData(form);
    data['action'] = 'add_comment';
    fetch( rpcurl, {
        method: 'POST',
        'Content-Type': 'application/json;charset=utf-8',
        body: JSON.stringify(data)
    }).then( response => {
        return response.json();
    }).then( json => {
        console.log(json);
        if ( json.result === 'success' ) {

        }
    });
}