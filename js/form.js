function collectData( form ) {
    let inputs = form.querySelectorAll('input');
    console.log(inputs);
    let data = {};
    inputs.forEach( (input) => {
        data[input.name] = input.value;
    });
    return data;
}