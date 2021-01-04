<?php ?>

<div class="modal_container ModalContainer hidden">

    <div class="modal SignUp">

        <div class="modal_header">
            <span class="modal_title bold">Регистрация</span>
            <span class="modal_close_button" onclick="close_modal(this)">
                    <svg class="svg_icon pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 47.971 47.971">
                        <path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88
                            c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242
                            C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879
                            s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"/>
                    </svg>
                </span>
        </div>

        <div class="modal_body">

            <div class="form">

                <label class="input_container" onclick="inputConFocus(this);">
                    <span class="input_title">ФИО</span>
                    <input type="text" name="full_name" placeholder="Иванов Иван Иванович" >
                </label>

                <label class="input_container">
                    <span class="input_title">Пароль</span>
                    <input type="password" name="password" placeholder="йцукен">
                </label>

                <label class="input_container">
                    <span class="input_title">Дата рождения</span>
                    <input type="date" name="birthday" placeholder="01.01.2000">
                </label>

                <label class="input_container">
                    <span class="input_title">Промокод</span>
                    <input name="promocode" type="number" placeholder="123987">
                </label>
            </div>

        </div>

        <div class="modal_footer">
            <button class="button action_button" onclick="submitModal(this)">Отправить</button>
        </div>

    </div>

</div>

<?php
