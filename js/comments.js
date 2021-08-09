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

        let edit_template =
            `<div class="edit_controls">
                <svg class="svg_icon cancel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.095 47.095" 
                style="cursor: pointer; margin-right: 4px; z-index: 10;"
                onclick="comment.cancel(this);">
                    <g>
                        <path d="M45.363,36.234l-13.158-13.16l12.21-12.21c2.31-2.307,2.31-6.049,0-8.358c-2.308-2.308-6.05-2.307-8.356,0l-12.212,12.21
                            L11.038,1.906c-2.309-2.308-6.051-2.308-8.358,0c-2.307,2.309-2.307,6.049,0,8.358l12.81,12.81L1.732,36.831
                            c-2.309,2.31-2.309,6.05,0,8.359c2.308,2.307,6.049,2.307,8.356,0l13.759-13.758l13.16,13.16c2.308,2.308,6.049,2.308,8.356,0
                            C47.673,42.282,47.672,38.54,45.363,36.234z"/>
                    </g>
                </svg>
                <svg class="svg_icon approve" xmlns="http://www.w3.org/2000/svg" width="405.272px" height="405.272px" viewBox="0 0 405.272 405.272" 
                style="cursor: pointer; z-index: 10;"
                onclick="comment.update(this);">
                    <g>
                        <path d="M393.401,124.425L179.603,338.208c-15.832,15.835-41.514,15.835-57.361,0L11.878,227.836
                            c-15.838-15.835-15.838-41.52,0-57.358c15.841-15.841,41.521-15.841,57.355-0.006l81.698,81.699L336.037,67.064
                            c15.841-15.841,41.523-15.829,57.358,0C409.23,82.902,409.23,108.578,393.401,124.425z"/>
                    </g>
                </svg>
            </div>`;

        let comment_cont = elem.closest('.comment_container');
        let comment_content = comment_cont.querySelector('.comment_content');
        let previous_content = comment_content.textContent;
        comment_cont.insertAdjacentHTML('beforeend', edit_template );
        comment_content.setAttribute('prevcontent', previous_content );
        comment_content.setAttribute('contenteditable', 'true' );
        comment_content.focus();
    }

    cancel( elem ) {
        let comment_cont = elem.closest('.comment_container');
        let comment_content = comment_cont.querySelector('.comment_content');
        comment_content.textContent = comment_content.getAttribute('prevcontent');
        comment_content.setAttribute('prevcontent', '');
        comment_content.setAttribute('contenteditable', 'false' );
        comment_cont.querySelector('.edit_controls').remove();
    }

    update( elem ) {
        let comment_cont = elem.closest('.comment_container');
        let comment_id = comment_cont.getAttribute('data-comment_id');
        let comment_content = comment_cont.querySelector('.comment_content');
        let updated_content = comment_content.textContent;
        let data = {};
        Object.assign( data, this.data );
        data.command = 'update';
        data.payload = {
            'comment_id': comment_id,
            'comment_content': updated_content
        };
        fetch(rpcurl, {
            method: this.method,
            'Content-Type': this.contentType,
            body: JSON.stringify(data)
        }).then(response => {
            return response.json();
        }).then(json => {
            if (json.result === 'success') {
                comment_content.setAttribute('prevcontent', '');
                comment_content.setAttribute('contenteditable', 'false' );
                comment_cont.querySelector('.edit_controls').remove();
            }
        });

    }

}

let comment = new Comment();