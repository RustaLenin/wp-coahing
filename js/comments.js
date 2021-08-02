class Comment {

    method = 'POST';
    contentType = 'application/json;charset=utf-8';
    data = {
        'action': 'comment',
        'command': '',
        'payload': {},
    };

    constructor() {
    }

    send( elem ) {
        let form = elem.closest('.comments_form_container');
        let data = {};
        Object.assign( data, this.data );
        data.command = 'add_comment';
        data.payload = collectData(form);
        fetch( rpcurl, {
            method: this.method,
            'Content-Type': this.contentType,
            body: JSON.stringify(data)
        }).then( response => {
            return response.json();
        }).then( json => {
            console.log(json);
            if ( json.result === 'success' ) {
                let comments_list = elem.closest('.comments').querySelector('.comments_list');
                comments_list.insertAdjacentHTML('afterbegin', json.html );
            }
        });
    }

    erase( elem, comment_id ) {
        let data = {};
        Object.assign( data, this.data );
        data.command = 'delete_comment';
        data.payload['comment_id'] = comment_id;
        fetch( rpcurl, {
            method: this.method,
            'Content-Type': this.contentType,
            body: JSON.stringify(data)
        }).then( response => {
            return response.json();
        }).then( json => {
            console.log(json);
            if ( json.result === 'success' ) {
                let comment = elem.closest('.comment_container');
                comment.remove();
            }
        });
    }

    edit( elem ) {
        let comment_cont = elem.closest('.comment_container');
        let comment_id = comment_cont.getAttribute('data-comment_id');
        let comment_content = comment_cont.querySelector('.comment_content');
        let previous_content = comment_content.textContent;
        comment_content.setAttribute('prevcontent', previous_content );
        comment_content.setAttribute('contenteditable', 'true' );
        comment_content.focus();
    }

}

let comment = new Comment();