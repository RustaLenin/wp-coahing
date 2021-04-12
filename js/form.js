function collectData( form ) {
    let inputs = form.querySelectorAll('input');
    let textareas = form.querySelectorAll('textarea');
    console.log(inputs);
    let data = {};
    inputs.forEach( (input) => {
        data[input.name] = input.value;
    });
    textareas.forEach( (textarea) => {
        data[textarea.name] = textarea.value;
    });
    return data;
}