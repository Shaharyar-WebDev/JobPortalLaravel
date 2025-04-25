import { initEventListeners } from './helpers/eventlisteners.js'

const initOtpInputs = () => {
    try{
    const inputs = document.querySelectorAll(".otp-input");

    inputs.forEach((input, index) => {
        input.addEventListener("input", () => {
            if (input.value.length === 1) {
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            }
        });

        input.addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && !input.value && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });

}catch(error){
    console.warn(errors);
}
};

document.addEventListener('click', (evt)=>{
    console.log('found just clikc');
    initOtpInputs();
    if(evt.target.classList.contains('otp-input')){
        console.log('found input');
        initOtpInputs();
    }
});

initEventListeners(initOtpInputs);