export const initEventListeners = (callback = ()=>{}) => {
    try {
        callback();
        document.addEventListener('DOMContentLoaded', callback);
        document.addEventListener('livewire:navigated', callback);
    }catch(error){
        console.warn(error);
    }
}